<template>
    <div class="row">
        <div class="col-md-3">
            <new-installation-text :situation="situation"></new-installation-text>
        </div>
        <div class="col-md-9">
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
