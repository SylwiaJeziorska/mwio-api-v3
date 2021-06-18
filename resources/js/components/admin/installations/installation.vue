<template>
    <div class="row">
        <div class="col-md-4">
            <div class="text-col pl-3 vh-100">
                <form class="form-creat" @submit="submit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="csrf" />
                    <input type="hidden" name="_method" value />
                    <label>Statut de l'IO</label>
                    <div class="form-group">
                        <div class="row m-3 justify-content-between">
                            <p for="validee">
                                Validee
                                <input class="ml-4" type="checkbox" v-model="fields.validee" id="validee" :true-value="1" :false-value="0" />
                            </p>
                            <p for="demontee">
                                Demontee
                                <input class="ml-4" type="checkbox" v-model="fields.demontee" id="demontee" :true-value="1" :false-value="0" />
                            </p>
                        </div>

                        <div class="input-group-addon"></div>
                    </div>
                    <div class="form-group">
                        <div class="row m-3 justify-content-between">
                            <p for="a_valider">
                                Corbeille
                                <input class="ml-4" type="checkbox" v-model="fields.a_valider" id="a_valider" :true-value="2" :false-value="0" />
                            </p>
                            <p for="modifiee">
                                En projet
                                <input class="ml-4" type="checkbox" v-model="fields.modifiee" id="modifiee" :true-value="1" :false-value="0" />
                            </p>
                        </div>

                        <div class="input-group-addon"></div>
                    </div>
                    <div class="form-group">
                        <label>Auteurs de la déclaration</label>
                        <div class="p-3">
                            <h3 v-for="u in io.user">{{ u.name }} {{ u.prenome }}</h3>
                        </div>
                    </div>
                    <div class="p-0 mb-1 group-demontage">
                        <label data-toggle="collapse" data-target="#demontage">
                            Formulaire demontage
                            <span class="pl-2">&#x2193;</span>
                        </label>
                        <div id="demontage" class="form-group collapse">
                            <div class="form-group mt-2">
                                <label for="date_demontage">Date de démontage</label>
                                <input type="date" class="form-control input-date" v-model="fields.date_demontage" id="date_demontage" />
                            </div>
                            <div class="form-group">
                                <label for="duree_chantier">Durée de démontage</label>
                                <input type="text" class="form-control" v-model="fields.duree_chantier" id="duree_chantier" />
                            </div>
                            <div class="form-group row m-0 group-type-ch">
                                <label for="type_chantier" id="type_chantie">Type chantier :</label
                                >
                                <div class="col-md-6 pt-3 pb-3">
                                    <input
                                        id="benevole"
                                        for="type_chantier"
                                        type="radio"
                                        v-model="fields.type_chantier"
                                        value="Chantier bénévole"
                                    />
                                    <label
                                        for="benevole"
                                        class="bg-transparent d-inline input-label"
                                    >Bénévole</label
                                    >
                                </div>
                                <div class="col-md-6 pt-3 pb-3">
                                    <input
                                        id="professionnel"
                                        for="type_chantier"
                                        type="radio"
                                        v-model="fields.type_chantier"
                                        value="professionnel"
                                    />
                                    <label
                                        for="professionnel"
                                        class="input-label bg-transparent d-inline"
                                    >Professionnel</label
                                    >
                                </div>
                                <div class="col-md-6 pt-3 pb-3">
                                    <input
                                        id="mix"
                                        for="type_chantier"
                                        type="radio"
                                        v-model="fields.type_chantier"
                                        value="mix"
                                    />
                                    <label for="mix" class="input-label bg-transparent d-inline"
                                    >Mixte bénévole et professionnel</label
                                    >
                                </div>
                                <div class="col-md-6 pt-3 pb-3">
                                    <input
                                        id="none"
                                        for="type_chantier"
                                        type="radio"
                                        v-model="fields.type_chantier"
                                        value="Non renseigné"
                                    />
                                    <label
                                        for="none"
                                        class="input-label bg-transparent d-inline"
                                    >Ne sait pas</label
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="commentaires_chantier"
                                >Commentaires chantier</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="fields.commentaires_chantier"
                                    id="commentaires_chantier"
                                />
                            </div>
                            <div class="form-group">
                                <label for="nom_partenaires">Partenaires</label>
                                <input type="text" class="form-control" v-model="fields.nom_partenaires" id="nom_partenaires" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_releve">Date de déclaration</label> <br/>
                        {{fields.date_releve | formatDate}}
                        <input type="date" class="form-control input-date" v-model="fields.date_releve" id="date_releve"/>
                    </div>
                    <div class="form-group">
                        <label for="lieu_dit">Lieu Dit</label>
                        <input type="text" class="form-control" v-model="fields.lieu_dit" id="lieu_dit" />
                    </div>
                    <div class="form-group row m-0 group-class">
                        <label id="classe">Classe d'installation :</label>
                        <div class="col-lg-4 col-md-6" v-for="classe in classes">
                            <div class="col-md-11 mx-auto class-img" :class="classe.class"></div>
                            <input type="checkbox" v-bind:checked="classe.enabled" v-on:change="toggle(classe, classe.text)" />
                            <span class="input-label">{{ classe.text }}</span>
                        </div>
                        <hr />
                    </div>
                    <div class="form-group mt-5">
                        <label for="etat">Nature-état *</label>
                        <textarea type="text" class="form-control" v-model="fields.etat" id="etat" row="1"></textarea>
                    </div>
                    <div class="form-group row m-0 group-origine">
                        <label class="bg-lgrey" for="origine">Origine</label>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img touristique"></div>
                            <div class="group-class-label">
                                <input type="radio" v-model="fields.origine" value="Touristique" />
                                <span class="input-label">Touristique</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img agricole"></div>
                            <div class="group-class-label">
                                <input type="radio" v-model="fields.origine" value="Agricole" />
                                <span class="input-label">Agricole</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img routier"></div>
                            <div class="group-class-label">
                                <input type="radio" v-model="fields.origine" value="Equipement routier" />
                                <span class="input-label">Equipement routier</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img industrielle"></div>
                            <div class="group-class-label">
                                <input type="radio" v-model="fields.origine" value="Industrielle" />
                                <span class="input-label">Industrielle</span>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img militaire"></div>
                            <div class="group-class-label">
                                <input type="radio" v-model="fields.origine" value="Militaire" />
                                <span class="input-label">Militaire</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img inconnue"></div>
                            <div class="group-class-label">
                                <input type="radio" v-model="fields.origine" value="Inconnue" />
                                <span class="input-label">Inconnue</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="proprio_terrain">Propriétaire du terrain</label>
                        <textarea id="proprio_terrain" v-model="fields.proprio_terrain" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="proprio_io">Propriétaire IO</label>
                        <textarea id="proprio_io" v-model="fields.proprio_io" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ampleur" id="ampleur" size="1">Ampleur</label>
                        <div class="col-md-12 pt-3 pb-3">
                            <input id="sais_pas" type="radio" v-model="fields.ampleur" value="0" />
                            <label for="sais_pas" class="bg-transparent d-inline input-label">Je ne sais pas</label
                            >
                        </div>
                        <div class="col-md-12 pt-3 pb-3">
                            <input
                                id="petit"
                                type="radio"
                                v-model="fields.ampleur"
                                value="1"
                            />
                            <label for="petit" class="bg-transparent d-inline input-label">
                                Petit et isolé (un pylône, un cabanon, dizaines de mètres de
                                clôture ou barbelés...)
                            </label>
                        </div>
                        <div class="col-md-12 pt-3 pb-3">
                            <input id="moyen" type="radio" v-model="fields.ampleur" value="2" />
                            <label for="moyen" class="bg-transparent d-inline input-label">
                                Moyen (une remontée mécanique, un bâtiment, centaines de
                                mètres de clôture ou barbelés...
                            </label>
                        </div>
                        <div class="col-md-12 pt-3 pb-3">
                            <input id="grand" type="radio" v-model="fields.ampleur" value="3" />
                            <label for="grand" class="bg-transparent d-inline input-label">
                                Grand et étendu (plusieurs remontées mécaniques, plusieurs
                                bâtiments, kilomètres de clôture ou barbelés...).
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="impact" for="impact" size="1">Impact</label>
                        <div class="col-md-12 pt-3 pb-3">
                            <input id="sais_pas_impact" type="radio" v-model="fields.impact" value="0" />
                            <label for="sais_pas_impact" class="bg-transparent d-inline input-label">Je ne sais pas</label
                            >
                        </div>
                        <div class="col-md-12 pt-3 pb-3">
                            <input
                                id="faible"
                                type="radio"
                                v-model="fields.impact"
                                value="1"
                            />
                            <label for="faible" class="bg-transparent d-inline input-label">
                                Impact faible (élément inerte, matériaux autochtones, peu
                                visible...)
                            </label>
                        </div>
                        <div class="col-md-12 pt-3 pb-3">
                            <input id="moyen_impact" type="radio" v-model="fields.impact" value="2" />
                            <label for="moyen_impact" class="bg-transparent d-inline input-label">
                                Impact moyen (matériaux exogènes, visible localement...)
                            </label>
                        </div>
                        <div class="col-md-12 pt-3 pb-3">
                            <input id="fort" type="radio" v-model="fields.impact" value="3" />
                            <label for="fort" class="bg-transparent d-inline input-label">
                                Impact fort (effluents polluants, piège pour la faune, risque
                                pour les personnes, visible à grande distance...)
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="patrimonialite" id="patrimonialite">Patrimonialité</label
                        >
                        <div class="col-md-4 pt-3 pb-3">
                            <input
                                id="sais_pas_patrimonialite"
                                type="radio"
                                v-model="fields.patrimonialite"
                                value="Je ne sais pas"
                            />
                            <label
                                for="sais_pas_patrimonialite"
                                class="bg-transparent d-inline input-label"
                            >Je ne sais pas</label
                            >
                        </div>
                        <div class="col-md-4 pt-3 pb-3">
                            <input
                                id="possible"
                                type="radio"
                                v-model="fields.patrimonialite"
                                value="Possible"
                            />
                            <label
                                for="possible"
                                class="bg-transparent d-inline input-label"
                            >Possible</label
                            >
                        </div>
                        <div class="col-md-4 pt-3 pb-3">
                            <input
                                id="probable"
                                type="radio"
                                v-model="fields.patrimonialite"
                                value="Probable"
                            />
                            <label
                                for="probable"
                                class="bg-transparent d-inline input-label"
                            >Probable</label
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dimensions">Dimensions</label>
                        <textarea rows="1" type="text" class="form-control" v-model="fields.dimensions" id="dimensions"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <textarea id="nombre" v-model="fields.nombre" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="accessibilite">Accessibilité</label>
                        <textarea id="accessibilite" v-model="fields.accessibilite" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="facilite_demontage">Facilité démontage</label>
                        <textarea id="facilite_demontage" v-model="fields.facilite_demontage" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="commentaires">Commentaires</label>
                        <textarea id="commentaires" v-model="fields.commentaires" class="form-control" rows></textarea>
                    </div>

                    <div class="form-group input-group control-group increment" style=":flex ; flex-direction: column">
                        <label for="image">Image</label>
                        <br />
                        <div>
                            <!-- Carousel items have `.embed-responsive-item` -->
                            <div class="row">
                                <div :id="'id-' + img.id" class="p-2" v-for="(img, idx) in media">
                                    <p class="pl-3" @click="deletImg(img.id)">
                                        <span class="deleteFile float-right">&#x274C;</span>
                                    </p>
                                    <img height="200px" v-bind:src="'/img/' + img.file_name" />
                                    <div>
                                        <h5>{{ img.original_name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input class="browse" style="display: none" @change="onImageChange" ref="fileInput" type="file" />
                        <br />
                        <div class="form-group text-left">
                            <button type="button" @click="$refs.fileInput.click()" class="file btn btn-light mt-4">
                                Sélectionner des fichiers
                            </button>
                        </div>
                        <div>
                            <p v-for="item in filesNames" @click="deleteFile(item)">
                                {{ item }}
                                <span class="deleteFile">&#x274C;</span>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text-right col-lg-6 col-md-12">
                            <p class="btn btn-success btn-lg w-100">
                                <a href>Pas d'action</a>
                            </p>
                        </div>
                        <div class="form-group text-right col-lg-6 col-md-12">
                            <input type="submit" id="save" class="btn btn-success btn-lg ave w-100" value="Sauvegarder"/>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <input class="btn btn-danger w-100 offset-md-1 mb-2" @click="deleteme(fields.index)" type="button" name="button" value="Suprimer la fiche" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <single-installation-map :io="true" :lat-lng="marker"></single-installation-map>
            <new-installation-map :test="marker"> </new-installation-map>
        </div>
    </div>
</template>
<script>
import SingleInstallationMap from "../../maps/singleInstallationMap";
import moment from "moment";
import NewInstallationMap from "../../maps/newInstallationMap";
export default {
    name: "installation",
    components: {NewInstallationMap, SingleInstallationMap},
    props: ["fields", "marker"],
    data() {
        return {
            io:{},
            tovalider: 0,
            banished: 3,
            banni: false,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            errors: [],
            files: [],
            filesNames: [],
            ios: false,
            ioList: true,
            test: [],
            mypol: false,
            output: "",
            // selected: '',
            // situation: "",
            classes: [
                {
                text: "Déchets",
                enabled: false,
                class: "dechets",
            },
                {
                    text: "Pylones",
                    enabled: false,
                    class: "pilone",
                },
                {
                    text: "Blocs de bétons",
                    enabled: false,
                    class: "blockbeton",
                },
                {
                    text: "Bâtiments",
                    enabled: false,
                    class: "batiment",
                },
                {
                    text: "Gravats",
                    enabled: false,
                    class: "gravats",
                },
                {
                    text: "Fondations",
                    enabled: false,
                    class: "fondations",
                },
                {
                    text: "Conduites",
                    enabled: false,
                    class: "conduites",
                },
                {
                    text: "Fils ou câbles",
                    enabled: false,
                    class: "cable",
                },
                {
                    text: "Poutres métalliques",
                    enabled: false,
                    class: "poutres",
                },
                {
                    text: "Tôles",
                    enabled: false,
                    class: "tole",
                },
                {
                    text: "Barbelés et clôtures",
                    enabled: false,
                    class: "barbele",
                },
                {
                    text: "Autre",
                    enabled: false,
                    class: "autre",
                },
            ],
            zoom: 6,
            center: "",
            testy:'10/10/2021'
        };
    },
    methods: {
        deleteFile: function(item) {
            // this.files.splice(this.files.indexOf(item), 1);
            let test = this.filesNames.indexOf(item);
            this.filesNames.splice(this.files.indexOf(item), 1);
            this.files.splice(test);
        },
        onImageChange(event) {
            // this.files =event.target.files;
            if (
                event.target.files[0].type == "image/png" ||
                event.target.files[0].type == "image/jpg" ||
                event.target.files[0].type == "image/jpeg"
            ) {
                if (event.target.files[0].size < 792171) {
                    this.files.push(event.target.files[0]);
                    this.filesNames.push(event.target.files[0].name);
                    //  this.fields.images.push(event.target.files[0]);
                } else {
                    alert(
                        "La taille du fichier est supérieure au maximum autorisé (1Mo)"
                    );
                }
            } else {
                alert("Image doit être au format png jpg ou jpeg");
            }
        },
        submit(e) {
            e.preventDefault();
            let currentObj = this;
            const fd = new FormData();
            for (let i = 0; i < this.files.length; i++) {
                fd.append("IoFiles[]", this.files[i]);
            }
            fd.append("IoFiles", this.files);
            fd.append("fields", JSON.stringify(this.fields));
            fd.append("_method", "PATCH");
            axios
                .post("api/ios/" + this.fields.id, fd, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then(function(response) {
                    currentObj.output = response.data;
                  //  window.location.href = "/administration-io#";
                })
                .catch(function(error) {
                    console.log(error);
                    currentObj.output = error;
                });
            this.ios = false;
            this.ioList = true;
           // location.reload();
        },
        deletImg(item) {
            this.fields.delete.push(item);
            $("#id-" + item).hide();
        },
        toggle(classe, text) {
            if (classe.enabled == true) {
                this.fields.classe.pop(text);
            } else {
                this.fields.classe.push(text);
            }
            classe.enabled = !classe.enabled;
        },
        getAlreadyCheckedClasse(io) {
            var search_tags = io.classe.split(",");
            var myclass = this.classes;
            var classeArray = [];
            for (var i = 0; i < search_tags.length; i++) {
                myclass.filter(function(elem) {
                    if (elem.text == search_tags[i]) {
                        elem.enabled = true;
                        classeArray.push(search_tags[i]);
                    }
                });
            }
            return classeArray;
        },
        deleteme(index) {
            axios
                .delete("api/io/" + this.fields.id, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then(function(response) {
                    //  window.location.href = "/administration-io#";
                })
                .catch(function(error) {
                    console.log(error);
                    currentObj.output = error;
                });
            this.iosColection.splice(index, 1);
            this.ios = false;
            this.ioList = true;
            location.reload();
        },
        formatClasse(value) {
            var search_tags = value.split(",");
            var myclass = this.classes;
            var classeArray = [];
            for (var i = 0; i < search_tags.length; i++) {
                myclass.filter(function(elem) {
                    if (elem.text == search_tags[i]) {
                        elem.enabled = true;
                        classeArray.push(search_tags[i]);
                    }
                });
            }
            console.log(classeArray);
            return classeArray;
        },
    },
    created() {
        this.formatClasse(this.fields.classe);
        this.fields.delete = [];
    },
    computed: {
        media: function (){
            return this.$store.state.installations.media;
        },
        contributors: function (){
            return this.$store.state.installations.contributors;

        },
    },
    filters: {
        formatDate(value) {
            if (value) {
                return moment(String(value)).format("MM/DD/YYYY");
            }
        },
    }


};
</script>
