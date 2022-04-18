<template>
  <div class="text-center">
    <v-dialog
      v-model="enable"
      width="500"
    >
      <v-card>
        <v-card-title class="headline primary white--text">
          Histórico do Produto
        </v-card-title>

        <v-card-text>
          <div v-for="(item, index) in history" :key="index">
           Dia {{ item.date_formatted }} às {{ item.time_formatted }} - {{ getTypeList(item.action_type) }} {{ item.quantity }}
          </div>
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
  import { getTypeList } from "../../../helpers/enums";

  export default {
    data(){
        return {
          history: {},
          enable: false,
        }
    },
    mounted() {
      this.getTypeList = getTypeList;
    },
    methods: {
      showModal (history) {
        this.enable = true;
        this.history = history;
      },
    }
  }
</script>