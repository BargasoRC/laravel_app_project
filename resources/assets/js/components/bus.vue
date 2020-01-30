<template>
  <v-row>
    <v-col cols="12">
      <v-row>
        <v-col v-for="(item, index) in list" :key="index" cols="4">
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
                : {{item.bus_number}}
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
                : {{item.start_time}}
              </div>
              <div>
                <b>Arrival Time</b>
                : {{item.end_time}}
              </div>
              <div>
                <b>Regular Fare</b>
                : {{item.regular}}
              </div>
              <div>
                <b>Non-Regular Fare</b>
                : {{item.non_regular}}
              </div>
              <div>
                <b>Number of Seats</b>
                : {{item.seats_number}}
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
import axios from "axios";
export default {
  data() {
    return {
      buses: []
    };
  },
  computed:{
    list(){
      return this.buses
    }
  },
  mounted(){
    axios
      .get('/retrieve_bus')
      .then( res => {
        this.buses = res.data;
        console.log('retrieve',res.data)
      })
      .catch(error => console.log(error));
  },
  created(){
    this.$bus.$on('remove_bus', (id) => {
      this.buses.filter(function(object){
        return object.id !== id;
      });   
    });
  },
  methods: {
    update(data) {
      this.$router.push({ name: "busUpdate", params: { data: data } });
    },
    remove(id) {
      axios
      .delete(`/remove_bus/${id}`)
      .then( res => {
        if(res.status === 200){
          this.$bus.$emit('remove_bus',id);
        }
      })
      .catch(err => {
        console.log(err);
      })
    }
  }
};
</script>