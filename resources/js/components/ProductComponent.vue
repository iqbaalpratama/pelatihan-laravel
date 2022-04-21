<template>
    <div class="main-page">
        <h3><b>Semua Produk</b></h3>
        <h5><b>{{ totalProduct }} Produk</b></h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in productList" :key="index">
                    <td>
                        {{ product.name }}
                    </td>
                    <td>
                        {{ product.description }}
                    </td>
                    <td>
                        {{ product.stock }}
                    </td>
                    <td>
                        Rp. {{ product.price }}
                    </td>
                    <td>
                        <button-component @emitClick="addToCart(product)" text="Add to Cart"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
import ButtonComponent from './ButtonComponent.vue'
import {mapGetters} from 'vuex';
export default {
    name: "ProductComponent",
    data() {
        return {
        }
    },
    computed: {
        ...mapGetters({
            productList: 'getProducts',
            totalProduct: 'getTotalProduct'
        })
    },
    methods: {
        addToCart(data) {
            this.$store.dispatch('addToCart', data);
        },
    },
    mounted() {
        this.$store.dispatch('getProducts');
    },
}
</script>