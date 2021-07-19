<template>
    <div class="mt-5 ml-3">
        <div class="row">
            <div class="col-md-10 mb-5">
                <button type="button" @click="activeUsersClick" class="btn btn-outline-secondary mr-2" name="button">
                    Users
                </button>
                <button type="button" @click="bannedUsersClick" class="btn btn-outline-secondary mr-2" name="button">
                    banned Users
                </button>
            </div>
        </div>
            <table v-if="users" class="table table-bordered table-striped">
                <tr>
                    <th>Plus d'infos</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date Inscription</th>
                    <th>Banni</th>
                    <th>Rôle</th>
                </tr>
                <tr v-for="user in users">
                    <td>
                        <a class="btn btn-success pl-4 pr-4" @click="getUser(user.id)">
                        Voir + d'info
                        </a>
                    </td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.prenome }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                    <td v-if="user.banni == 1">Oui</td>
                    <td v-else>Non</td>
                    <td v-if="user.role == 'super-admin'">Admin</td>
                    <td v-if="user.role == 'admin'">Modérateur</td>
                    <td v-if="user.role == 'user'">Membre</td>F
                </tr>

            </table>
            <user v-if="id" :id="id"></user>
        </div>

</template>
<script>
import {mapGetters} from "vuex";
import User from "./user";

export default {
    name: 'allUsers',
    components: {User},
    //props:['users'],
    data: function() {
        return {
            all:true,
            users:'',
            id:''
        }
    },
    methods: {
        bannedUsersClick(){
            this.id = null;
            this.users = this.storeBannedUsers;
        },
        activeUsersClick(){
            this.id = null;
            this.users = this.storeActiveUsers;
        },
        getUser(id){
            this.users = null;
            this.id = id;
        }

    },
    computed: {
        ...mapGetters({
            storeBannedUsers: 'users/bannedUsers',
            storeActiveUsers: 'users/activeUsers'
        }),


        },
    mounted() {
        this.users = this.storeActiveUsers;
    },

}
</script>

