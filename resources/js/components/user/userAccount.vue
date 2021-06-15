<template>
    <div class="row">
        <div class="col-md-10 offset-md-2 mt-5">
            <form>
                <div class="form-group">
                    <label>Nom</label>
                    <input id="nombre" v-model="user.name" class="form-control" maxlength="20">
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" :placeholder="user.prenome" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="text" :placeholder="user.email"
                    readonly >
                </div>
                <div class="form-group">
                    <label class="form-check-label" >
                      new password
                    </label><br/>
                    <input type="text">

                </div>
                <div class="form-group">
                    <label>Confirm</label>
                    <input type="text">

                </div>
            </form>
        </div>

    </div>
</template>
<script>
import {mapGetters} from 'vuex';

export default {
    name: 'User',
    computed: {
        ...mapGetters({
            user: 'installations/user',
        }),
    },
}
</script>
