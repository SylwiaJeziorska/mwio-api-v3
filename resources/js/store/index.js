import Vue from 'vue'
import Vuex from 'vuex'
import installations from "./installations";
import partners from "./partners";
import auth from "./auth";
import mapState from "./mapState";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {

    },
    mutations: {
    },
    actions: {
    },
    modules: {
        installations,
        mapState,
        auth,
        partners
    }
})
