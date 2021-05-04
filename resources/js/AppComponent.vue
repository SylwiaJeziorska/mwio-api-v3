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
        },
        methods: {
            ...mapActions({
                getInstallations: 'installations/installations',
            }),
        }
    }
</script>
