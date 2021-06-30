<template>
<div class="container">
    <div class="d-flex flex-column">
        <div v-for="(partner, idx) in partners">
            <p>{{partner.name}}</p>
            <div>
                <img :src="'imgs/partners/' + partner.logo_name" height="150px" />

            </div>
            <div class="mt-2">
                <button @click="removeImage(partner.id, idx)">&#x274C;</button>
            </div>
            <hr>

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
        removeImage(id, idx){
            this.removePartner(id);
            this.partners.splice(idx, 1);
        }
    }
}

</script>
