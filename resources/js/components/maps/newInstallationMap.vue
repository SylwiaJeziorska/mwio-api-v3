<template>
    <div class="new-io-map">
        <l-map ref="map" :zoom="zoom" :center="center" @click="addMarker">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-layer-group :visible="true">
                <l-marker v-for="marker in markers"
                          :key="marker.id"
                          :draggable="true"
                          :lat-lng="marker.position"
                          @drag="updateCoordinates" />
            </l-layer-group>
        </l-map>
    </div>
</template>
<script>
import { mapState }  from '../mixins/mapStateMixin';
import { mapGetters } from 'vuex';

export default {
    name: 'newInstallationMap',
    mixins: [mapState],
    data (){
        return {
            markers: [
                {
                    position: {
                        lat: "",
                        lng: "",
                    },
                },
            ],
            fields: {
                situation: {}
            }
        }
    },
    methods: {
        //updating the coordinates when drag&drop
        updateCoordinates(location) {
            this.fields.situation =
                "(" + location.latlng.lng + " " + location.latlng.lat + ")";
            this.$emit('clicked', this.fields.situation);

        },
        //adding marker with click and updating the coordinates on click
        addMarker: function (e) {
            if (this.markers.length !== 0) {
                this.markers = [];
            }
            this.markers.push({
                position: {
                    lat: e.latlng.lat,
                    lng: e.latlng.lng,
                },
            });
            this.fields.situation =
                "(" + e.latlng.lng + " " + e.latlng.lat + ")";
            this.$emit('clicked', this.fields.situation);
        },
},
    computed: {
        ...mapGetters({
            zoom: 'mapState/zoom',
            center: 'mapState/center'
        }),
    },
}
</script>
<style>
.new-io-map{
  height: 100%;
}
</style>
