<template>
    <div>
     <h1 style="color: #009DFF">Productos</h1>
     <v-item-group
        multiple>
            <v-row>
              <v-col v-for="product in listProducts" :key="product.id">
                <v-card>
                  <v-container>
                    <v-card
                      class="mx-auto"
                      max-width="300"
                    >
                <v-img
                  class="white--text align-end"
                  height="300"
                  :src="product.image"
                >
                </v-img>
                <v-card-title style="color: #0050FF">{{product.name}}</v-card-title>
                <v-card-subtitle class="pb-0">
                  ${{product.price}}
                </v-card-subtitle>

                <v-card-text class="text--primary">
                  <div>Categoria: {{ product.categories.name }}</div>
                </v-card-text>

                <v-card-actions>
                  <v-btn
                    color="orange"
                    text
                    @click="dialog=true"
                  >
                    Editar
                  </v-btn>
                </v-card-actions>
              </v-card>
          </v-container>
          <v-btn
        bottom
        color="#03A9F4"
        dark
        fab
        fixed
        right
        @click="dialog= true"
      >
        <v-icon>mdi-plus</v-icon>
      </v-btn>
        </v-card>
        <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-card>
        <v-card-title class="light-blue lighten-1" style="color: #fff">
          Editar producto: {{product.name}}
        </v-card-title>
        <v-container>
          <v-row>
            <v-col cols="12" md="7">
              <v-text-field
              label="Nombre del producto"
              v-model="product.name"
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="5">
              <v-text-field
              label="Precio"
              v-model="product.price"
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="9">
              <v-text-field
              label="Imagen"
              v-model="product.image"
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="3">
              <v-text-field
              label="Id category"
              v-model="product.category_id"
              >
              </v-text-field>
            </v-col>
          <pre>{{product}}</pre>
          </v-row>
        </v-container>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            class="orange"
            style="color: #fff"
            @click="dialog = false"
          >
            Modificar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
      </v-col>
    </v-row>
    </v-item-group>
   </div>
</template>


<script>
import { mapActions, mapState } from 'vuex'
export default {
    data() {
        return { 
            dialog: false,
            product: {
              name: '',
              price: '',
              image: '',
              category_id: ''
            }
        }
    },

    computed: {
        ...mapState('product', ['listProducts'])
    },

    methods: {
        ...mapActions('product', ['getList'])
    },

    

    created(){
        this.getList()
    }
}
</script>