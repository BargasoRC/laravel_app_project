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
      :items="desserts"
      :search="search"
    ></v-data-table>
  </v-card>
</template>
<script>
  export default {
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
          { text: 'Bus Number', value: 'busNo' },
          { text: 'From', value: 'from' },
          { text: 'To', value: 'to' },
          { text: 'Departure', value: 'departure' },
          { text: 'Arrival', value: 'arrival' },
        ],
        desserts: [
          {
            name: 'Ceres',
            busNo: 159,
            from: 6.0,
            to: 24,
            departure: 4.0,
            arrival: '1%',
          },
          {
            name: 'Ice cream sandwich',
            busNo: 237,
            from: 9.0,
            to: 37,
            departure: 4.3,
            arrival: '1%',
          },
        ],
      }
    },
  }
</script>