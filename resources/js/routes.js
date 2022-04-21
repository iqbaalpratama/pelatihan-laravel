import Product from './components/ProductComponent.vue'
import Todo from './components/ToDoComponent.vue'
import Cart from './components/CartComponent.vue'

export const routes = [
    { path: '/', component: Product, name: 'Product'},
    { path: '/cart', component: Cart, name: 'Cart'}
];