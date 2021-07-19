<template>
    <div class="pt-5">
        <div class="d-flex pt-5 filters">
            <div class="form-group">
                <h1>Rechercher une installation </br> obsolète</h1>
                <div class="row justify-content-center mt-5">
                    <p class="rs-label"><span>Recherche</span></p>
                    <input type="text" v-model="search" @click="addFilterElement(search, 5)"/>
                </div>
                <div @click="filterLayers">
                <div>
                    <p class="rs-label"> <span>Statut </span> </p>
                    <div class="row justify-content-center">
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
                    <p class="rs-label"> <span>Ampleur</span> </p>
                    <div class="row justify-content-center">
                        <input v-for="(type, index) in ampleur" :class="{highlight:selected.includes(type)}" type="button" v-bind:value="type" @click="addFilterElement(type,3);
                        selected.includes(type) ? selected.splice(selected.indexOf(index), 1) : selected.push(type)">
                    </div>
                    <p class="rs-label"> <span>Impact </span> </p>
                    <div class="row justify-content-center">
                        <input v-for="(type, index) in impact" :class="{highlight:filterCheckedModel[4].includes(type)}" type="button" v-bind:value="type" @click="addFilterElement(type,4);
                        filterCheckedModel[4].includes(type) ? filterCheckedModel[4].splice(filterCheckedModel[4].indexOf(index), 1) : filterCheckedModel[4].push(type)">
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
</template>

<script>

import moment from "moment";

export default {
    name: "filterOption",
    components: {
//
    },
    data: function() {
        return {
            ampleur: ['Faible','Moyenne', 'Fore'],
            filter: true,
            filterCheckedModel: [[], [], [], [], [], []],
            impact: ['Faible','Moyenne', 'Fore'],
            selected: [],
            search:'',
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
            console.log(group);
            console.log(element);
            if (group == 4){
                if (this.filterCheckedModel[group].includes(element)) {
                    var index = this.filterCheckedModel[group].indexOf(element);
                    this.filterCheckedModel[group].splice(index, 1);
                }else{
                    this.filterCheckedModel[group].push(element).toString();
                }
            }
            if (this.filterCheckedModel[group].includes(element)) {

                var index = this.filterCheckedModel[group].indexOf(element);

                this.filterCheckedModel[group].splice(index, 1);
            } else if ( group != 5){
                this.filterCheckedModel[group].push(element);
            }
            this.filters();
        },
        filterLayers: function() {
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
    watch:{
        search: function (newText){
            if(newText.length >= 4){
                this.filterLayers();
                this.filterCheckedModel[5][0] = newText;
            }else{
                this.filterCheckedModel[5] = [];
                this.filterLayers();
            }
        },
        filterCheckedModel: function (test){
            this.filters();
        }
    },
    filters: {
        impact(value) {
            if (value) {
                return moment(String(value)).format("MM/DD/YYYY");
            }
        },
    }
}

</script>

