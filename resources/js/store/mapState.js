

export default {
    namespaced: true,
    state: {
        zoom: 6,
        center: L.latLng(45.1841602, 5.680523),
    },
    getters: {
        zoom(state) {
            return state.zoom;
        },
        center(state) {
            return state.center;
        }
    },
    mutations: {
        CURRENT_ZOOM: (state, zoom) => {
            state.zoom = zoom.zoom;
        },
        CURRENT_CENTER: (state, center) => {
            state.center = center.center;
        },
    },

};
