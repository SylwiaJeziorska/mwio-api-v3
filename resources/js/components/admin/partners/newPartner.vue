<template>
    <div class="row justify-content-center">
        <div class="col-md-6 ofsset-md-3 jumbotron">
            <div class="card card-log">
                <div class="card-body">
                    <form @submit.prevent="submit">
                        <div>
                            <label>Nom </label><br>
                            <input id="name" v-model="partner.name" maxlength="20">
                        </div>
                        <div class="form-group input-group control-group increment" style=" : flex; flex-direction: column;">
                            <label for="logo">Logo</label>
                            <br />
                            <input class="browse" style="display: none" @change="onImageChange" ref="fileInput" type="file">
                            <br />
                            <div v-if="!partner.image" class="form-group text-left ">
                                <a type="button" @click="$refs.fileInput.click()" class="file file-btn btn btn-light mt-4 w-100"> Sélectionner vos fichiers </a>
                            </div>

                        </div>
                        <div v-if="partner.image">
                            <img :src="partner.image" />
                            <button @click="removeImage">&#x274C;</button>
                        </div>

                        <div>
                            <button class="btn btn-long btn-success" type="submit">????</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions} from 'vuex';

export default {
    data() {
        return {
            partner:{
                image:''
            },
            img:'',
        };
    },
    methods: {
        ...mapActions({
            newPartner: 'partners/newPartner',
        }),
        submit() {
            let fd= new FormData()

            fd.append('image', this.img);
            fd.append('name', this.partner.name);

            this.newPartner(fd).then(() => {
                this.$router.replace({
                    name: 'Home',
                });
            });
        },
        onImageChange(e){
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.img = files[0];
            this.createImage(files[0]);
        },
        createImage(file) {
            var reader = new FileReader();
            var vm = this;
            reader.onload = (e) => {
                vm.partner.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage(e){
            this.partner.image = '';
        }
    },
}
</script>
