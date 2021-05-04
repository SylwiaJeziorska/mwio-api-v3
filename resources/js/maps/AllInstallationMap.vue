<template>
    <div>
        <div id="ios">
            <l-map :zoom="zoom" :center="center">
                <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
                <l-geo-json
                    :key="iosCollection.id"
                    :visible="iosCollection.visible"
                    :geojson="iosCollection.geojson"
                    :options="iosCollection.options"
                ></l-geo-json>
            </l-map>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { mapState }  from '../components/mixins/mapStateMixin'
export default {
    name: 'AllInstallationMap',
    props: ["iosCollection"],
    mixins: [mapState],
    data: function () {
        return {
            clusterOptions: {
                maxClusterRadius: 55,
            },
        };
    },
    computed: {
        ...mapGetters({
            zoom: 'mapState/zoom',
            center: 'mapState/center'
        }),
    }
};
</script>
<style scoped>
#ios {
    height: 82vh;
}
</style>
