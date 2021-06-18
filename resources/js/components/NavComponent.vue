<template>
    <div class="container nav">
        <div class="app-wraper vw-100">
            <div class="row nav-row">
                <nav id="nav" class="vw-100">
                    <ul class="links d-flex flex-row justify-content-between">
                        <li class="scrolly" href="#header">
                            <router-link
                                to="/"
                            >home</router-link
                            >
                        </li>
                        <li class="scrolly" href="#header">
                            <router-link
                                to="/PrivacyPolicy"
                            >PrivacyPolicy</router-link
                            >
                        </li>
                        <li class="scrolly" href="#header">
                            <router-link
                                to="/Contact"
                            >Contact</router-link
                            >
                        </li>
                        <li class="scrolly" href="#header">
                            <router-link
                                to="/InstallationsObsoletes"
                            >Installations Obsoletes</router-link
                            >
                        </li>
                        <li class="scrolly" href="#header">
                            <router-link
                                :to="{name:'MountainWilderness'}"
                            > Mountain Wilderness</router-link
                            >
                        </li>

                        <li v-if="!user" class="scrolly" href="#header">
                            <router-link
                                :to="{ name: 'signIn' }"
                            >signIn</router-link
                            >
                        </li>
                        <li v-if="user" class="scrolly" href="#header">
                            <router-link
                                :to="{ name: 'newInstallation' }">new</router-link
                            >
                        </li>
                        <li v-if="user" >
                            <router-link :to="{ name: 'Installations' }">
                                <span>Admin</span></router-link>
                        </li>
                        <li v-if="user">
                            <router-link :to="{ name: 'User', params: { id: user.id } }">
                                <span>{{user.name}}</span></router-link>
                        </li>
                        <li v-if="user">
                                <span v-on:click="signOut">logout</span>
                        </li>

                    </ul>
                </nav>
            </div>
            <router-view name="front"></router-view>
        </div>    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import { mapActions } from 'vuex';
import router from '../router'
export default {
    name: 'NavComponent',
    computed: {
        ...mapGetters({
            user: 'auth/user',
        }),
    },
    methods:{
        ...mapActions({
            logout: 'auth/logout',
        }),
        signOut(){
            this.logout().then(() => {
                router.replace({
                    name: 'Home',
                }).catch(()=>{});
            });
        }
    },
    mounted() {
    }
}
</script>
