
import axios from 'axios';

export default {
    namespaced: true,
    state: {
        partners:null
    },
    getters: {
        partners(state){
            return state.partners;
        }
    },
    mutations: {
        SET_PARTNERS(state, partners){
            state.partners = partners;
        }
    },
    actions: {
        newPartner({},formData){
            return  axios.post('api/partners', formData);
        },
        async partners({commit}){
            let response =  await axios.get('api/partners');
            commit('SET_PARTNERS', response.data);

        },
        removePartner({},id){
            let response =  axios.delete('api/partners/' + id);

        }

    }

};
