<template>
  <div>
    <v-card>
        <v-container>
  <v-simple-table dense>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Name</th>
          <th class="text-left">Email</th>
          <th class="text-left">Fecha Creacion</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in listUser" :key="item.id"
        >
          <td>{{ item.name }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.created_at }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
        </v-container>
    </v-card>
  </div>    
</template>

<script>
    import { mapState } from 'vuex'
    export default {
        computed: {
          ...mapState('user', ['listUsers'])
        },

        mounted() {
            this.$store.dispatch('user/getList')
        }
    }
</script>