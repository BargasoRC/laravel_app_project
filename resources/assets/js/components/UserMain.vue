
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
                            <select class="form-control search-slt" v-model="selectedfrom" id="">
                                <option select = "selected" v-for="from in fromPlaces" v-bind:key="from.placeName" >
                                 {{from.placeName}}
                                </option>
                                
                            
                            </select>
                            
                        </div>
                       
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                             <select class="form-control search-slt" v-model="selectedTo" id="">  
                                <option select = "selected" v-for="to in toPlaces" v-bind:key="to.placeName" >
                                 {{to.placeName}} 
                                </option>                            
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-danger wrn-btn"><i class="fa fa-search" aria-hidden="true" @click="search()"></i> Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div>
   <h1>Available </h1>
</div>
<div v-for="bus in this.buses">
    <busCard
    v-bind:id = "bus.id"
    v-bind:name = "bus.name"
    v-bind:seats = "bus.seats_number"
    v-bind:departureTime = "bus.start_time"
    v-bind:arrivalTime = "bus.end_time"
    v-bind:duration = "bus.name">
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
        axios.get("/user").then(response=>{
            console.log("ok")
            console.log(response)
            // for(var i in response.data){
            //     console.log(response.data[i]);
            //     //this.toPlaces.push({placeName:response.data[i].to});
            //     //this.fromPlaces.push({placeName:response.data[i].from});
                
            // }
           
        })
    },
    data(){
        return{
            buses: [],
            selectedfrom:'From',
            fromPlaces:[
                {placeName:'Talisay'},
                {placeName:'another'}
            ],
            selectedTo:'From',
            toPlaces:[
                {placeName:'Dalaguete'},
                {placeName:'another'}
            ]
        }
    },
    methods:{
        search(){
            let data = {
                from: this.selectedfrom,
                to: this.selectedTo
            }
            axios.post("/searchBus",data).then(response =>{
                for(var i in response.data){
                    this.buses.push(response.data[i])
                    console.log(response.data[i]);
                }
              console.log(response);
            })

        }
    }
    
 
}
</script>


