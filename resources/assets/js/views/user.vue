<template>
<div>
<link href="css/navbar.css" rel= "stylesheet">
<div id= "nav">
<div class="topnav" id="myTopnav">
  <a href="user#/welcome" class="active"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
  <a href="user#/contact"><i class="fa fa-id-card" aria-hidden="true"></i> Contact</a>
  <a href="user#/about"> About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</div>
    <router-view></router-view>
</div>
</template>
<script>

import router from "../router/User.js";
export default {
      
        methods:{
            
        }   
    }   
</script>