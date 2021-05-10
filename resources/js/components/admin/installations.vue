<template>
    <div class="ios-list mt-5 ml-3">
        <div class="row">
            <div class="col-md-10 mb-5">
                <button type="button" @click="tovalider = 0; banished=3; ioList=true; ios=false" class="btn btn-outline-secondary mr-2" name="button">
                    IO à valider
                </button>
                <button type="button" @click="tovalider = 1; banished=3; ioList=true; ios=false" class="btn btn-outline-secondary mr-2" name="button">
                    IO validées
                </button>
                <button type="button" @click="banished = 2;tovalider=3; ioList=true; ios=false" class="btn btn-outline-secondary mr-2" name="button">
                    IO dans la corbeille
                </button>
            </div>
        </div>
        <table class="table io-table table-bordered table-striped" v-if="ioList">
            <tr>
                <th>Link</th>
                <th>Date de relevé</th>
                <th>Origine</th>
                <th>Propriétaire du terrain</th>
                <th>Propriétaire de l'IO</th>
                <th>Lieu Dit</th>

                <th>Ampleur</th>
                <th>Impact</th>
                <th>
                    Patrimo-
                    <br />nialité
                </th>
                <th>Classe</th>
                <th>Etat</th>
                <th>Dimensions</th>
                <th>Nombre</th>
                <th>Accessibilité</th>
                <th>Facilité de démontage</th>
                <th>Commentaires</th>
                <th>valider</th>
            </tr>
            <tr v-for="(i, index) in iosCollection" :key="index">
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    <p class="btn btn-success pl-2 pr-2" @click="getIOFiles(i.id, index)">
                        Modifier
                    </p>
                </td>

                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["date_releve"] }}
                </td>
                <!-- <td> -->
                <!-- {{i['properties']['lieu_dit']}} -->
                <!-- </td> -->
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["origine"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["proprio_terrain"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["proprio_io"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["lieu_dit"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["ampleur"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["impact"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["patrimonialite"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["classe"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["etat"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["dimensions"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["nombre"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["accessibilite"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["facilite_demontage"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["commentaires"] }}
                </td>
                <td v-if="i['properties'].validee == tovalider&& i['properties'].a_valider<2 || i['properties'].a_valider==banished">
                    {{ i["properties"]["validee"] }}
                </td>
            </tr>
        </table>

    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "installations",
    props: ["iosCollection"],
    data() {
        return {
            tovalider: 0,
            banished: 3,
            banni: false,
            errors: [],
            fields: {},
            files: [],
            filesNames: [],
            ios: false,
            io: {},
            ioList: true,
            markers: [],
            test: [],
            mypol: false,
            output: "",
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
        };
    },
    methods: {
        // getIO(id, index) {
        //     var io = this.iosCollection[index].properties;
        //     this.fields = {
        //         a_valider: io.a_valider,
        //         id: this.iosCollection[index].id,
        //         index: index,
        //         id_membre: io.id_membre,
        //         ampleur: io.ampleur,
        //         accessibilite: io.accessibilite,
        //         commentaires: io.commentaires,
        //         classe: this.getAlreadyCheckedClasse(io),
        //         commentaires_chantier: io.commentaires_chantier,
        //         date_releve: io.date_releve,
        //         date_validee: io.date_validee,
        //         date_demontage: io.date_demontage,
        //         demontee: io.demontee,
        //         date_demontage: io.date_demontage,
        //         delete: [],
        //         dimensions: io.dimensions,
        //         duree_chantier: io.duree_chantier,
        //         etat: io.etat,
        //         facilite_demontage: io.facilite_demontage,
        //         impact: io.impact,
        //         lieu_dit: io.lieu_dit,
        //         media: io.media,
        //         modifiee: io.modifiee,
        //         nombre: io.nombre,
        //         nom_partenaires: io.nom_partenaires,
        //         origine: io.origine,
        //         proprio_terrain: io.proprio_terrain,
        //         proprio_io: io.proprio_io,
        //         patrimonialite: io.patrimonialite,
        //         situation: "POINT(" +
        //             io.situation.coordinates[0] +
        //             " " +
        //             io.situation.coordinates[1] +
        //             ")",
        //         type_chantier: io.type_chantier,
        //         validee: io.validee,
        //         //I'm using a _alider to ban some ios before is decided to delete them completely
        //     };
        //     this.ios = true;
        //     this.ioList = false;
        //     this.markers = [{
        //         position: {
        //             lat: io.situation.coordinates[1],
        //             lng: io.situation.coordinates[0],
        //         },
        //     }, ];
        //     this.fields.classe = this.getAlreadyCheckedClasse();
        // },
        getIOFiles(id, index) {
            this.getIo(id);
            this.$emit('clicked', id)

        },

        ...mapActions({
            getIo: 'installations/getIO',
        }),
    },
};
</script>
