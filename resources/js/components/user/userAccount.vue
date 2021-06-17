<template>
    <div class="row justify-content-center">
        <div class="col-md-6 ofsset-md-3 jumbotron">
            <div class="card card-log">
                <div class="card-body">
                    <form @submit.prevent="submit">
                        <input type="hidden" id="id" v-model="user.id" maxlength="20">

                        <div>
                            <label>Nom </label><br>
                            <input id="nombre" v-model="user.name" maxlength="20">
                        </div>

                        <div>
                            <label for="prenome">Prénom</label><br>
                            <input type="text" v-model="user.prenome" maxlength="20">
                        </div>
                        <div>
                            <label>Email</label><br>
                            <input type="text" :placeholder="user.email"
                            readonly >
                        </div>
                        <div>
                            <label >
                                Mot de passe
                            </label><br/>
                            <input type="password"
                                   name="password-confirmation"
                                   id="password-confirmation"
                                   v-model="user.password">

                        </div>
                        <div>
                            <label>Confirmez le mot de passe</label><br>
                            <input type="password"
                                   name="password-confirmation"
                                   id="password-confirmation"
                                   v-model="user.password_confirmation">
                            <button class="btn btn-long btn-success" type="submit">????</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    name: 'User',
    data() {
        return {
        };
    },
    computed: {
        ...mapGetters({
            user: 'auth/user',
        }),
    },
        methods: {
            ...mapActions({
                updateUser: 'auth/updateUser',
            }),
            submit() {
                this.updateUser(this.user).then(() => {
                    this.$router.replace({
                        name: 'Home',
                    });
                });
            },
        },
}
</script>
