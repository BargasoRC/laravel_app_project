<template>
  <v-app id="sandbox">
    <v-navigation-drawer
      v-model="ispermanent"
      :permanent="ispermanent"
      app
      overflow
    />

    <v-app-bar
      :clipped-left="primaryDrawer.clipped"
      app
    >
      <v-app-bar-nav-icon
        @click="is_permanent"
      />
      <v-toolbar-title>Vuetify</v-toolbar-title>
    </v-app-bar>

    <v-content>
      <v-container fluid>
        <v-row
          align="center"
          justify="center"
        >
          <v-col cols="10">
            
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  export default {
    data: () => ({
      primaryDrawer: {
        model: null,
        type: 'permanent',
        clipped: false,
        floating: false,
        mini: false,
      },
      ispermanent:false,
     
    }),
    methods:{
      is_permanent(){
        this.ispermanent = !this.ispermanent;
        this.primaryDrawer.model = this.ispermanent;
      }
    }
  }
</script>