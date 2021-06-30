<template>
    <div>

        <admin-nav></admin-nav>
        <all-installations @clicked="onClickIo" v-if="iosCollection && displayAll" :iosCollection="iosCollection.geojson.features"></all-installations>
        <installation v-else :fields="io.properties" :marker="marker"></installation>
    </div>
</template>
<script>
import AdminNav from "../adminNav";
import AllInstallations from "./allInstallations";
import Installation from "./installation";
import { mapGetters } from 'vuex';

    export default {
    name: 'Installations',
    components: {AllInstallations, AdminNav, Installation},
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

