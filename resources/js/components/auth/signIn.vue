<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ofsset-md-3 jumbotron">
                <div class="card card-log">
                    <div class="card-header">Login{{form}}</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label class="col-form-label" for="email">Email:</label>
                                <input type="text" name="email" id="email" v-model="form.username" />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="password">Password:</label>
                                <input type="password" name="password" id="password" v-model="form.password" />
                            </div>
                            <button class="btn btn-long btn-success" type="submit">Sagnin</button>
                        </form>
                    </div>
                </div>
                <li>
                    <router-link
                        :to="{ name: 'register' }"
                    >register</router-link
                    >
                </li>
            </div>
        </div>
    </div>
</template>

<script>
// @ is an alias to /src
import { mapActions } from 'vuex';
export default {
    name: 'SignIn',
    components: {},
    data() {
        return {
            form:{},
        };
    },
    methods: {
        ...mapActions({
            signIn: 'auth/signIn',
        }),
        submit() {
            this.signIn(this.form).then(() => {
                this.$router.replace({
                    name: 'Home',
                });
            });
        },
    },
};
</script>
