<template>
    <div class='pop-up'>

        <!-- <img v-bind:src="img" height="50px;"> -->
        <!-- <figcaption>{{origin}}</figcaption> -->
        <p>
           {{lieu}}
        </p>
        <p @click="link" >Voir</p>
<!--        <a class="voir text-light btn btn-block btn-success" v-bind:href="url">Voir </a>-->


    </div>

</template>

<script>
import router from "../router";
    export default {
        name: 'GeoJson2Popup',
        props: ['id', 'date', 'origin', 'lieu'],
        data: function () {
            return {
                url: "/installation/" + this.id,
                img: 'imgs/' + this.origin + '.jpg'
            }
        },
        methods: {
            link(){
                router.push({ name: 'singleInstallation', params: { id: this.id } })
            }
        }
    }
</script>
<style scoped>
    @import "~leaflet/dist/leaflet.css";

    html,
    body {
        height: 100%;
        margin: 0;
    }
    .pop-up > a{
      width: 200px;

    }
    .leaflet-popup{
        widows: 250px;
    }
    .leaflet-popup-content p{
        text-align: center;
        margin: 18px!important;
    }
    .leaflet-container a{
        width: 100%;
    }
    .pop-up{
        width: 212px!important;
    }
</style>
