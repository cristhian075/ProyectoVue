<template>
    <div>
        <h1 style="color: #009DFF">Categorias</h1>
    </div>
</template>
<script>
    import {mapActions} from 'vuex'
    export default {
        data() {
            return {

            }
        },

        methods: {
            ...mapActions('category', ['getList'])
        },

        created(){
            alert('Entro')
            this.getList
        }
    }
</script>