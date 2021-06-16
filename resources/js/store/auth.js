import axios from 'axios';

export default {
    namespaced: true,
    state: {
        token: null,
        user: null,
    },
    getters: {
        authenticated(state) {
            return state.token && state.user;
        },
        user(state) {
            return state.user;
        },
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token;
        },
        SET_USER(state, data) {
            state.user = data;
        },
    },
    actions: {
        async signIn({ dispatch, commit }, credentials) {
            let response = await axios.post('/oauth/token', credentials);

            return dispatch('attempt', response.data.access_token);
        },
        async attempt({ commit, state }, token) {
            if (token) {
                commit("SET_TOKEN", token);
            }
            try {
                let response = await axios.get('api/auth/user', {
                    headers: {
                        accept:'application/json',
                        Authorization: 'Bearer ' + token,
                    },
                });
                commit('SET_USER', response.data);
            } catch (e) {
                commit('SET_TOKEN', null);
                commit('SET_USER', null);
            }
        },
        logout({ commit }) {
            return axios.get('api/auth/logout').then(() => {
                commit('SET_TOKEN', null);
                commit('SET_USER', null);
                location.reload();
            });
        },
    },
};
