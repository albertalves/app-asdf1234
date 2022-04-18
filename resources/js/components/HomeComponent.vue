<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app>
            <v-list dense>
                <v-list-item :to="{name: 'home'}">
                    <v-list-item-action>
                        <v-icon>mdi-home</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Home</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        
        <v-app-bar app color="primary" dark>
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title></v-toolbar-title>
        </v-app-bar>

        <v-main>
            <router-view></router-view>
        </v-main>

        <v-footer color="primary" app dark>
            <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
    </v-app>
</template>

<script>
  export default {
    data: () => ({ 
        drawer: null
    }),
  }
</script>

<style>
    .v-enter,
    .v-leave-to {
    opacity: 0;
    }

    .v-enter {
    transform: translate3d(0, -20px, 0);
    }

    .v-leave-to {
    transform: translate3d(0, 20px, 0);
    }

    .v-enter-active,
    .v-leave-active {
    transition: all .3s;
    }
</style>