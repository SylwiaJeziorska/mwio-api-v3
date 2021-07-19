<template>
    <div class="h-100" v-if="io">
        <l-map ref="map" :zoom="zoom" :center="center">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker v-if="io" :lat-lng="latLng" :draggable="true" @drag="updateCoordinates"></l-marker>
        </l-map>
        </l-map>
    </div>
</template>
<script>
import { mapGetters } from 'vuex';
import { mapState }  from '../mixins/mapStateMixin'
export default {
    name: 'updateInstallationMap',
    mixins: [mapState],
    props:['io', 'latLng'],
    data: function () {
        return {
            markers: this.latLng,

        };
    },
    methods:{
        updateCoordinates(e) {
            this.markers.lat = e.latlng.lat;
            this.markers.lng = e.latlng.lat;
            this.$emit('mymarker', e);

        },
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

