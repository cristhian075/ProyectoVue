import Vue from 'vue'
import VueRouter from 'vue-router'
 
import example from "../components/ExampleComponent"
import user from "../components/user/ContainerComponent"
import product from "../components/product/ProductContainer"
import category from "../components/category/CategoryContainer"
Vue.use(VueRouter)
 
const routes = [
    {
        component: example,
        name: "example", 
        path: "/example"
    },
    {
        component: user,
        name: "user", 
        path: "/user"
    },
    {
        component: product,
        name: "product", 
        path: "/product"
    },
    {
        component: category,
        name: "category", 
        path: "/category"
    },

]
 
export default new VueRouter({
    routes
});
