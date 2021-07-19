<template>
    <div class="row home-page">
        <div>
            <img  src="images/marker-icon.png"  height="50" @click="home">
        </div>
    </div>
</template>

<script>

import { mapActions } from 'vuex';
import router from "../router";

export default {
    name: 'Home',
    methods:{
        ...mapActions({
            logout: 'auth/logout',
        }),
        home(){
            router.replace({
                name: 'Main',
            }).catch(()=>{});
        },
    },

}
</script>
