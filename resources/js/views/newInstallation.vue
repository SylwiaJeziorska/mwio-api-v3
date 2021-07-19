<template>
    <div class="row map">
        <div class="col-md-3 h-100 overflow">
            <new-installation-text :situation="situation"></new-installation-text>
        </div>
        <div class="col-md-9 p-0">
            <new-installation-map @clicked="onClickMap"></new-installation-map>
        </div>
    </div>
</template>
<script>
import NewInstallationText from "../components/textColumn/newInstallationText";
import NewInstallationMap from "../components/maps/newInstallationMap";
export default {
    components: {NewInstallationMap, NewInstallationText},
    data (){
        return {
            situation: {}
        }
    },
    methods: {
        onClickMap (value) {
            this.situation = value;
        },

    },
}
</script>
