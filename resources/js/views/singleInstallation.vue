<template>
    <div class="container-fluid">
        <ul>
            <li class="scrolly" href="#header">
                <router-link
                    to="/"
                ><---</router-link
                >
            </li>
        </ul>
        <div v-if="user" @click="test">UPDATE for admin</div>

        <installation v-if="update" :fields="io.properties" :marker="marker"></installation>

        <div v-else class="row m-0">
            <div class="col-md-4 p-0">
                <div class="text-col vh-100">
                    <single-installation-text v-if="display" :io="io.properties"></single-installation-text>
                </div>
            </div>
            <div class="col-md-8 p-0">
            <single-installation-map v-if="display" :io="io" :lat-lng="marker"></single-installation-map>
            </div>
        </div>

    </div>
</template>

<script>


import SingleInstallationText from "../components/textColumn/singleInstallationText";

import { mapState }  from '../components/mixins/mapStateMixin'
import SingleInstallationMap from "../components/maps/singleInstallationMap";
import { mapActions } from 'vuex';
import {mapGetters} from "vuex";
import Installation from "../components/admin/installations/installation";


export default {
    components: {Installation, SingleInstallationMap, SingleInstallationText},
    name: "singleInstallation",
    mixins: [mapState],

    data: function() {
        return {
            display:true,
            update:false,
        };
    },
    methods: {
        ...mapActions({
            getIo: 'installations/getIO',
        }),
        test(){
            this.update = true;
            // router.push({ name: 'singleInstallation', params: { id: this.id } })
        }
    },

    created() {
        this.getIo(this.$route.params.id);
    },
    mounted() {

    },
    computed: {
        ...mapGetters({
            io: 'installations/singleInstallation',
            marker: 'installations/marker',
            user: 'auth/user',
            admin:'auth/admin'
        }),

    },

};
</script>

<style scoped>
#oneio {
    height: 82vh;
}

.text-col {
    background: white;
}
</style>
