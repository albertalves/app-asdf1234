<template>
  <div class="text-center">
    <v-dialog
      v-model="enable"
      width="500"
    >
      <v-card>
        <v-card-title class="headline primary white--text">
          Editar quantidade
        </v-card-title>

        <v-card-text>
           <v-text-field
                label="SKU"
                v-model="product.sku"
                type="text"
                disabled
            ></v-text-field>
            <v-text-field
                label="Informe um valor"
                v-model="form.quantity"
                :rules="this.errors.quantity"
                :error="(this.errors.quantity) ? true : false"
                type="text"
            ></v-text-field>
            <v-btn 
                small
                color="danger"
                @click="createHistory(REMOVED)">Remover
            </v-btn>
            <v-btn 
                small
                color="primary"
                @click="createHistory(ADDED)">Adicionar
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
  import { ADDED, REMOVED } from "../../../helpers/enums";

  export default {
    data(){
      return {
        product: {
          id: '',
          sku: '',
          name: '',
          quantity: ''
        },
        form: {
          product_id: '',
          sku: '',
          quantity: '',
          action_type: '',
        },
        errors: {},
        enable: false,
        actionTypeList: []
      }
    },
    mounted() {
      this.ADDED = ADDED;
      this.REMOVED = REMOVED;
    },
    methods: {
      showModal (product) {
        this.clearFields();
        this.enable  = true;
        this.product = product;
      },
      createHistory (action_type) {
        this.form.product_id = this.product.id;
        this.form.sku = this.product.sku;
        this.form.action_type = action_type;

        this.$store.dispatch('createHistory', this.form)
                  .then(() => this.$snotify.success('Quantidade atualizada com sucesso.', 'Pronto!'))
                  .then(() => this.enable = false)
                  .catch(error => {
                    this.errors = error.response.data.errors;
                    this.$snotify.error('Ocorreu um erro!', 'Ops...')
                  });
      },
      clearFields () {
        this.form = {};
        this.errors = {};
      },
    }
  }
</script>