<template>
  <div class="text-center">
    <v-dialog
      v-model="enable"
      width="500"
    >
      <v-card>
        <v-card-title class="headline primary white--text">
          Adicionar Produto
        </v-card-title>

        <v-card-text>
            <v-text-field
                label="Nome do produto"
                v-model="form.name"
                :rules="this.errors.name"
                :error="(this.errors.name) ? true : false"
                type="text"
            ></v-text-field>
            <v-text-field
                label="Quantidade inicial do produto"
                v-model="form.quantity"
                :rules="this.errors.quantity"
                :error="(this.errors.quantity) ? true : false"
                type="text"
            ></v-text-field>
            <v-btn 
                small
                color="primary"
                @click="createProduct">Adicionar
            </v-btn>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="enable = false"
          >
            fechar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  export default {
    data(){
      return {
        form: {
          name: '',
          quantity: '',
        },
        errors: {},
        enable: false,
      }
    },

    methods: {
      showModal () {
        this.enable = true;
      },
      createProduct () {
        this.$store.dispatch('createProduct', this.form)
                  .then(() => this.$snotify.success('Produto adicionado com sucesso.', 'Pronto!'))
                  .then(() => {
                    this.enable = false;
                    this.$emit('reload');
                  })
                  .catch(error => {
                    let msg = 'Ocorreu um erro!';
                    if (error.response.data.errors) {
                      this.errors = error.response.data.errors;
                    } else {
                      msg = error.response.data.message;
                    }

                    this.$snotify.error(msg, 'Ops...')
                  })
        },

    }
  }
</script>