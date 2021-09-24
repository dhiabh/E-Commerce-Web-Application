<template>
    <div>
        <span v-if="count === 0"
            id="cart__total"
            >{{ articlesNumber }}</span
        >
        <span v-else
            id="cart__total"
            >{{ count }}</span
        >
    </div>
</template>

<script>
export default {
    props: ['articlesNumber'],
     computed: {
        count() {
            return this.$store.state.count;
        }
    },

    created() {
         this.$store.commit('getPanierCountFromDB');
    }


};
</script>
