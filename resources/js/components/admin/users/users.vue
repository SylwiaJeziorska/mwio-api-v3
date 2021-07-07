<template>
    <div>
        <admin-nav></admin-nav>
        <div v-if="users">
            <all-users></all-users>

        </div>
    </div>
</template>
<script>
import User from "./user";
import { mapGetters, mapActions } from 'vuex';
import AllUsers from "./allUsers";
import AdminNav from "../adminNav";
export default {
    name: 'Users',
    components: {AdminNav, AllUsers, User},
    data: function() {
        return {
            all:true,
        }
    },
    methods: {
        ...mapActions({
            getUsers: 'users/users',
        }),

    },
    mounted() {
        this.getUsers();
    },
    computed: {
        ...mapGetters({
            users: 'users/users',
        }),
    }
}
</script>

