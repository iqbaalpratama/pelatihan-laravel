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
            var flag = false
            state.carts.forEach(value => {
                if(value.product_id === payload.id){
                    flag = true;
                    value.quantity += 1;
                    return;
                }
            })
            if(!flag){
                const product = { product_id: payload.id, name: payload.name, price: payload.price, quantity: 1}
                state.carts.push(product);
            }
            state.totalCart += 1;
            state.totalPrice += payload.price
        },
        DELETE_PRODUCT_IN_CART(state, payload){
            var totalprice = 0;
            var totalquantity = 0;
            var index_of_array;
            state.carts.forEach((value,index) => {
                if(value.product_id === payload.product_id){
                    totalprice = value.quantity * value.price;
                    totalquantity = value.quantity;
                    index_of_array = index;
                    return;
                }
            })
            state.carts.splice(index_of_array, 1)
            state.totalPrice -= totalprice
            state.totalCart -= totalquantity
        },
    },
    actions:{
        getProducts(context) {
            let url = '/api/getProducts'
            axios.get(url).then(response => {
                    context.commit('UPDATE_PRODUCT', response.data);
                });
        },
        addToCart(context, payload){
            context.commit('UPDATE_CART', payload)
        },
        deleteFromCart(context, payload){
            context.commit('DELETE_PRODUCT_IN_CART', payload)
        },
    },
    modules:{

    }
})