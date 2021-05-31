import axios from 'axios';

const status = {}
const actions = {
    async getList() {
         const response = await axios.get('category/category')
    }
}
const mutations = {}

export default {
    state, actions, mutations, namespace:true
}