<template>
    <div class="container-fluid app-main">
        <nav-component></nav-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
</template>

<script>
import NavComponent from './components/NavComponent';
import { mapActions } from 'vuex';
import { mapGetters } from 'vuex';
import footerComponent from "./components/footerComponent";

    export default {
        components: {footerComponent, NavComponent},
        mounted() {
            this.getInstallations();
            //this.$store.state.installations.user = this.$attrs.user;

        },
        methods: {
            ...mapActions({
                getInstallations: 'installations/installations',
            }),
        },
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
            }),
        },
    }
</script>
