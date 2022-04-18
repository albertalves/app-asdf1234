<template>
    <v-container>
        <v-col cols="12">
            <v-card-title class="primary">
                <span class="headline white--text">Produtos</span>
            </v-card-title>
            <v-card class="pa-5">
                <v-row>
                    <v-col md="12">
                        <v-btn 
                            color="primary" 
                            @click="createProduct">
                            Cadastrar
                        </v-btn>
                     </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12">
                        <v-simple-table>
                            <thead>
                                <tr>
                                    <th class="text-left">SKU</th>
                                    <th class="text-left">Nome</th>
                                    <th class="text-left">Quantidade</th>
                                    <th class="text-left">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product, index) in products.data" :key="index">
                                    <td>{{ product.sku }}</td>
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.quantity }}</td>
                                    <td>
                                        <div class="my-2">
                                            <v-tooltip bottom>
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-btn
                                                        v-bind="attrs"
                                                        v-on="on"
                                                        color="warning"
                                                        fab
                                                        x-small
                                                        elevation="1"
                                                        @click.prevent="updateProduct(product)"
                                                    >
                                                        <v-icon>mdi-pencil</v-icon>
                                                    </v-btn>
                                                </template>
                                                <span>Editar</span>
                                            </v-tooltip>
                                            <v-tooltip bottom>
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-btn
                                                        v-bind="attrs"
                                                        v-on="on"
                                                        fab
                                                        x-small
                                                        elevation="1"
                                                        @click.prevent="showHistory(product.history)"
                                                    >
                                                        <v-icon>mdi-format-list-bulleted-square</v-icon>
                                                    </v-btn>
                                                </template>
                                                <span>Ver histórico</span>
                                            </v-tooltip>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </v-simple-table>
                    </v-col>
                </v-row>
                <v-pagination
                    v-if="params.last_page > 1"
                    v-model="params.page"
                    :length="params.last_page"
                    :total-visible="4"
                    @input="onPageChange"
                >
                </v-pagination>
            </v-card>
        </v-col>

        <update-product-modal
            ref="updateProductModal"
            @reload="getProducts"
        ></update-product-modal>

        <create-product-modal
            ref="createProductModal"
            @reload="getProducts"
        ></create-product-modal>

        <product-history-modal
            ref="productHistoryModal"
        ></product-history-modal>
    </v-container>
</template>

<script>
import UpdateProductModal from "./partials/UpdateProductModalComponent";
import CreateProductModal from "./partials/CreateProductModalComponent";
import ProductHistoryModal from "./partials/ProductHistoryModalComponent";

export default {
  components: {
    'update-product-modal': UpdateProductModal,
    'create-product-modal': CreateProductModal,
    'product-history-modal': ProductHistoryModal,
  },
  data(){
      return {
          products: {
              meta: {
                  current_page: '',
                  last_page: ''
              }
          },
      }
  },
  created() {
      this.getProducts();
  },
  methods:{
      getProducts(page = 1) {
          this.$store.dispatch('getProducts', {page})
                      .then(response => this.products = response);
      },
      updateProduct(product) {
        this.$refs.updateProductModal.showModal(product);
      },
      createProduct() {
        this.$refs.createProductModal.showModal();
      },
      showHistory(history) {
        this.$refs.productHistoryModal.showModal(history);
      },
      onPageChange() {
          this.getProducts(this.params.page);
      },
  },
  computed: {
      params() {
          return {
              page: this.products.meta.current_page,
              last_page: this.products.meta.last_page
          }
      }
  },
}
</script>