<template>
  <div>
    <v-card class="mx-auto" outlined>
      <v-data-table
        item-key="name"
        :headers="headers"
        :items="desserts"
        sort-by="calories"
        class="elevation-1"
        :loading="loader"
        loading-text="Loading... Please wait"
        :search="search"
      >
        <template v-slot:top>
          <v-toolbar flat color="white">
            <v-toolbar-title>Daily Bookings</v-toolbar-title>
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-spacer></v-spacer>
            <v-text-field
              v-model="search"
              append-icon="fas fa-search"
              label="Search"
              single-line
              hide-details
            ></v-text-field>
          </v-toolbar>
        </template>
        <template v-slot:item.action="{ item }">
          <v-icon small v-if="item.status !== 'hold'" @click="releaseTicket(item)">far fa-check-circle</v-icon>&nbsp;&nbsp;
          <v-icon small v-if="item.status !== 'hold'" @click="holdTicket(item)">fas fa-thumbtack</v-icon>
        </template>
        <template v-slot:no-data>
          <v-btn color="primary" @click="initialize">Reset</v-btn>
        </template>
      </v-data-table>
    </v-card>
    <v-card class="bookings mx-auto" outlined>
      <apexchart width="100%" type="bar" :options="options" :series="series"></apexchart>
    </v-card>
  </div>
</template>
<style scoped>
.bookings {
  margin-top: 20px;
}
</style>

<script>
import Vue from "vue";
import axios from 'axios';
import VueApexCharts from "vue-apexcharts";
Vue.component("apexchart", VueApexCharts);
export default {
  data: () => ({
    options: {
      chart: {
        id: "vuechart-example"
      },
      xaxis: {
        title: {
          text: 'Monthly Sales',
          align: "left",
          margin: 10,
          offsetX: 0,
          offsetY: 0,
          floating: false,
          style: {
            fontSize: "24px",
            color: "#39915b"
          }
        },
        categories: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December"
        ]
      }
    },
    series: [
      {
        name: "Monthly Sales",
        data: [30, 40, 45, 50, 49, 60, 70, 91, 96, 200]
      }
    ],
    dialog: false,
    loader: true,
    search: "",
    headers: [
      {
        text: "Passenger",
        align: "left",
        sortable: true,
        value: "relations_passenger.name"
      },
      { text: "Ticket No.", value: "ticket_number" },
      { text: "Bus Number", value: "relations_bus.bus_number" },
      { text: "From", value: "from" },
      { text: "To", value: "to" },
      { text: "Fare", value: "bill" },
      { text: "Status", value: "status" },
      { text: "Action", value: "action", sortable: false }
    ],
    desserts: [],
    defaultItem: {
      name: "",
      ticketno: 0,
      busNumber: 0,
      passengerType: 0,
      from: 0,
      to: 0,
      fare: 0,
      status: ""
    }
  }),
  watch: {
    dialog(val) {
      val || this.close();
    }
  },
  created() {
    this.initialize();
  },
  methods: {
    initialize() {
      if (this.desserts !== []) {
        this.loader = false;
      }
      let date = {date:new Date().toJSON().slice(0,10).replace(/-/g,'/')};
      axios 
        .post('/dashboard',date)
        .then(res => {
          console.log(res.data);
          for(var i = 0; i < res.data.length; ++i){
            this.desserts.push(res.data[i]);
          }
        })
        .catch(err => {
          console.log(err);
        })
      this.desserts = [];
    },
    holdTicket(item) {
      const index = this.desserts.indexOf(item);
      this.desserts[index].status = "hold";
      axios
        .put('/hold_ticket/',item)
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        })
    },
    releaseTicket(item) {
      const index = this.desserts.indexOf(item);
      this.desserts[index].status = "released";
      axios
        .put(`/release/`,item)
        .then(res => {
          console.log(res)
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
