<template>
    <div class="main-page">
        <h3><b>Keranjang</b></h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(cart, index) in cart.items" :key="index">
                    <td>
                        {{ cart.name }}
                    </td>
                    <td>
                        {{ cart.price }}
                    </td>
                    <td>
                        {{ cart.quantity }}
                    </td>
                    <td>
                        <button-component @emitClick="deleteFromCart(cart)" text="Delete"/>
                    </td>
                </tr>
                <tr>
                    <td> <strong>Total</strong></td>
                    <td colspan="3"><strong>{{ cart.totalPrice }}</strong></td>
                </tr>
            </tbody>
        </table>
        <div class="button-checkout">
            <button-component @emitClick="checkout(cart.items)" text="Checkout"/>
        </div>
    </div>
</template>


<script>
import ButtonComponent from './ButtonComponent.vue'
import {mapGetters} from 'vuex';
export default {
  components: { ButtonComponent },
    name: "CartComponent",
    data() {
        return {
        }
    },
    computed: {
        ...mapGetters({
            cart: 'getCarts'
        })
    },
    methods: {
        deleteFromCart(data) {
            this.$store.dispatch('deleteFromCart', data);
        },
        checkout(data) {
            alert('The money you should paid is Rp. '+ this.cart.totalPrice)
        },
    },
    mounted() {
    },
}
</script>