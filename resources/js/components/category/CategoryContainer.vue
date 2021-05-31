<template>
    <div>
        <h1>Hola</h1>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },

        created(){
            this.$store.dispatch('category', 'getList')
        }
    }
</script>