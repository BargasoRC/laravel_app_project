<template>
  <div class="container ">

      <div class="row ">
        <div class="col-md-8">
        
             
           <form class="form-horizontal" method="post">
       
             <center>
                 <div class="card ">
             <h2 class="header">Information</h2>
          
                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"> <i class="fa fa-user bigicon"></i></span>
                    <div class="col-md-8">
                     <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                    </div>
                </div>
                <div class="form-group ">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-birthday-cake bigicon"></i></span>
                    <div class="col-md-8">
                      <input id="age" name="age" type="number" placeholder="Age" class="form-control">
                    </div>
                </div>

                <div class="form-group ">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-venus-mars bigicon"></i></span>
                    <div class="col-md-8">
                        <select class="custom-select form-control" id="gender" name="gender" type="text" placeholder="Gender" >
                            <option selected>Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group "> <span class="col-md-1 col-md-offset-2 text-center"> <i class="fa fa-address-card-o bigicon"></i></span>
                    <div class="col-md-8">
                     <input id="address" name="address" type="text" placeholder="Address" class="form-control">
                    </div>
                </div>

                <div class="form-group ">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                    <div class="col-md-8">
                     <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                    </div>
                </div>
                <div class="form-group "> <span class="col-md-1 col-md-offset-2 text-center"> <i class="fa fa-envelope-o bigicon"></i></span>
                    <div class="col-md-8">
                     <input id="email" name="email" type="email" placeholder="Email Address" class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-outline-primary ">Submit</button>
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

.card{
  background-color: white;
  margin-left: 25%;
  width: 100%;
}
.btn{
  width:100px;
}

</style>