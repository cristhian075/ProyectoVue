import Vue from 'vue'
import Vuex from 'vuex'
 
import user from "./modules/User"
import product from "./modules/Product"
import category from "./modules/Category"

Vue.use(Vuex)
 
export default new Vuex.Store({
    modules: {
        user,
        product, 
        category
    }
})
