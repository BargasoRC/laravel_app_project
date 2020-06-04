<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <form class="form-horizontal" autocomplete="off">
          <center>
            <div class="card">
              <h2 class="header">Information</h2>

              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center">
                  <i class="fa fa-user bigicon"></i>
                </span>
                <div class="col-md-8">
                  <input
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Name"
                    class="form-control"
                    autocomplete="asdfgh"
                    v-model="name"
                    required
                  >
                </div>
              </div>
              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center">
                  <i class="fa fa-birthday-cake bigicon"></i>
                </span>
                <div class="col-md-8">
                  <input
                    id="age"
                    name="age"
                    type="number"
                    placeholder="Age"
                    class="form-control"
                    autocomplete="off"
                    v-model="age"
                    required
                  >
                </div>
              </div>

              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center">
                  <i class="fa fa-venus-mars bigicon"></i>
                </span>
                <div class="col-md-8">
                  <select
                    class="custom-select form-control"
                    id="gender"
                    name="gender"
                    type="text"
                    autocomplete="off"
                    v-model="gender"
                    required
                  >
                    <option selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center">
                  <i class="fa fa-address-card bigicon"></i>
                </span>
                <div class="col-md-8">
                  <input
                    id="address"
                    name="address"
                    type="text"
                    placeholder="Address"
                    class="form-control"
                    autocomplete="off"
                    v-model="address"
                    required
                  >
                </div>
              </div>

              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center">
                  <i class="fa fa-phone-square bigicon"></i>
                </span>
                <div class="col-md-8">
                  <input
                    id="phone"
                    name="phone"
                    type="text"
                    placeholder="Phone"
                    class="form-control"
                    autocomplete="off"
                    v-model="phone"
                    required
                  >
                </div>
              </div>
              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center">
                  <i class="fa fa-envelope bigicon"></i>
                </span>
                <div class="col-md-8">
                  <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email Address"
                    class="form-control"
                    autocomplete="off"
                    v-model="email"
                    required
                  >
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8">
                  <button class="btn btn-outline-primary" @click="submit">Submit</button>
                  <button class="btn btn-outline-danger" @click="cancel()">Cancel</button>
                </div>
              </div>
            </div>
          </center>
        </form>
      </div>
    </div>
  </div>
</template>
<style scope>
.container{
  margin-top:10%;
}
body {
  background-color: white;
  margin-top: 51px;
}
.header {
  color: #36a0ff;
  font-size: 27px;
  padding: 20px;
}

.bigicon {
  font-size: 35px;
  color: #36a0ff;
  margin-right: 410px;
}

.card {
  background-color: white;
  margin-left: 25%;
  width: 100%;
}
.btn {
  width: 100px;
}
</style>
<script>
import axios from "axios";
import router from "../router";
export default {
  mounted() {
    const data = this.$route.params.data;
    this.from = data.bus.from;
    this.to = data.bus.to;
    this.bus_id = data.bus.id;
    this.departure = data.bus.start_time;
    this.arrival = data.bus.end_time;
    this.seat_number = data.Seats;
    for (var i = 0; i < data.PassengerType.length; i++) {
      if (data.PassengerType[i] === "Regular") {
        this.bill.push(data.bus.regular);
      } else {
        this.bill.push(data.bus.non_regular);
      }
    }
  },
  data() {
    return {
      name: null,
      age: null,
      gender: null,
      address: null,
      email: null,
      phone: null,
      from: null,
      to: null,
      bus_id: null,
      seat_number: [],
      departure: null,
      arrival: null,
      bill: [],
      ticket_number: null,
      passenger_id: null
    };
  },
  methods: {
    cancel(){
        router.push({name: 'welcome'});
    },
    submit() {
      let data = {
        date:new Date(),
        name: this.name,
        age: this.age,
        gender: this.gender,
        address: this.address,
        email: this.email,
        phone: this.phone,
        from: this.from,
        to: this.to,
        bus_id: this.bus_id,
        departure: this.departure,
        arrival: this.arrival,
        bill: this.bill,
        seat_number: this.seat_number,
        date: new Date().toJSON().slice(0,10).replace(/-/g,'/')
      };
      console.log('bill',this.bill);
      axios
        .post("/store_passenger", data)
        .then(res => {
          console.log("DATA:", res);
          //code here to redirect to another component then use this response(res) as a data in a looping cards
          let data1 = res;
          this.$router.push({ name: "ticket", params: {data:data1}});
          
        })
        .catch(err => {
          console.log(err);
        });

    }
  }
};
</script>
