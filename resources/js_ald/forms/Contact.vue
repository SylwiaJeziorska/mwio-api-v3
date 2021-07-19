<template>
    <div class="col-md-10 offset-md-1 contact-form-wrapper pb-5">

        <form class="form" @submit="submit">
            <div class="form-group row">
                <input
                    required
                    name="name"
                    v-model="contact.name"
                    placeholder="Nom"
                    type="text"
                    autocomplete="off"
                    class="form-control"
                />
            </div>
            <div class="form-group row">
                <input
                    required
                    name="email"
                    v-model="contact.email"
                    placeholder="E-mail"
                    type="email"
                    autocomplete="off"
                    class="form-control"
                />
            </div>
            <div class="form-group row">
        <textarea
            name="message"
            v-model="contact.message"
            rows="4"
            placeholder="Message"
            class="form-control"
        ></textarea>
            </div>
            <div class="row justify-content-end">
                <button class="button btn btn-success pl-4 pr-4">Envoyer</button>

            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            contact: {
                name: '',
                email: '',
                message: '',
            },
        };
    },
    methods: {
        submit(e){
            e.preventDefault();

            let formData = {
                name:this.contact.name,
                email:this.contact.email,
                message:this.contact.message,
            };
            axios.post('/api/contact', formData).then(function(response) {
                //currentObj.output = response.data;
                alert("Merci d'avoir envoyé un e-mail");
                window.location.href = "/#/installationsobsoletes";
            }).catch(function(error) {
                console.log(error.response.status);
                currentObj.output = error;
            });
        }
    }
};
</script>

