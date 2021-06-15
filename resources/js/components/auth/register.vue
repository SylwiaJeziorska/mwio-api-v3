<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ofsset-md-3 jumbotron">
                <ul class="alert alert-warning" v-if="errors">
                    <li v-for="error in errors" v-bind:key="error">{{error}}</li>
                </ul>
                <div class="card card-log">
                    <div class="card-header">Register{{form}}</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label class="col-form-label" for="name">Nom:</label>
                                <input type="text" name="name" id="name" v-model="form.name"  required autofocus/>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="prenome">Prénom:</label>
                                <input type="text" name="prenome" id="prenome" v-model="form.prenome" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="email">E-Mail:</label>
                                <input type="text" name="email" id="email" v-model="form.email" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="password">Mot de passe:</label>
                                <input type="password" name="password" id="password" v-model="form.password" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="password-confirmation">Confirmer mot de passe:</label>
                                <input
                                    type="password"
                                    name="password-confirmation"
                                    id="password-confirmation"
                                    v-model="form.password_confirmation"
                                />
                            </div>
                            <button class="btn btn-long btn-success" type="submit">
                                S'enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'register',

    data() {
        return {
            form: {},
            errors: null,
        };
    },
    methods: {
        submit() {
            axios
                .post('/api/auth/register', this.form)
                .then((response) => {
                    // this.$router.replace({
                    //     name: 'signin',
                    // });
                    alert(response.data.message);
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        let objErrors = Object.values(error.response.data);
                        this.errors = objErrors.flat();
                    }
                });
        },
    },
};
</script>
