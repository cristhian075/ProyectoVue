import axios from 'axios';

const state = {}
const actions = {
    async getList() {
         const response = await axios.get('category/categories')
         console.log(response)
    }
}
const mutations = {}

export default {
    state, actions, mutations, namespaced:true
}