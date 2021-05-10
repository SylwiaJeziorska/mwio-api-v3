<template>
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-md-4 p-0">
                <div class="text-col vh-100">
                    <single-installation-text v-if="display" :io="io.properties"></single-installation-text>
                </div>
            </div>
            <div class="col-md-8 p-0">
            <single-installation-map v-if="display" :io="io" :lat-lng="marker"></single-installation-map>
            </div>
        </div>
        <div class="row m-0 footer-br-none">
        </div>
    </div>
</template>

<script>


import SingleInstallationText from "../components/textColumn/singleInstallationText";

import { mapState }  from '../components/mixins/mapStateMixin'
import SingleInstallationMap from "../maps/singleInstallationMap";
import { mapActions } from 'vuex';
import {mapGetters} from "vuex";


export default {
    components: {SingleInstallationMap, SingleInstallationText},
    name: "singleInstallation",
    mixins: [mapState],

    data: function() {
        return {
            display:true
        };
    },
    methods: {
        ...mapActions({
            getIo: 'installations/getIO',
        }),
    },

    created() {
        this.getIo(this.$route.params.id);
    },
    mounted() {

    },
    computed: {
        ...mapGetters({
            io: 'installations/singleInstallation',
            marker: 'installations/marker'
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
