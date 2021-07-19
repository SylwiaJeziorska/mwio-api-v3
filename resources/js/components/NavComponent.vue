<template xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-3 d-xs-none d-flex justify-content-center">
            <img class="comd-12 nav-logo" src="imgs/logoIO.jpg"  @click="home">
        </div>
        <div class="col-md-9 d-xs-none">
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">

            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            to="/Map"
                        >CARTE INTERACTIVE</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            :to="{ name: 'newInstallation' }">DECLARER UNE INSTALLATION</router-link
                        >
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <router-link-->
<!--                            class="nav-link"-->
<!--                            to="/PrivacyPolicy"-->
<!--                        >PrivacyPolicy</router-link-->
<!--                        >-->
<!--                    </li>-->
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            to="/Contact"
                        >CONTACT</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            to="/InstallationsObsoletes"
                        >INSTALLATION OBSOLETES</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            :to="{name:'MountainWilderness'}"
                        > Mountain Wilderness</router-link
                        >
                    </li>
                    <li v-if="!user" class="nav-item">
                        <router-link
                            class="nav-link"
                            :to="{ name: 'signIn' }"
                        >MON COMPTE</router-link
                        >
                    </li>
<!--                    <li v-if="user"class="nav-item">-->
<!--       -->
<!--                    </li>-->
                    <li v-if="user" class="nav-item">

                    </li>

                    <li v-if="user" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{user.name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"><span v-on:click="signOut">logout</span></a>
                            <router-link
                                class="dropdown-item"
                                :to="{ name: 'User', params: { id: user.id } }">
                                <span>Account</span></router-link>

                            <router-link
                                v-if="admin || superAdmin"
                                class="dropdown-item"
                                :to="{ name: 'Installations' }">
                                <span>Admin</span></router-link>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
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
            admin: 'auth/admin',
            superAdmin: 'auth/superAdmin'
        }),

    },
    methods:{
        ...mapActions({
            logout: 'auth/logout',
        }),
        home(){
            router.replace({
                name: 'Home',
            }).catch(()=>{});
        },
        signOut(){
            this.logout().then(() => {
                router.replace({
                    name: 'Home',
                }).catch(()=>{});
            });
        }
    },

}
</script>
