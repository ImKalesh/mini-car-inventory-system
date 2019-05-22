<template>
  <v-app>
    <v-toolbar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>MY</span>
        <span class="font-weight-light">SHOWROOM</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
       @click="route('manufacturers')"
      >
        <span class="mr-2">Manufacturers</span>
      </v-btn>
      <v-btn
       @click="route('models')"
      >
        <span class="mr-2">Models</span>
      </v-btn>
      <v-btn
        @click="route('inventory')"
      >
        <span class="mr-2">Inventory</span>
      </v-btn>
    </v-toolbar>

    <v-content>
      <router-view></router-view>
    </v-content>
  </v-app>
</template>

<script>


export default {
  name: 'App',
  
  data () {
    return {
      //
    }
  },
  methods:{
    route:function(name){
        this.$router.push(name);
    }
  }
}
</script>
