import {LControlAttribution, LControlLayers, LControlScale, LGeoJson, LMap, LMarker, LTileLayer} from "vue2-leaflet";

export let mapState = {
    components: {
        LMap,
        LTileLayer,
        LGeoJson,
        LControlAttribution,
        LControlScale,
        LControlLayers,
        LMarker
    },
    props: {

    },
    data () {
        return {
            url: "https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png",
            attribution:
                "&copy; <a href='http://osm.org/copyright'>OpenStreetMap</a> contributors",
            scrollWheelZoom: false,

        }
    },
    methods: {
        settCurrentZoom() {
            this.$store.commit("mapState/CURRENT_ZOOM", {
                zoom: this.$refs.map.mapObject.getZoom(),
            });
        },
        settCurrentCenter() {
            this.$store.commit("mapState/CURRENT_CENTER", {
                center: this.$refs.map.mapObject.getCenter(),
            });
        },
    },
    computed: {

    },
    created: function (done) {

    },
    beforeDestroy () {
    }
}
