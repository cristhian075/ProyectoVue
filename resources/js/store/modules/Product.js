import axios from 'axios';

const state = {
    listProducts: []
}
const actions = {
    async getList({commit}){
        const response = await axios.get('product/products')
        console.log(response)
        commit ('SET_PRODUCTS', response.data.products)
    },

    async saveProduct({ commit }, product) {
        const response = await axios.post('product/produts/store', {
            name: product.name,
            price: product.price,
            image: user.image
        })
        console.log(response)
    },
}
const mutations = {
    SET_PRODUCTS (state, data){
        state.listProducts = data
    }
}

export default{
    state, actions, mutations, namespaced:true
}