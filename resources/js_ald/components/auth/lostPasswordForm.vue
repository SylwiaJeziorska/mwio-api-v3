<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ofsset-md-3 jumbotron">
                <div class="card card-log">
                    <div class="card-header">Réinitialiser le mot de passe</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label class="col-form-label" for="email">Email:</label>
                                <input type="text" name="email" id="email" v-model="form.email" />
                            </div>
                            <button class="btn btn-long btn-success" type="submit">Envoyer le lien</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// @ is an alias to /src
import { mapActions } from 'vuex';
import axios from "axios";
export default {
    name: 'lostPasswordForm',
    data() {
        return {
            form:{},
        };
    },
    methods: {
        ...mapActions({
            sendPasswordLink: 'auth/sendPasswordLink',
        }),
        submit(){
            this.sendPasswordLink(this.form);
        }

    },
};
</script>
