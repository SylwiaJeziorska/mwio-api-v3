<template>
    <div class="map">
        <installation v-if="update" :fields="io.properties" :marker="marker"></installation>

        <div v-else class="row h-100">
            <div class="col-md-3 overflow h-100">
                <div class="text-col">
                    <ul class="mt-5 pt-3">
                        <li v-if="admin || superAdmin" @click="updateIo">
                            <a>UPDATE</a>
                        </li>
                    </ul>
                    <single-installation-text v-if="display" :io="io.properties"></single-installation-text>
                </div>
            </div>
            <div class="col-md-9 p-0">
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
        updateIo(){
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
            admin:'auth/admin',
            superAdmin: 'auth/superAdmin'

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
