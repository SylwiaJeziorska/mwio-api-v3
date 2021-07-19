<template>
    <div>
        <div id="filter" class="mvh-100">
            <l-map ref="map" :zoom="zoom" :center="center">
                <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
                <l-geo-json
                    :visible="filteredGJ.visible"
                    :geojson="filteredGJ.geojson"
                    :options="filteredGJ.options"
                ></l-geo-json>
            </l-map>
        </div>
    </div>
</template>
<script>

import PopupContent from "../PopupContent";
import {mapGetters} from "vuex";

let greenIcon = L.icon({
    iconUrl: "../images/vendor/leaflet/dist/marker-vert.png",
    iconAnchor: [16, 37],
    popupAnchor: [0, -28],
});
let redIcon = L.icon({
    iconUrl: "/images/vendor/leaflet/dist/marker-orange.png",
    iconAnchor: [16, 37],
    popupAnchor: [0, -28],
});
import { mapState }  from '../mixins/mapStateMixin'

export default {
    name: "filteredInstallation",
    mixins: [mapState],

    data: function () {
        return {
            filteredGJ: {},
            filterOptions: false,
            situation: "",
        };
    },
    methods: {
        getGeoJson(display) {
            var gcolection = {
                visible: true,
                geojson: this.installations.geojson,
                options: {
                    filter: function (feature, layer) {
                        var checked = feature.checked;
                        var classe2;
                        let filterLength =
                            checked[0].length + checked[1].length + checked[2].length + checked[3].length + checked[4].length + checked[5].length;
                        if (feature.properties.classe) {
                            var myStr = feature.properties.classe;
                            var classe = myStr.split(",").sort();
                            classe2 = checked[2].sort();
                        } else {
                            classe = [];
                        }

                        if (display == 1) {
                            let id='';
                            if(checked[5].length > 0 ){
                                $.each(feature.properties, function(key, value) {
                                    if (typeof value === 'string' && checked[5][0].length >= 4){
                                        if(value.includes(checked[5][0])){
                                            id = feature.properties.id;
                                        }
                                    }
                                });
                            }
                            if(
                                (checked[1].length == 0 || checked[1].includes(feature.properties.origine)) &&
                                (checked[2].length == 0 || classe.some(v=> classe2.indexOf(v) !== -1) ) &&
                                (checked[0].length == 0 || checked[0].includes(feature.properties.demontee.toString())) &&
                                (checked[3].length == 0 || checked[3].includes(feature.properties.ampleur)) &&
                                (checked[4].length == 0 || checked[4].includes(feature.properties.impact)) &&
                                (checked[5].length == 0 || id == feature.properties.id)
                            ) {
                                return true;
                            }
                        }
                        if (filterLength == 0) {
                            return true;
                        }
                    },
                    pointToLayer: function (feature, latlng) {
                        if (feature.properties.demontee == 0) {
                            return L.marker(latlng, {
                                icon: redIcon,
                            });
                        }
                        return L.marker(latlng, {
                            icon: greenIcon,
                        });
                    },
                    onEachFeature: function (feature, layer) {
                        let popupContent = Vue.extend(PopupContent);
                        let popup = new popupContent({
                            propsData: {
                                date: feature.properties.date_releve,
                                id: feature.properties.id,
                                origin: feature.properties.origine,
                                lieu: feature.properties.lieu_dit,
                            },
                        });
                        layer.bindPopup(popup.$mount().$el);
                    },
                },
            };

            this.filteredGJ = gcolection;
        },

    },
    created() {
        //to refresh the layers each time the filters buttons are clieked
        this.getGeoJson(0);
    },
    mounted() {
        //to filter the layers each time the fiter buttons are cliked
        this.getGeoJson(1);
        this.$refs.map.mapObject.on("move", () => {
            this.settCurrentCenter();
            this.settCurrentZoom();
        });
        //add checkedf to each feature
        this.installations.geojson.features[0].checked = this.$store.state.installations.filters;
        this.installations.geojson.features.forEach((element) => {
            element.checked =this.$store.state.installations.filters;
        });
        this.filteredGJ.geojson.features.forEach((element) => {
            element.checked = this.$store.state.installations.filters;
        });
    },
    computed: {
        installations() {
            return this.$store.state.installations.installations;
        },
        checked() {
            return this.$store.state.installations.filters;
        },
        ...mapGetters({
            zoom: 'mapState/zoom',
            center: 'mapState/center'
        }),
    },
};
</script>
<style scoped>
html,
body {
    height: 100%;
    margin: 0;
}

#filter {
    height: 82vh;
}
</style>
