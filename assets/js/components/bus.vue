<template>
  <v-row>
    <v-col cols="12">
      <v-row>
        <v-col v-for="(item, index) in buses" :key="index" cols="4">
          <v-card class="bus mx-auto" hover>
            <v-img
              class="white--text align-end"
              height="100px"
              src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            >
              <v-card-title>{{item.name}}</v-card-title>
            </v-img>
            <v-card-text class="text--primary">
              <div>
                <b>Bus Number</b>
                : {{item.busNo}}
              </div>
              <div>
                <b>Journey From</b>
                : {{item.from}}
              </div>
              <div>
                <b>Journey To</b>
                : {{item.to}}
              </div>
              <div>
                <b>Departure Time</b>
                : {{item.departure}}
              </div>
              <div>
                <b>Arrival Time</b>
                : {{item.arrival}}
              </div>
              <div>
                <b>Regular Fare</b>
                : {{item.adult_fare}}
              </div>
              <div>
                <b>Non-Regular Fare</b>
                : {{item.child_fare}}
              </div>
              <div>
                <b>Number of Seats</b>
                : {{item.seats}}
              </div>
            </v-card-text>
            <v-card-actions>
              <v-btn>
                <v-icon color="orange" @click="update(item)">fas fa-pen-fancy</v-icon>
              </v-btn>
              <v-btn>
                <v-icon color="orange" @click="remove(item.id)">far fa-trash-alt</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>
<style scoped>
.bus {
  margin-bottom: 10px;
}
</style>

<script>
import router from "../router";
export default {
  data() {
    return {
      buses: [
        {
          id: 1,
          name: "Ceres",
          busNo: 159,
          from: 6.0,
          to: 24,
          departure: 4.0,
          arrival: "1%",
          adult_fare: "200",
          child_fare: "160",
          duration: 30,
          seats: 50
        },
        {
          id: 2,
          name: "Ice cream sandwich",
          busNo: 237,
          from: 9.0,
          to: 37,
          departure: 4.3,
          arrival: "1%",
          adult_fare: "170",
          child_fare: "110",
          duration: 30,
          seats: 50
        },
        {
          id: 1,
          name: "Ceres",
          busNo: 159,
          from: 6.0,
          to: 24,
          departure: 4.0,
          arrival: "1%",
          adult_fare: "200",
          child_fare: "160",
          duration: 30,
          seats: 50
        },
        {
          id: 2,
          name: "Ice cream sandwich",
          busNo: 237,
          from: 9.0,
          to: 37,
          departure: 4.3,
          arrival: "1%",
          adult_fare: "170",
          child_fare: "110",
          duration: 30,
          seats: 50
        }
      ]
    };
  },
  methods: {
    update(data) {
      // this.$emit("update_data", data);
      this.$router.push({ name: "busUpdate", params: { data: data } });
    },
    remove(id) {}
  }
};
</script>