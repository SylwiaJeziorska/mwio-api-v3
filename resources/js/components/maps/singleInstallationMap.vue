<template>
    <div id="oneio" v-if="io" class="h-100">
        <l-map ref="map" :zoom="zoom" :center="center">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker v-if="io" :lat-lng="latLng"></l-marker>
        </l-map>
    </div>
</template>
<script>
import { mapGetters } from 'vuex';
import { mapState }  from '../mixins/mapStateMixin'
export default {
    name: 'singleInstallationMap',
    mixins: [mapState],
    props:['io', 'latLng'],
    data: function () {
        return {
        };
    },
    computed: {
        ...mapGetters({
            zoom: 'mapState/zoom',
            center: 'mapState/center',
        }),
    },
    mounted() {
        this.$refs.map.mapObject.on("move", () => {
            this.settCurrentCenter();
            this.settCurrentZoom();
        });
    },

};
</script>
<style>
#oneio{
    height: 100%;
}
</style>
