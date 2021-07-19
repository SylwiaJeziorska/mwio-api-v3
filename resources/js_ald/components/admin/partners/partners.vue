<template>
    <div>
        <admin-nav></admin-nav>

        <div class="row mt-5 ml-3">
            <div class="col-md-10 mb-5">
                <button type="button" @click="all=true" class="btn btn-outline-secondary mr-2" name="button">
                    all partners
                </button>
                <button type="button" @click="all=false" class="btn btn-outline-secondary mr-2" name="button">
                    new partner
                </button>
            </div>
        </div>
        <div v-if="all">
            <all-partners :partners="partners"></all-partners>

        </div>
        <div v-else>
            <new-partner></new-partner>
        </div>

    </div>
</template>
<script>
import NewPartner from "./newPartner";
import { mapGetters, mapActions } from 'vuex';
import AllPartners from "./allPartners";
import AdminNav from "../adminNav";
export default {
    name: 'Partners',
    components: {AdminNav, AllPartners, NewPartner},
    data: function() {
        return {
            all:true,
        }
    },
    methods: {
        ...mapActions({
            getPartners: 'partners/partners',
        }),

    },
    mounted() {
        this.getPartners();
    },
    computed: {
        ...mapGetters({
            partners: 'partners/partners',
        }),
    }
}
</script>
</script>
