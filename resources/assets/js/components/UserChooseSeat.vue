<template>
<div>
    <br>
    <div class="container">
    <div class ="row">
        <div class="col-lg-3">
            <h4 class="card-title"><i class="fa fa-bus" aria-hidden="true"></i>{{bus_name}}</h4>
        </div>
        <div class="col-lg-3">
            <p class="card-text"><i class="fa fa-clock" aria-hidden="true"></i> Departure Time: {{departure_time}}</p>
        </div>
        <div class="col-lg-3">
            <p class="card-text"><i class="fa fa-clock" aria-hidden="true"></i> Arrival Time: {{arrival_time}}</p>
        </div>
        <div class="col-lg-3">
            <p class="card-text"><i class="fa fa-hourglass-end" aria-hidden="true"></i> Duration: {{duration}}</p>
        </div>
    </div>


        
    </div>
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 p-0">       
            <select class="form-control search-slt" id="" v-model="selectedSeat">
                <option>Choose seat number</option>
                <option v-for="(n, i) in numOfSeats">{{numOfSeats[i]}}</option>
            </select>
        </div>
        <div class="">
            <button class = "btn btn-success" @click="addSeat()" ><i class="fa fa-plus-square" aria-hidden="true"></i> Add Seat</button>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
            <span id="message" >{{message}}</span>
        </div>
        <div class="">
            <button class= "btn btn-success"><i class="fa fa-check-square" aria-hidden="true"></i> Checkout!</button>
        </div>
          <div class="">
            <button class= "btn btn-danger"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Cancel</button>
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
                <tr v-for="(num, index) in SeatArr" >
                    <td><i class="fa fa-user" aria-hidden="true"></i> {{SeatArr[index]}}</td>
                    <td>
                        <select class="form-control search-slt" v-model="selectedType[index]">
                            <option v-for="pt in PassengerType" v-bind:key="pt.type" >
                                {{pt.type}}
                            </option>                             
                        </select>
                    </td>
                    <td>{{fare}}</td>
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
export default{
    mounted(){
    },
    data(){
        return{
            bus_name:'',
            departure_time:'',
            arrival_time:'',
            duration:'',
            message:'',
            fare:null,
            SeatArr:[],
            selectedSeat:null,
            selectedType:['Regular'],
            PassengerType:[
                {type:'Regular'},
                {type:'Non-regular'}
            ],
            numOfSeats:[1,3,4,5,8,11,13,20,21]
        }
    },
    methods:{
        addSeat(){
            if(!this.SeatArr.includes(this.selectedSeat)){
                this.SeatArr.push(this.selectedSeat);
                this.message = '';
            }
            else{
                this.message = 'Already on list!';
            }

        },
        cancel(i){
            this.SeatArr.splice(i,1);
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