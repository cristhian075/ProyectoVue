<template>
  <div>
    <v-card>
      <v-container>
        <v-simple-table dense>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Opciones</th>
                <th class="text-left">Usuario</th>
                <th class="text-left">Email</th>
                <th class="text-left">Fecha de creación</th>
                <th class="text-left">Fecha de modificación</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in listUsers" :key="item.id">
                <td>
                  <v-icon
                    medium
                    color="#15638A"
                    @click="openModal('update', item)"
                    >mdi-pencil</v-icon
                  >
                </td>
                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.created_at }}</td>
                <td>{{ item.updated_at }}</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-container>
      <v-btn
        bottom
        color="#03A9F4"
        dark
        fab
        fixed
        right
        @click="openModal('insert')"
      >
        <v-icon>mdi-plus</v-icon>
      </v-btn>
    </v-card>
    <v-dialog v-model="dialog" width="800">
      <v-card>
        <v-card-title class="light-blue lighten-1" style="color: #fff">
          {{ title }}
        </v-card-title>
        <v-container>
          <v-row>
            <v-col cols="12" md="3">
              <v-text-field label="Usuario" v-model="user.name"> </v-text-field>
            </v-col>
            <v-col cols="12" md="3">
              <v-text-field label="Email" v-model="user.email"> </v-text-field>
            </v-col>
            <v-col cols="12" md="3" v-if="checkPassword == 1">
              <v-text-field
                type="password"
                label="New password"
                v-model="user.password"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" md="3" v-if="actionForm == 1">
              <v-text-field
                type="password"
                label="New password"
                v-model="user.password"
              >
              </v-text-field>
            </v-col>
            <v-col v-col cols="12" md="4" v-if="actionForm == 2">
              <v-select
                item-text="name"
                item-value="id"
                :items="items"
                label="Desea cambiar la contraseña?"
                v-model="checkPassword"
              >
              </v-select>
            </v-col>
          </v-row>
          <div>
            <div
              style="text-align: center; color: red"
              v-for="(errors, id) in errorMessage"
              :key="id"
              v-text="errors"
            ></div>
          </div>
        </v-container>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            v-if="actionForm == 1"
            class="light-blue lighten-1"
            style="color: #fff"
            @click="save"
          >
            Guardar
          </v-btn>
          <v-btn
            v-if="actionForm == 2"
            class="orange"
            style="color: #fff"
            @click="update"
          >
            Modificar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
    import { mapState } from 'vuex'
    export default {
        data(){
            return{
                dialog: false,
                actionForm: 0,
                title:'',
                user: {
                    id: 0,
                    name: '',
                    email: '',
                    password: ''
                },
                errorUser: 0,
                errorMessage: [],
                items:[
                  {id: 1, name: 'Si'},
                  {id: 2, name: 'No'},

                ],
                checkPassword: 2
            }
        },
        
        computed: {
            ...mapState('user', ['listUsers','message'])
        },

        methods: {
          validate(){ 
            this.errorUser = 0
            this.errorMessage = []
            if (this.actionForm == 1) {
            if (!this.user.name) {this.errorMessage.push("Ingrese el usuario")}
            if (!this.user.email) {this.errorMessage.push("Ingrese el email")}
            if (!this.user.password) {this.errorMessage.push("Ingrese la contraseña")}
            if (this.errorMessage.length) {this.errorUser = 1}
          } else {
            if (!this.user.name) {this.errorMessage.push("Ingrese el usuario")}
            if (!this.user.email) {this.errorMessage.push("Ingrese el email")}
            if (this.checkPassword == 1){
            if (!this.user.password) {this.errorMessage.push("Ingrese la nueva contraseña")}
          }
          if (this.errorMessage.length) {this.errorUser = 1 }
            }
            return this.errorUser
          },

          clearMessageError(){
             this.errorUser = 0
             this.errorMessage = []
             this.checkPassword= 2
          },

          openModal(action, data) {
            this.dialog = true
            switch (action) {
              case 'insert':
                this.actionForm = 1
                this.title = 'Insertar Usuario'
                this.user.id = 0
                this.user.name = ''
                this.user.email = ''
                this.user.password = ''
                this.clearMessageError()
                break;

              case 'update':
                this.actionForm = 2
                this.title = 'Modificar Usuario ' + data.name
                this.user.id = data.id
                this.user.name = data.name
                this.user.email = data.email
                this.user.password = data.password
                this.clearMessageError()
                break;


              default:
                break;

            }
          },
          

            save() {
              if(this.validate()){
                return
              }

               this.$store.dispatch('user/saveUser', this.user)
               .then(() =>{
                   this.$store.dispatch('user/getList')
                   this.dialog = false
               }).catch((e) => {
                   if(e.response.status ==422) {
                        this.errorMessage = e.response.data.errors
                   }
               })
            },
            update(){
              if(this.validate()){
                return
              }

              this.$store.dispatch('user/updateUser', this.user)
              .then(() => {
                this.$store.dispatch('user/getList')
                this.dialog = false
              })
            }
        },

        mounted() {
            this.$store.dispatch('user/getList')
        }
    }
</script>