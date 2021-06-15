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
            let response = await axios.post('/api/auth/signIn', credentials);
            console.log(response.data.access_token);
            commit('SET_USER', response.data.user);

            return dispatch('attempt', response.data.access_token);
        },
        async attempt({ commit, state }, token) {
            console.log('in attem');

            if (token) {
                commit('SET_TOKEN', token);
            }
            if (!state.token) {
                return;
            }
            // try {
            //     let response = await axios.get('/api/auth/me', {
            //         headers: {
            //             Authorization: 'Bearer' + token,
            //         },
            //     });
            //     commit('SET_USER', response.data);
            // } catch (e) {
            //     commit('SET_TOKEN', null);
            //     commit('SET_USER', null);
            // }
        },
        signOut({ commit }) {
            return axios.post('api/auth/signout').then(() => {
                commit('SET_TOKEN', null);
                commit('SET_USER', null);
            });
        },
    },
};
