<template>
<div class="container">
    <div class="d-flex justify-content-between">
        <div v-for="partner in partners">
            <p>{{partner.name}}</p>
            <img :src="'imgs/partners/' + partner.logo_name" height="150px" />
            <div >
                <button @click="removeImage(partner.id)">&#x274C;</button>
            </div>
        </div>
    </div>

</div>
</template>
<script>
import {mapActions} from "vuex";

export default {
    props: ["partners"],
    methods:{
        ...mapActions({
            removePartner: 'partners/removePartner',
        }),
        removeImage(id){
            alert(id);
            this.removePartner(id);
        }
    }
}

</script>
