<template>
    <div v-if="iosCollection">
        <div class="row">
            <div class="col-md-2">
                <filter-option @clicked="onClickFilter"></filter-option>
            </div>
                <div class="col-md-10" v-if="filteredIo">
                <filtered-installation-map :key="filter"></filtered-installation-map>
            </div>
            <div class="col-md-10" v-else>
                <all-installation-map :iosCollection="iosCollection"></all-installation-map>
            </div>

        </div>
    </div>
</template>

<script>
import FilterOption from "../components/filterOption";
import AllInstallationMap from "../components/maps/AllInstallationMap";
import { mapGetters } from 'vuex';
import FilteredInstallationMap from "../components/maps/filteredInstallationMap";

export default {
    name: 'Home',
    components: {FilteredInstallationMap, FilterOption, AllInstallationMap},
    data: function() {
        return {
            filter: true,
            filteredIo: false,
        }
    },
    methods: {
        onClickFilter (value) {
           this.filteredIo = value[0];
           this.filter = value[1];
        }
    },
    mounted() {
    },
    computed: {
        ...mapGetters({
            iosCollection: 'installations/installations',
        }),
    }
}
</script>
