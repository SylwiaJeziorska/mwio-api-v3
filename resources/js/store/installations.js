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

    },
    getters: {
        installations(state) {
            return state.installations;
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
        }
    },
    actions: {
        async installations({ commit }){
            let response = await axios.get('/ios');
            commit('SET_INSTALLATIONS', response);
        }
    },
};
