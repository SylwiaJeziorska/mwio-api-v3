
import axios from 'axios';

export default {
    namespaced: true,
    state: {
        users:null,
        bannedUsers: ''

    },
    getters: {
        users(state){
            return state.users;
        },
        bannedUsers(state){
            if(state.users){
                return state.users.filter(function (i) {
                    return i.banni == '1'
                });
            }
        },
        activeUsers(state){
            if(state.users){
                return state.users.filter(function (i) {
                    return i.banni == null || i.banni == '0';
                });
            }
        },
        getUserById: (state) => (id) => {
            let user = state.users.filter(user => user.id == id);
            return user[0];
        },
    },
    mutations: {
        SET_USERS(state, partners){
            state.users = partners;
        }
    },
    actions: {

        async users({commit}){
            let response =  await axios.post('api/auth/index');
            commit('SET_USERS', response.data);

        },
    }

};
