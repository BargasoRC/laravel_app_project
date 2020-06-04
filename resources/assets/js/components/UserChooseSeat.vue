<template>
<div>
    <br>
    <div class="container" id = "info">
    <div class ="row">
        <div class="col-lg-3">
            <h4 class="card-title"><i class="fa fa-bus" aria-hidden="true"></i> {{bus_name}}</h4>
        </div>
        <div class="col-lg-3">
            <p class="card-text"><i class="fa fa-clock" aria-hidden="true"></i> Departure Time: {{departure_time}}</p>
        </div>
        <div class="col-lg-3">
            <p class="card-text"><i class="fa fa-clock" aria-hidden="true"></i> Arrival Time: {{arrival_time}}</p>
        </div>

    </div> 
    </div>
     <hr>
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 p-0">       
            <select class="form-control search-slt" id="" v-model="selectedSeat">
                <option disabled>Choose seat number</option>
                <option v-for="(n, i) in numOfSeats" v-bind:key="numOfSeats[i]">{{numOfSeats[i]}}</option>
            </select>
        </div>
        <div class="">
            <button class = "btn btn-success" @click="addSeat()" ><i class="fa fa-plus-square" aria-hidden="true"></i> Add Seat</button>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
            <span id="message" >{{message}}</span>
        </div>
        <div class="">
            <button class= "btn btn-success" @click="checkout()"><i class="fa fa-check-square" aria-hidden="true"></i> Checkout!</button>
        </div>
          <div class="">
            <button class= "btn btn-danger" @click="goback()"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Cancel</button>
        </div>
        <br><br>

        <div class="col-lg-12">
            <table>
                <tr>
                    <th>Seat Number </th>
                    <th>Passenger Type </th>
                    <th>Fare </th>
                    <th>Action</th>
                </tr>
                <tr v-for="(num, index) in SeatArr" v-bind:key="SeatArr[index]">
                    <td><i class="fa fa-user" aria-hidden="true"></i> {{SeatArr[index]}}</td>
                    <td>
                        <select class="form-control search-slt" v-model="selectedType[index]">
                            <option v-for="pt in PassengerType" v-bind:key="pt.type" >
                                {{pt.type}}
                              
                            </option>  
                                                     
                        </select>
                    </td>
                    <td v-if ="selectedType[index] == 'Regular'">{{PassengerType[0].fare}}</td>
                    <td v-else-if ="selectedType[index] == 'Non-regular'">{{PassengerType[1].fare}}</td>
                    <td v-else> </td>
                    <td>
                        <button class="btn btn-dark" @click="cancel(index)" ><i class="fa fa-ban" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </table>
        </div>
        </div>
    </div>

</div>
</template>
<script>
import axios from 'axios';
import router from '../router';
export default{
    mounted(){
        const data = this.$route.params.data;
        this.id = data.id;
        this.bus_name = data.name;
        this.departure_time = data.departureTime;
        this.arrival_time = data.arrivalTime;
        this.duration = data.duration;
        this.bus = data.bus;
        this.to = data.to;
        this.from = data.from;
        //console.log(data.bus);
        for(var i =0; i< data.seats.data.length; i++){
            this.numOfSeats.push(data.seats.data[i].seat_number);
            this.seatStatus.push(data.seats.data[i].status);
        }
        this.PassengerType[0].fare = this.bus.regular;
        this.PassengerType[1].fare = this.bus.non_regular;
    },
    data(){
        return{
            to:null,
            from:null,
            bus: null,
            id: null,
            bus_name:null,
            departure_time:null,
            arrival_time:null,
            duration:null,
            message:null,
            fare:[],
            SeatArr:[],
            selectedSeat:null,
            selectedType:[],
            PassengerType:[
                {type:'Regular',fare:null},
                {type:'Non-regular',fare:null}
            ],
            numOfSeats:[],
            seatStatus:[],
            
        }
    },
    methods:{
       checkout(){
           let data = {
               bus: this.bus,
               Seats: this.SeatArr,
               PassengerType: this.selectedType
           }
           if(this.SeatArr.length !=0 && this.selectedType.length != 0){
               this.$router.push({ name: "form", params: {data:data}});
           }else if(this.SeatArr.length == 0){
               this.message = 'Please add seat number.';
           }
           else if(this.selectedType.length == 0){
               this.message = 'Select Passenger type.';
           }
           else{
               this.message = '';
           }
           
       },
        addSeat(){
            if(!this.SeatArr.includes(this.selectedSeat) && this.selectedSeat !=null){
                this.SeatArr.push(this.selectedSeat);
                this.message = '';
            }else if(this.selectedSeat == null){
                this.message = 'Please select Seat number';
            }
            else{
                this.message = 'Already on list!';
            }
        },
        cancel(i){
            this.SeatArr.splice(i,1);
        },
        goback(){
            router.push({ path: "/welcome" });
        }
    }
}
</script>
<style>
    
    #message{
        color: red;
        margin-left:20px;
    }
    .container{
        margin-top: 5%;
        margin-left:10%;

    }
    table {
        border-collapse: collapse;
        width: 80%;
        background: rgba(26, 70, 104, 0.51);
        color:white;
    }
    
    th, td {
        text-align: left;
        padding: 8px;
    }
    th {
        background-color:#1A4668;
        color: inherit;
    }
    
    .table-wrapper{
        margin: 10px 80px 80px;
        box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
    }
</style>