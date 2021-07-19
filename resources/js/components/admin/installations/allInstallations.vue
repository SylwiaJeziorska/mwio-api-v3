<template>
    <div class="ios-list mt-5 ml-3">
        <div class="row">
            <div class="col-md-10 mb-5">
                <button type="button" @click="toValidate" class="btn btn-outline-secondary mr-2" name="button">
                    IO à valider
                </button>
                <button type="button" @click="validated" class="btn btn-outline-secondary mr-2" name="button">
                    IO validées
                </button>
                <button type="button" @click="fromBin" class="btn btn-outline-secondary mr-2" name="button">
                    IO dans la corbeille
                </button>
            </div>
        </div>
        <table class="table io-table table-bordered table-striped">
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
            <tr v-for="(i, index) in ios" :key="index">
                <td>
                    <p class="btn btn-success pl-2 pr-2" @click="getIOFiles(i.id, index)">
                        Modifier
                    </p>
                </td>

                <td>
                    {{ i["properties"]["date_releve"] }}
                </td>
                <!-- <td> -->
                <!-- {{i['properties']['lieu_dit']}} -->
                <!-- </td> -->
                <td>
                    {{ i["properties"]["origine"] }}
                </td>
                <td>
                    {{ i["properties"]["proprio_terrain"] }}
                </td>
                <td>
                    {{ i["properties"]["proprio_io"] }}
                </td>
                <td>
                    {{ i["properties"]["lieu_dit"] }}
                </td>
                <td>
                    {{ i["properties"]["ampleur"] }}
                </td>
                <td>
                    {{ i["properties"]["impact"] }}
                </td>
                <td>
                    {{ i["properties"]["patrimonialite"] }}
                </td>
                <td>
                    {{ i["properties"]["classe"] }}
                </td>
                <td>
                    {{ i["properties"]["etat"] }}
                </td>
                <td>
                    {{ i["properties"]["dimensions"] }}
                </td>
                <td>
                    {{ i["properties"]["nombre"] }}
                </td>
                <td>
                    {{ i["properties"]["accessibilite"] }}
                </td>
                <td>
                    {{ i["properties"]["facilite_demontage"] }}
                </td>
                <td>
                    {{ i["properties"]["commentaires"] }}
                </td>
                <td>
                    {{ i["properties"]["validee"] }}
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "allInstallations",
    props: ["iosCollection"],
    data() {
        return {
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
            ios: null
        };
    },
    methods: {
        getIOFiles(id, index) {
            this.getIo(id);
            this.$emit('clicked', id)

        },
        validated(){
            this.ios = this.ioValidated;
        },
        toValidate(){
            this.ios = this.ioToValidate;
        },
        fromBin(){
            this.ios = this.ioFromBin;
        },
        ...mapActions({
            getIo: 'installations/getIO',
        }),

    },
    computed: {

        ...mapGetters({
            ioValidated: 'installations/ioValidated',
            ioFromBin: 'installations/ioFromBin',
            ioToValidate: 'installations/ioToValidate'
        }),
    },
    mounted() {
        this.ios = this.iosCollection;
    },
};
</script>
