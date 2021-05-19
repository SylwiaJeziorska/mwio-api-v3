<template>
    <div>
        <Installations @clicked="onClickIo" v-if="iosCollection && displayAll" :iosCollection="iosCollection.geojson.features"></Installations>
        <installation v-else :fields="io.properties" :marker="marker"></installation>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Installation from "../components/admin/installation";
import Installations from "../components/admin/installations";

export default {
    name: 'Home',
    components: {Installation, Installations},
    data: function() {
        return {
            displayAll:true
        }
    },
    methods: {
        onClickIo (value) {
            this.displayAll = false;
        }
    },
    computed: {
        ...mapGetters({
            iosCollection: 'installations/installations',
            io: 'installations/singleInstallation',
            marker: 'installations/marker'
        }),
    }
}
</script>
