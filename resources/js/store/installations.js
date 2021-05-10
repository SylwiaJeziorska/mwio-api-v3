import axios from 'axios';
let greenIcon = L.icon({
    iconUrl: "../images/vendor/leaflet/dist/marker-vert.png",
    iconAnchor: [16, 37],
    popupAnchor: [0, -28],
});
let redIcon = L.icon({
    iconUrl: "/images/vendor/leaflet/dist/marker-orange.png",
    iconAnchor: [16, 37],
    popupAnchor: [0, -28],
});
import PopupContent from "../components/PopupContent";

export default {
    namespaced: true,
    state: {
       installations: null,
        filters: [[], [], []],
        io: {},
        marker: {},
        user:{}

    },
    getters: {
        installations(state) {
            return state.installations;
        },
        singleInstallation(state) {
            return state.io;
        },
        marker(state) {
            return state.marker;
        },
        user(state) {
            return state.user;
        },
    },
    mutations: {
        SET_INSTALLATIONS(state, installations){
           // state.installations = installations.data;
            let features = [];
            for (let i = 0; i < installations.data.length; i++) {
                var props = installations.data[i];
                props['popupContent'] = installations.data[i].origine;
                props['display'] = true;
                features.push({
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [installations.data[i].situation.coordinates.lon ,installations.data[i].situation.coordinates.lat]
                    },
                    properties: props,
                    id: installations.data[i].id,
                });
            }
            state.installations = {
                visible: true,
                geojson: { type: 'FeatureCollection', features: features },
                options: {
                    filter: function (feature, layer) {
                        if (feature.properties.validee == 1) {
                            return true;
                        }
                        return false;
                    },
                    style: function (feature) {
                        switch (feature.properties.demontee) {
                            case 0:
                                return {
                                    color: '#ff0000',
                                };
                                break;
                            case 1:
                                return {
                                    color: '#00ba59',
                                };
                                break;
                        }
                    },
                    pointToLayer: function (feature, latlng) {
                        if (feature.properties.demontee == 0) {
                            return L.marker(latlng, {
                                icon: redIcon,
                            });
                        }
                        return L.marker(latlng, {
                            icon: greenIcon,
                        });
                    },
                    onEachFeature: function (feature, layer) {
                        let popupContent = Vue.extend(PopupContent);
                        let popup = new popupContent({
                            propsData: {
                                date: feature.properties.date_releve,
                                id: feature.properties.id,
                                origin: feature.properties.origine,
                                lieu: feature.properties.lieu_dit,
                            },
                        });
                        layer.bindPopup(popup.$mount().$el);
                    },
                },
            };
        },
        SET_FILTERS(state,filters){
            state.filters = filters;
        },
        SET_SINGLE_IO( state, io){
            state.io = io.data;
        },
        SET_MARKER(state, io){
            state.marker = L.latLng(
                io.coordinates.lat,
                io.coordinates.lon
            );
        },
        SET_IO_BY_ID( state, id){
            let arrayOfInstallation = state.installations.geojson.features;
            let io = arrayOfInstallation.filter(io => io.id === id);
            state.io =  io[0];
            state.marker = L.latLng(
                io[0].geometry.coordinates[1],
                io[0].geometry.coordinates[0]
            );
        },
    },
    actions: {
        async installations({ commit }){
            await axios.get('/ios').then((response) => {
                commit('SET_INSTALLATIONS', response);

            })
        },
        async getIO( {commit }, id) {
            commit('SET_IO_BY_ID', id);
        },
    },
};
