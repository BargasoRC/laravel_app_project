<template>
  <div class="container contact-form" id='cont'>
    <div class="contact-image">	  
        <img src="https://library.kissclipart.com/20180915/xue/kissclipart-bus-circle-icon-clipart-bus-interchange-computer-i-c5a778526be30db9.jpg" alt="rocket_contact"/>	
        <form>
             <h3>For more information contact!</h3>
             <div class="row">
                <div class="col-md-12">
                    <i class="fa fa-address-card bigicon">renan.bargaso@student.passerellesnumeriques.org</i>
                    <i class="fa fa-address-card bigicon">grace.laborada@student.passerellesnumeriques.org </i>        
                    <i class="fa fa-address-card bigicon">jakeniel.erim@student.passerellesnumeriques.org</i>
                   <br>
                    <i class="h fa fa-globe bigicoon">www.passerellesnumeriques.org</i><br>
                    <i class="h fa fa-bus" aria-hidden="true">www.busticketing.com</i>
                </div>
            </div>
           
          
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>     
        </form>
    </div>
</div>
</template>
<style>
#cont{
    margin-top:10%;	  
    border-radius: 25px;
}
#contactImg{
    height: 300px;
    width:300px;
}
.contact-form{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 10rem;
    width: 11%;
    margin-top: -3%;
    
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: red;
}

.bigicon { 
    border-radius: 1rem;	  
    color: #fff;		  
    cursor: pointer;	  
    
}
.h{
    font-size: 20px;
    color: #fff;
   
}
.three{
    text-align: center;
}	
</style>