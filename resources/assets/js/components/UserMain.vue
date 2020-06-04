
<template>
<div>
<link href="css/main.css" rel= "stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://pbs.twimg.com/media/EGHYvttU4AAYKb7?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://pbs.twimg.com/media/EGHYvtkUcAAuc8T?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.bworldonline.com/wp-content/uploads/2017/05/Bus-terminal-Cebu-South-PIO.jpg?format=jpj&name=large" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" v-model="selectedfrom" id="" required>
                                <option value="" disabled>Journey From:</option>
                                <option select = "selected" v-for="from in fromPlaces" v-bind:key="from" >
                                 {{from}}
                                </option>
                            </select>  
                        </div>
                     
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" v-model="selectedTo" id="" required>
                                <option value="" disabled>Journey To:</option>
                                <option select = "selected" v-for="to in toPlaces" v-bind:key="to" >
                                 {{to}} 
                                </option>                            
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button @click="search()" type="button" class="btn btn-danger wrn-btn"><i class="fa fa-search" aria-hidden="true" ></i> Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
    <p id="m" v-if= "this.message!=''"><b>
    <i class="fa fa-check-circle" aria-hidden="true" v-if="this.buses.length != 0"></i>
    {{message}}</b></p>
    <p id="m2" v-else-if="this.message2!= ''"><b>
    <i class="fa fa-times-circle" aria-hidden="true"></i>
    {{message2}}</b></p>
    <div v-for="bus in this.buses" v-bind:key="bus" >
        <busCard 
            v-bind:id = "bus.id"
            v-bind:name = "bus.name"
            v-bind:seats = "bus.seats_number"
            v-bind:departureTime = "bus.start_time"
            v-bind:arrivalTime = "bus.end_time"
            v-bind:duration = "durations[durations_index++]"
            v-bind:bus = "bus">
        </busCard>
    </div>
</div>
</template>
<script>
import axios from 'axios';
import busCard from "./UserBusCard.vue";

export default{
    components:{
        busCard 
    },
    mounted(){
        axios.get("/welcome").then(response=>{
            for(var i in response.data){
                if(!this.toPlaces.includes(response.data[i].to)){
                    this.toPlaces.push(response.data[i].to);
                }
                if(!this.fromPlaces.includes(response.data[i].from)){
                    this.fromPlaces.push(response.data[i].from);
                } 
            }
        })
    },
    data(){
        return{
            buses: [],
            selectedfrom:null,
            fromPlaces:[],
            selectedTo:null,
            toPlaces:[],
            durations:[],
            message:"",
                message2:'',
            durations_index: null,
            status: []
        }
    },
    methods:{
        search(){
            this.durations_index = 0;
            this.buses =[];
            this.durations =[];
            let data = {
                from: this.selectedfrom,
                to: this.selectedTo
            }
            axios.post("/searchBus",data).then(response =>{
                for(var i in response.data){
                    this.buses.push(response.data[i]) //append matched results in buses
                    // get duration 
                    var time_start = new Date();
                    var time_end = new Date();    
                    var val_start = response.data[i].start_time.split(':');
                    var val_end = response.data[i].end_time.split(':');
                    time_start.setHours(val_start[0],val_start[1]);
                    time_end.setHours(val_end[0],val_start[1]);
                    var milli = (time_end- time_start);
                    //convert milliseconds to time
                    let time = new Date(milli);
                    let hours = time.getUTCHours();
                    let minutes = time.getUTCMinutes();
                    var d = hours + ":" + minutes;
                    this.durations.push(d);          
                }
                if(this.selectedfrom == null || this.selectedTo == null){                    
                    this.message2 = "Please select destination!";
                }else if(this.buses.length == 0){	                    
                    this.message2 = "No available bus from "+ this.selectedfrom + " to "+ this.selectedTo;
                }else if(this.buses.length != 0){
                    this.message = "Available buses from "+ this.selectedfrom + " to "+ this.selectedTo;
                }
            })
        }
    } 
}
</script>
<style>
#m{
    text-align: center;
    color:#00cc00;
   
}
#m2{
    text-align: center;
    color:red;
}
</style>


