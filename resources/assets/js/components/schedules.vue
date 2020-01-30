<template>
  <v-card>
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="fas fa-search"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="schdules"
      :search="search"
    ></v-data-table>
  </v-card>
</template>
<script>
  import axios from 'axios';
  export default {
    mounted(){
      axios
        .get('/bus_schedules')
        .then( response =>{
          console.log(response.data)
          this.schdules = response.data;
        })
        .catch( err => {
          console.log(err)
        })
    },
    data () {
      return {
        search: '',
        headers: [
          {
            text: 'Bus Name',
            align: 'left',
            sortable: true,
            value: 'name',
          },
          { text: 'Bus Number', value: 'bus_number' },
          { text: 'From', value: 'from' },
          { text: 'To', value: 'to' },
          { text: 'Departure', value: 'start_time' },
          { text: 'Arrival', value: 'end_time' }
        ],
        schdules: [],
      }
    },
  }
</script>