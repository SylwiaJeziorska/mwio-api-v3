<template>
    <div>
        <header class="col-md-12 displayio-heading">
            <h1 class="m-0">{{ io.lieu_dit }}</h1>
        </header>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner embed-responsive embed-responsive-21by9">
                <div
                    class="carousel-item embed-responsive-item"
                    v-for="(img, idx) in media"
                    :key="idx"
                    :class="{ active: idx == 0 }"
                    v-bind:style="{ backgroundImage: 'url(img/' + img.file_name + ')', backgroundSize: bgSize }"
                ></div>
            </div>
        </div>
        <div class="container mb-1 mt-4">
            <div class="row">
                <div class="col-md-6 ml-4">
                    <p>Origine: {{ io.origine }}</p>
                    <p class="text-left">Classe: {{ io.classe | formatClasse }}</p>
                    <p class="text-left" v-if="io.up_date">
                        Mis à jour: {{ io.update_at | formatDate }}
                    </p>
                    <p class="text-left" v-else>
                        Mis à jour: {{ io.created_at | formatDate }}
                    </p>
                </div>
                <div class="col-md-3 ml-5">
                    <img
                        v-if="io.origine == 'Equipement routier'"
                        :src="'imgs/routier.jpg'"
                        height="80px"
                    />

                    <img v-else :src="'imgs/' + io.origine + '.jpg'" height="70px" />
                </div>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#location"
            >
                Les coordonnées
            </h2>
            <div v-if="io.situation" id="location" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">
                    Longitude: {{ io.situation.coordinates[0].toFixed(4) }} <br />Latitude : {{
                        io.situation.coordinates[1].toFixed(4)
                    }}
                </p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#releve"
            >
                Date de relevé
            </h2>
            <div id="releve" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.date_releve }}</p>
            </div>
        </div>
        <div class="container mb-1" v-if="io.demontee > 0">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#demontage"
            >
                Date de démontage
            </h2>
            <div id="demontage" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.date_demontage }}</p>
            </div>
        </div>
        <div class="container mb-1" v-if="io.demontee > 0">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#type_chantier"
            >
                Type chantier
            </h2>
            <div id="type_chantier" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.type_chantier | formatTypeChantier }}</p>
            </div>
        </div>
        <div class="container mb-1" v-if="io.demontee > 0">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#durre_chantier"
            >
                Durée du chantier
            </h2>
            <div id="durre_chantier" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.duree_chantier }}</p>
            </div>
        </div>
        <div class="container mb-1" v-if="io.demontee > 0">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#commentaires_chantier"
            >
                Commentaires chantier
            </h2>
            <div id="commentaires_chantier" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.commentaires_chantier }}</p>
            </div>
        </div>
        <div class="container mb-1" v-if="io.demontee > 0">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#partenaires"
            >
                Nom partenaires
            </h2>
            <div id="partenaires" class="collapse ml-4 mr-4 pl-4">
                <p>{{ io.nom_partenaires }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#ampleur"
            >
                Ampleur
            </h2>
            <div id="ampleur" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.ampleur | formatAmpleur }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#impact"
            >
                Impact
            </h2>
            <div id="impact" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.impact | formatAmpleur }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#patrimonialite"
            >
                Patrimonialité
            </h2>
            <div id="patrimonialite" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.patrimonialite }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2 class="p-2 pl-4 btn-light" data-toggle="collapse" data-target="#etat">
                Nature-état
            </h2>
            <div id="etat" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.etat }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#dimensions"
            >
                Dimensions
            </h2>
            <div id="dimensions" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.dimensions }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#nombre"
            >
                Nombre
            </h2>
            <div id="nombre" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.nombre }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#accessibilite"
            >
                Accessibilité
            </h2>
            <div id="accessibilite" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.accessibilite }}</p>
            </div>
        </div>
        <div class="container mb-1" v-if="io.demontee == 0">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#facilite_demontage"
            >
                Facilité de démontage
            </h2>
            <div id="facilite_demontage" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.facilite_demontage }}</p>
            </div>
        </div>
        <div class="container mb-1">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#commentaires"
            >
                Commentaires
            </h2>
            <div id="commentaires" class="collapse ml-4 mr-4 pl-4">
                <p class="collapse-content">{{ io.commentaires }}</p>
            </div>
        </div>
        <div class="container mb-1 mb-5">
            <h2
                class="p-2 pl-4 btn-light"
                data-toggle="collapse"
                data-target="#contributors"
            >
                Contributeurs
            </h2>
            <div v-if="contributors" id="contributors" class="collapse ml-4 mr-4 pl-4">
                <p v-for="item in contributors">{{ item }}</p>
            </div>
        </div>
    </div>
</template>
<script>
import moment from "moment";
import {mapActions, mapGetters} from 'vuex';
import router from "../../router";


export default {
    name: 'singleInstallationText',
    props:['io'],
    data() {
        return {
            images: [],
            bgSize:"contain"
        };
    },
    methods:{
        getImages() {
            // alert(this.$store.state.installations.media.length);
            if (this.$store.state.installations.media.length < 1) {
                this.images.push({ file_name: "default.jpg" });
            }else {
                this.images= this.media;
            }
        },

    },
    filters: {
        formatDate(value) {
            if (value) {
                return moment(String(value)).format("DD/MM/YYYY");
            }
        },
        // formatUrl(value) {
        //     if (value) {
        //         var url = "img/" + value;
        //         return url;
        //     }
        // },
        formatClasse(value) {
            return value.replace(/,/g, ', ');
        },
        formatAmpleur(value) {
            if (value == 3) {
                return "Fort";
            } else if (value == 2) {
                return "Moyen";
            } else {
                return "Faible";
            }
        },
        formatTypeChantier(val) {
            if(val == "mix"){
                return "Mixte bénévole et professionnel";
            }else{
                return val
            }
        }
    },
    computed: {
        ...mapGetters({
            user: 'installations/user',
        }),
        media: function (){
            return this.$store.state.installations.media;
        },
        contributors: function (){
            return this.$store.state.installations.contributors;

        }
    },
    mounted() {
        this.getImages();
        $(".carousel").carousel({
            interval: 1000,
        });
    }
};
</script>
<style>
.carousel-item{
    background-position: center;
    background-repeat: no-repeat;

}
</style>
