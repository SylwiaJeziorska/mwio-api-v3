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
                                Identifiant
                            </label><br/>
                            <input readonly
                                   id="password-confirmation"
                                   v-model="user.id">

                        </div>
                        <div>
                            <label>Banni </label><br>
                            <select name="banni" v-model="user.banni" class="form-control">
                                <option value="1">Oui</option>
                                <option v-if="user.banni == null" value="null">
                                    Non
                                </option>
                                <option v-else value="0">
                                    Non
                                </option>
                            </select>
                        </div>
                        <div>
                            <label>Rôle </label><br>
                            <select name="role" v-model="user.role" class="form-control">
                                <option value="User">Membre</option>
                                <option value="admin">
                                    Modérateur
                                </option>
                                <option value="super-admin">
                                    Admin
                                </option>
                            </select>
                        </div>
                        <button class="btn btn-long btn-success" type="submit">????</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>

import {mapActions} from "vuex";

export default {
    name: 'User',
    props:['id'],
    data() {
        return {
        };
    },
    computed: {
        user: function (){
            return this.$store.getters["users/getUserById"](this.id);
        }
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
