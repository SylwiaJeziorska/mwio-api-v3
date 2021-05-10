<template>
    <div class="container-fluid app-main">
        <nav-component></nav-component>
        <router-view></router-view>

    </div>
</template>

<script>
import NavComponent from './components/NavComponent';
import { mapActions } from 'vuex';

    export default {
        components: {NavComponent},
        mounted() {
            this.getInstallations();
            this.$store.state.installations.user = this.$attrs.user;
        },
        methods: {
            ...mapActions({
                getInstallations: 'installations/installations',
            }),
        }
    }
</script>
