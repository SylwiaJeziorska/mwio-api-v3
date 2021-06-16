<template>
    <div class="container nav">
        <div class="app-wraper">
            <div class="row nav-row">
                <nav id="nav">
                    <ul class="links">
                        <li class="scrolly" href="#header">
                            <router-link
                                to="/"
                            >home</router-link
                            >
                        </li>
                        <li v-if="!user" class="scrolly" href="#header">
                            <router-link
                                :to="{ name: 'register' }"
                            >register</router-link
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
                                to="/new"
                            >new</router-link
                            >
                        </li>
                        <li v-if="user">
                            <router-link :to="{ name: 'Admin' }">
                                <span>Admin</span></router-link>
                        </li>
                        <li v-if="user">
                            <router-link :to="{ name: 'User', params: { id: user.id } }">
                                <span>{{user.name}}</span></router-link>
                        </li>
                        <li v-if="user">
                                <span v-on:click="logout">logout</span>
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
    },
    mounted() {
    }
}
</script>
