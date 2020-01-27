<template>
  <v-app id="sandbox">
    <v-navigation-drawer
      v-model="primaryDrawer.model"
      :clipped="primaryDrawer.clipped"
      permanent
      :mini-variant="primaryDrawer.mini"
      app
      overflow
      color="#EEEEEE"
    >
      <center><v-img class="avatar" src="https://randomuser.me/api/portraits/men/85.jpg"></v-img>
      </center>
      <v-divider></v-divider>

      <v-list dense nav>
        <v-list-item v-for="item in items" :key="item.title" link>
          <v-list-item-icon>
            <router-link :to="item.router">
              <v-icon>{{ item.icon }}</v-icon>
            </router-link>
          </v-list-item-icon>

          <v-list-item-content>
            <router-link :to="item.router">
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </router-link>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar class="app_bar" :clipped-left="primaryDrawer.clipped" app>
      <v-icon @click="is_permanent" color="#E3F2FD" dense>fas fa-bars</v-icon>
    </v-app-bar>

    <v-content class="container_bg">
      <v-container fluid class="container_bg">
        <v-row align="center" justify="center">
          <v-col cols="12">
            <router-view></router-view>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>
<style scoped>
.avatar {
  margin-top:120px;
  height: 20%;
  width: 30%;
  bottom: 0;
}
.app_bar {
  background: #1a4668;
}
.container_bg {
  background: #e0e0e0;
}
</style>

<script>
export default {
  data: () => ({
    items: [
      { title: "Dashboard", icon: "fas fa-tachometer-alt", router: "/" },
      { title: "Add Bus", icon: "fas fa-bus-alt", router: "/bus/add_bus" },
      { title: "Buses", icon: "fas fa-bus", router: "/bus" },
      { title: "Schedules", icon: "far fa-calendar-alt", router: "/schedules" },
      {
        title: "My Account",
        icon: "far fa-user-circle",
        router: "/my_accounts"
      }
    ],
    primaryDrawer: {
      model: null,
      clipped: true,
      mini: true
    }
  }),
  methods: {
    is_permanent() {
      this.primaryDrawer.mini = !this.primaryDrawer.mini;
    }
  }
};
</script>
