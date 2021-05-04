<template>
    <div class="container-fluid">
        <div class="io-container mvh-100 d-flex">
            <div id='filters' class="desktop mvh-100 form-group">
                <div @click="filterLayers" class="filter-criteria">
                    <h1 class="text-col-title">Rechercher une installation </br> obsolète</h1>
                    <p class="rs-label"> <span>Statut </span> </p>
                    <div class="row justify-content-center statut">
                        <input id="green" type="button" value="Démontée" :class="{highlight:selected.includes('Démontée'), green:filter}" @click="addFilterElement('1',0);
                        selected.includes('Démontée') ? selected.splice(selected.indexOf('Démontée'), 1) : selected.push('Démontée')">
                        <input id="orange" type="button" value="Non démontée" :class="{highlight:selected.includes('Montée'), orange:filter}" @click="addFilterElement('0',0);
                        selected.includes('Montée') ? selected.splice(selected.indexOf('Montée'), 1) : selected.push('Montée')">
                    </div>

                    </br>
                    <p class="rs-label"> <span>Origine </span> </p>
                    <div class="row justify-content-center">
                        <input v-for="origine in origines" type="button" v-bind:value="origine" :class="{highlight:selected.includes(origine)}" @click="addFilterElement(origine,1);
                        selected.includes(origine) ? selected.splice(selected.indexOf(origine), 1) : selected.push(origine)">
                    </div>

                    <p class="rs-label"> <span>Classe  </span> </p>
                    <div class="row justify-content-center">
                        <input v-for="(type, index) in types" :class="{highlight:selected.includes(index)}" type="button" v-bind:value="type" @click="addFilterElement(type,2);
                        selected.includes(index) ? selected.splice(selected.indexOf(index), 1) : selected.push(index)">
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

export default {
    name: "filterOption",
    components: {
//
    },
    data: function() {
        return {
            filter: true,
            filterCheckedModel: [[], [], []],
            selected: [],
            origines: ['Touristique', 'Agricole', 'Industrielle', 'Routiere', 'Militaire', 'Inconnue'],
            types: ['Déchets', 'Pylones', 'Blocs de bétons', 'Bâtiments', 'Gravats', 'Fondations', 'Conduites', 'Fils ou câbles', 'Poutres métalliques', 'Tôles', 'Barbelés et clôtures', 'Autre'],
        }
    },
    methods: {
        filters() {
            this.$store.commit('installations/SET_FILTERS', this.filterCheckedModel)
        },
        openSearch: function() {
            this.$emit('clicked', 'true')

            $("#map-class").animate({
                width: "75%"
            });
            $("#filters").animate({
                width: "25%"
            });
            $(".search-icon").hide();
            $(".filter-criteria").show();
            setTimeout(function() {
                $(".close-filters").show();
            }, 300);
        },
        closeSearch: function() {
            this.$emit('clicked', 'false')

            this.allIos = true;
            this.filteredio = false;
            $("#map-class").animate({
                width: "100%"
            });
            $("#filters").animate({
                width: "0%"
            })
            $(".search-icon").show();
            $(".filter-criteria").hide();
            $(".close-filters").hide();
        },
        addFilterElement: function(element, group) {
            if (this.filterCheckedModel[group].includes(element)) {
                var index = this.filterCheckedModel[group].indexOf(element);
                this.filterCheckedModel[group].splice(index, 1);
            } else {
                this.filterCheckedModel[group].push(element);
            }
            this.filters();
        },

        filterLayers: function(event) {
            this.GeoJson2;
            if (this.filter == false) {
                this.GeoJson2;
                this.filter = true;
                this.$emit('clicked', ['true','true'])

            } else {
                this.GeoJson2;
                this.filter = false;
                this.$emit('clicked', ['true','false'])

            }
        }
    },
    computed: {
        situationData() {
           // return this.$store.state.installationsObsoletes;
        },
        iosColection() {
           // return this.$store.state.ioGeoJson;

        }
    },
}

</script>

