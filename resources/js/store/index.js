import Vue from "vue";
import Vuex from "vuex"
import axios from "axios";

Vue.use(Vuex)
export default new Vuex.Store({
    state:{
        products: [],
        carts: [],
        totalPrice: 0,
        totalCart: 0,
        totalProduct: 0,
    },
    getters:{
        getProducts(state) {
            return state.products;
        },
        getCarts(state) {
            return {
                items: state.carts,
                totalPrice: state.totalPrice
            };
        },
        getTotalCart(state) {
            return state.totalCart;
        },
        getTotalProduct(state){
            return state.products.length
        }
    },
    mutations:{
        UPDATE_PRODUCT(state, payload) {
            state.products = [...payload];
        },
        UPDATE_CART(state, payload) {
            state.carts = [...payload];
            var totalPrice = 0;
            var quantity = 0;
            payload.forEach(value => {
                totalPrice += value.product.price * value.quantity
                quantity += value.quantity
            })
            state.totalCart = quantity;
            state.totalPrice = totalPrice
        },
    },
    actions:{
        getProducts(context) {
            let url = '/api/getProducts'
            axios.get(url).then(response => {
                    context.commit('UPDATE_PRODUCT', response.data);
                });
        },
        getCart(context) {
            let url = '/api/getCart'
            axios.get(url).then(response => {
                    context.commit('UPDATE_CART', response.data);
            });
        },
        addToCart(context, payload){
            console.log(payload);
            let url = '/api/addToCart'
            axios.post(url, payload).then(response => {
                    console.log("Masuk");
                    context.dispatch('getCart');
                });
        },
        deleteFromCart(context, payload){
            let url = '/api/deleteFromCart/'+payload
            axios.delete(url).then(response => {
                    context.dispatch('getCart');
                });
        },
        checkout(context){
            let url = '/api/checkout'
            axios.get(url).then(response => {
                    context.dispatch('getCart');
                });
        }
    },
    modules:{

    }
})