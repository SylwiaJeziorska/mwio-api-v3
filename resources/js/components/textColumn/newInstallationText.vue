<template>
    <div>
        <div class="text-col">
                <div class="d-sm-block">
                    <header class="col-md-12 p-3 pl-5">
                        <h1>Nouvelle installation obsolète?</h1>
                    </header>
                    <div class="col-md-12 p-4">
                        <p> Vous avez remarqué une installation obsolète et vous souhaitez la signaler pour qu'elle apparaisse dans l'inventaire ?</p>
                        <p>Vérifiez tout d'abord qu'elle n'est pas déjà répértoriée, pour éviter des créer des doublons.</p>
                        <p>Vous devez avoir un compte pour pouvoir créer ou modifier la fiche d'une installation obsolète. Cela nous permettra éventuellement de reprendre contact avec vous.</p>
                        <p>Vos modifications devront être validées par un administrateur du site avant d'apparaître sur site.</p>
                    </div>
                    <h2 class="p-4">Placer le pointeur sur la carte à l'endroit où se trouve l'installation. Soyez précis. Vous pouvez zoomer dans la carte.</h2>
                </div>
            <div>
                <form id="form" class='form-creat pl-2 pr-2' @submit="submit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="_method" value="" />
                    <div class="form-group">
                        <label for="date_releve">Date de déclaration *</label>
                        <input type="date" class="form-control input-date required" v-model="fields.date_releve" id="date_releve" value="04/07/2019" required title="Lütfen işaretli yerleri doldurunuz">
                        <div class="input-group-addon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lieu_dit">Lieu Dit *</label>
                        <p class="p-2">
                            <small>Nom du lieu ou de l'installation. A défaut choisir un
                                nom de lieu proche apparaissant sur la carte topographique IGN</small>
                        </p>
                        <input type="text" class="form-control required" v-model="fields.lieu_dit" id="lieu_dit" maxlength="40" required="required">
                    </div>
                    <div class="form-group row m-0 group-class">
                        <label id="classe">Classe d'installation *: </label>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img dechets">

                            </div>
                            <div class="group-class-label">
                                <input id="dechets" type="checkbox" v-model="fields.classe" value="Déchets">
                                <label for="dechets" class="input-label m-0 p-0 bg-transparent d-inline">Déchets</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img pilone">

                            </div>
                            <div class="group-class-label">

                                <input id="pylones" type="checkbox" v-model="fields.classe" value="Pylones">
                                <label for="pylones" class="input-label m-0 p-0 bg-transparent d-inline">Pylones</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img blockbeton">

                            </div>
                            <div class="group-class-label">

                                <input id="blocs-b" type="checkbox" v-model="fields.classe" value="Blocs de bétons">
                                <label for="blocs-b" class="input-label m-0 p-0 bg-transparent d-inline">Blocs de bétons</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img batiment">

                            </div>
                            <div class="group-class-label">

                                <input id="batim" type="checkbox" v-model="fields.classe" value="Bâtiments">
                                <label for="batim" class="input-label m-0 p-0 bg-transparent d-inline">Bâtiments</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img gravats">

                            </div>
                            <div class="group-class-label">

                                <input id="gravats" type="checkbox" v-model="fields.classe" value="Gravats">
                                <label for="gravats" class="input-label m-0 p-0 bg-transparent d-inline">Gravats</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img fondations">

                            </div>
                            <div class="group-class-label">

                                <input id="fondations" type="checkbox" v-model="fields.classe" value="Fondations">
                                <label for="fondations" class="input-label m-0 p-0 bg-transparent d-inline">Fondations</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img conduites">

                            </div>
                            <div class="group-class-label">

                                <input id="conduites" type="checkbox" v-model="fields.classe" value="Conduites">
                                <label for="conduites" class="input-label m-0 p-0 bg-transparent d-inline">Conduites</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img cable">

                            </div>
                            <div class="group-class-label">

                                <input id="fils" type="checkbox" v-model="fields.classe" value="Fils ou câbles">
                                <label for="fils" class="input-label m-0 p-0 bg-transparent d-inline">Fils ou câbles</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto  class-img poutres">

                            </div>
                            <div class="group-class-label">

                                <input id="poutres" type="checkbox" v-model="fields.classe" value="Poutres métalliques">
                                <label for="poutres" class="input-label m-0 p-0 bg-transparent d-inline">Poutres métalliques</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img tole">

                            </div>
                            <div class="group-class-label">
                                <input id="toles" type="checkbox" v-model="fields.classe" value="Tôles">
                                <label for="toles" class="input-label m-0 p-0 bg-transparent d-inline">Tôles</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img barbele">

                            </div>
                            <div class="group-class-label">

                                <input id="clotures" type="checkbox" v-model="fields.classe" value="Barbelés et clôtures">
                                <label for="clotures" class="input-label m-0 p-0 bg-transparent d-inline">Barbelés et clôtures</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 class-box">
                            <div class="col-md-11 mx-auto class-img autre">
                            </div>
                            <div class="group-class-label">
                                <input id="autre-c" type="checkbox" v-model="fields.classe" value="Autre">
                                <label for="autre-c" class="input-label m-0 p-0 bg-transparent d-inline">Autre</label>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="etat">Nature-état *</label>
                        <p class="p-2">
                            <small>Description générale de l'installation. Qu'est ce que c'est (c'était) ? Qu'est ce qu'il en reste ? Dans quel état de dégradation éventuellement ?</small>
                        </p>
                        <textarea type="text" class="form-control required" v-model="fields.etat" id="etat" rows="1" required></textarea>
                    </div>
                    <div class="form-group row m-0 group-origine">
                        <label class="bg-lgrey" for="origine">Origine</label>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img touristique">
                            </div>
                            <div class="group-class-label">
                                <input id="Touristique" type="radio" v-model="fields.origine" value="Touristique">
                                <label for="Touristique" class="input-label">Touristique</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img agricole">
                            </div>
                            <div class="group-class-label">
                                <input type="radio" id="Agricole" v-model="fields.origine" value="Agricole">
                                <label for="Agricole" class="input-label">Agricole</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img industrielle">
                            </div>
                            <div class="group-class-label">
                                <input id="Industrielle" type="radio" v-model="fields.origine" value="Industrielle">
                                <label for="Industrielle" class="input-label">Industrielle</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img militaire">
                            </div>
                            <div class="group-class-label">
                                <input id="Militaire" type="radio" v-model="fields.origine" value="Militaire">
                                <label for="Militaire" class="input-label">Militaire</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img routier">
                            </div>
                            <div class="group-class-label">
                                <input id="routier" type="radio" v-model="fields.origine" value="Equipement routier">
                                <label  for="routier" class="input-label">Equipement routier</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 pl-3">
                            <div class="col-md-12 origine-img inconnue">
                            </div>
                            <div class="group-class-label">
                                <input id="Inconnue" type="radio" v-model="fields.origine" value="Inconnue">
                                <label for="Inconnue" class="input-label">Inconnue</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="proprio_terrain">Propriétaire terrain</label>
                        <small class="p-2">Ce champ ne sera visible que par les administrateurs</small>
                        <textarea id="proprio_terrain" v-model="fields.proprio_terrain" class="form-control " rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="proprio_io">Propriétaire IO</label>
                        <small class="p-2">Ce champ ne sera visible que par les administrateurs</small>
                        <textarea id="proprio_io" v-model="fields.proprio_io" class="form-control " rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ampleur" id="ampleur" size="1">Ampleur</label>
                        <div class="col-md-12 p-3 pb-3">
                            <input id="sais_pas" type="radio" v-model="fields.ampleur" value="0" />
                            <label for="sais_pas" class="bg-transparent d-inline input-label">Je ne sais pas</label>
                        </div>
                        <div class="col-md-12 p-3">
                            <input id="petit" type="radio" v-model="fields.ampleur" value="1" />
                            <label for="petit" class="bg-transparent d-inline input-label">
                                Petit et isolé (un pylône, un cabanon, dizaines de mètres de
                                clôture ou barbelés...)
                            </label>
                        </div>
                        <div class="col-md-12 p-3">
                            <input id="moyen" type="radio" v-model="fields.ampleur" value="2" />
                            <label for="moyen" class="bg-transparent d-inline input-label">
                                Moyen (une remontée mécanique, un bâtiment, centaines de
                                mètres de clôture ou barbelés...
                            </label>
                        </div>
                        <div class="col-md-12 p-3">
                            <input id="grand" type="radio" v-model="fields.ampleur" value="3" />
                            <label for="grand" class="bg-transparent d-inline input-label">
                                Grand et étendu (plusieurs remontées mécaniques, plusieurs
                                bâtiments, kilomètres de clôture ou barbelés...).
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="impact" for="impact" size="1">Impact</label>
                        <div class="col-md-12 p-3">
                            <input id="sais_pas_impact" type="radio" v-model="fields.impact" value="0" />
                            <label
                                for="sais_pas_impact"
                                class="bg-transparent d-inline input-label"
                            >Je ne sais pas</label>
                        </div>
                        <div class="col-md-12 p-3">
                            <input id="faible" type="radio" v-model="fields.impact" value="1" />
                            <label for="faible" class="bg-transparent d-inline input-label">
                                Impact faible (élément inerte, matériaux autochtones, peu
                                visible...)
                            </label>
                        </div>
                        <div class="col-md-12 p-3">
                            <input id="moyen_impact" type="radio" v-model="fields.impact" value="2" />
                            <label for="moyen_impact" class="bg-transparent d-inline input-label">
                                Impact moyen (matériaux exogènes, visible
                                localement...)
                            </label>
                        </div>
                        <div class="col-md-12 p-3">
                            <input id="fort" type="radio" v-model="fields.impact" value="3" />
                            <label for="fort" class="bg-transparent d-inline input-label">
                                Impact fort (effluents polluants, piège pour la faune, risque
                                pour les personnes, visible à grande distance...)
                            </label>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label for="patrimonialite" id="patrimonialite">Patrimonialité</label>
                        <div class="col-md-6 p-3">
                            <input id="possible" type="radio" v-model="fields.patrimonialite" value="Possible"/>
                            <label for="possible"
                                   class="bg-transparent d-inline input-label">Possible</label>
                        </div>
                        <div class="col-md-6 p-3">
                            <input id="probable" type="radio" v-model="fields.patrimonialite" value="Probable"/>
                            <label for="probable"
                                   class="bg-transparent d-inline input-label">Probable</label>
                        </div>
                        <div class="col-md-12 p-3">
                            <input id="sais_pas_patrimonialite" type="radio" v-model="fields.patrimonialite" value="Je ne sais pas"/>
                            <label for="sais_pas_patrimonialite"
                                   class="bg-transparent d-inline input-label">Je ne sais pas</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dimensions">Dimensions</label>
                        <p class="p-2">
                            <small>Par exemple : longueur et dénivelé d'une remontée mécanique, hauteur d'un pylône, emprise au sol d'un bâtiment, volume ou masse de gravats...</small>
                        </p>
                        <textarea rows="1" type="text" class="form-control " v-model="fields.dimensions" id="dimensions" placeholder="" maxlength="100"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <p class="p-2">
                            <small>Pour les installations constituées d'éléments répétitifs. Par exemple : nombre de pylônes d'une remontée mécanique, </small>
                        </p>
                        <textarea id="nombre" v-model="fields.nombre" class="form-control " rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="accessibilite">Accessibilité</label>
                        <p class="p-2">
                            <small>
                                Décrire l'accès à l'installation depuis une route ouverte à la circulation. </br>
                                Préciser les infrastructures situées à proximité qui pourraient être utilisées pour un démontage.
                            </small>
                        </p>
                        <textarea id="accessibilite" v-model="fields.accessibilite" class="form-control " rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="facilite_demontage">Facilité démontage</label>
                        <p class="p-2">
                            <small>
                                Décrire les moyens humains et matériels (équipements, outils) qui seraient nécessaire pour démonter l'installation et évacuer les marériaux jusqu'à une voie ouverte à la circulation.
                            </small>
                        </p>
                        <textarea id="facilite_demontage" v-model="fields.facilite_demontage" class="form-control " rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="commentaires">Commentaires</label>
                        <p class="p-2">
                            <small>
                                Faire ici toute autre remarque ou observation sur la position, la nature, le contexte et l'histoire de l'installation. </br>
                                Contact d'organismes intéressés ou potentiellement opposés à un nettoyage, projet existant, avorté…</br>
                                Si un démontage a déjà été effectué : les informations, contacts, dates…

                                Pour les informations sur l'histoire de l'installation, donner des dates plutôt que des durées pour que l'information ne se périme pas avec le temps.</br>
                            </small>
                        </p>
                        <textarea id="commentaires" v-model="fields.commentaires" class="form-control " rows="3"></textarea>
                    </div>
                    <div class="form-group input-group control-group increment" style=" : flex; flex-direction: column;">
                        <label for="image">Image</label>
                        <br />
                        <p class="p-2">
                            <small>
                                La taille du fichier doit être au maximum de 1Mo.
                            </small>
                            </br>
                            <small>
                                L'image doit être au format png, jpg ou jpeg.
                            </small>
                        </p>
                        <input class="browse" style="display: none" @change="onImageChange" ref="fileInput" type="file">
                        <br />
                        <div class="form-group text-left ">
                            <a type="button" @click="$refs.fileInput.click()" class="file file-btn btn btn-light mt-4 w-100"> Sélectionner vos fichiers (un par un) </a>
                        </div>
                        <div>
                            <p v-for="item in filesNames" @click='deleteFile(item)'>{{item}}
                                <span class="deleteFile"> &#x274C;</span>
                            </p>
                        </div>

                    </div>
                    <div class="form-group text-right ">
                        <input type="submit" id="save" class="btn btn-success ave mr-5 w-100" value="Soumettre">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions } from 'vuex';

export default {
    props: ["situation"],

    data() {
        return {
            auth: "",
            fields: {
                id_membre: this.auth,
                classe: [],
                lieu_dit: "",
                origine: "Inconnue",
                proprio_terrain: "",
                proprio_io: "",
                ampleur: "0",
                impact: "0",
                patrimonialite: "0",
                etat: "",
                dimensions: "",
                nombre: "",
                accessibilite: "",
                facilite_demontage: "",
                commentaires: "",
                situation: null,
            },
            files: [],
            errors: [],
            filesNames: [],
            output: "",
            selected: "",
            markers: [
                {
                    position: {
                        lat: "",
                        lng: "",
                    },
                },
            ],
            mypol: [],
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        };
    },
    methods: {
        deleteFile: function (item) {
            let img = this.filesNames.indexOf(item);
            this.filesNames.splice(this.files.indexOf(item), 1);
            this.files.splice(img);
        },
        onImageChange(event) {
            if (
                event.target.files[0].type == "image/png" ||
                event.target.files[0].type == "image/jpg" ||
                event.target.files[0].type == "image/jpeg"
            ) {
                if (event.target.files[0].size < 1000000) {
                    this.files.push(event.target.files[0]);
                    this.filesNames.push(event.target.files[0].name);
                } else {
                    alert(
                        'La taille du fichier est supérieure au maximum autorisé (1Mo)"'
                    );
                }
            } else {
                alert("Image doit être au format png, jpg ou jpeg");
            }
        },

        submit(e) {
            if (!this.fields.situation) {
                alert(
                    "veuillez pointer sur la carte la position précise de l'installation"
                );
            }
            e.preventDefault();
            let currentObj = this;
            const fd = new FormData();
            for (let i = 0; i < this.files.length; i++) {
                fd.append("IoFiles[]", this.files[i]);
            }
            fd.append("IoFiles", this.files);
            fd.append("fields", JSON.stringify(this.fields));
            this.newInstallation(fd);

        },
        ...mapActions({
            newInstallation: 'installations/newInstallation',
        }),
    },
    watch: {
        // whenever question changes, this function will run
        situation: function (newQuestion) {
           this.fields.situation = newQuestion;
        }
    },
}
</script>
