<template>
<div class="container contact-form" id="cont">
    <div class="contact-image">
        <img src="https://library.kissclipart.com/20180915/xue/kissclipart-bus-circle-icon-clipart-bus-interchange-computer-i-c5a778526be30db9.jpg" alt="rocket_contact"/>
    </div>
    <form method="post">
        <h3>Bus Ticketing </h3>
        <div class="row">
            <div class="col-md-12">
              <p>
                  Bus Ticketing is a Web Application that is build for ticket reservation. This will allow users to book
                  tickets and they can  choose a seats wherever they want to be seated. It focuses only on ticket reservation and it 
                  caters all passengers who wants to book tickets. 
              </p>
            </div>
        </div>
        <section class="team-area pt-100 pb-100" id="team">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 mx-auto text-center">
                            <div class="section-title">
                                <h4>Meet the Team!</h4>
                                <p id='p'>DEVELOPERS</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-team">
                                <img src="pics/renan.png" alt="">
                                <div class="team-hover">
                                    <h4>Renan Bargaso <span>Passerelles Numeriques Student</span></h4>
                                    <p>University of San Carlos</p>
                                    <a href="https://www.passerellesnumeriques.org/en/our-actions/philippines/"><i class="fa fa-location-arrow"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-team">
                                <img src="pics/jake.png" alt="jake">
                                <div class="team-hover">
                                    <h4>Jakeniel Erim <span>Passerelles Numeriques Student</span></h4>
                                    <p>University of San Carlos</p>
                                    <a href="https://www.passerellesnumeriques.org/en/our-actions/philippines/"><i class="fa fa-location-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-team">
                                <img src="pics/labs.png" alt="labs">
                                <div class="team-hover">
                                    <h4>Grace Laborada <span>Passerelles Numeriques Student</span></h4>
                                    <p>University of San Carlos</p>
                                    <a href="https://www.passerellesnumeriques.org/en/our-actions/philippines/"><i class="fa fa-location-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	  </section>
    </form>
</div>
</template>
<style>
#cont{
    margin-top:10%;
    border-radius: 25px;
}
#p{
    color:white;
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
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
.pt-100{
    padding-top:100px;
}
.pb-100{
    padding-bottom:100px;
}
.section-title {
  margin-bottom: 60px;
}
.section-title p {
	color: #777;
	font-size: 16px;
}
.section-title h4 {
	text-transform: capitalize;
	font-size: 40px;
	position: relative;
	padding-bottom: 20px;
	margin-bottom: 20px;
	font-weight: 600;
}
.section-title h4:before {
	position: absolute;
	content: "";
	width: 60px;
	height: 2px;
	background-color: #ff3636;
	bottom: 0;
	left: 50%;
	margin-left: -30px;
}
.section-title h4:after {
	position: absolute;
	background-color: #ff3636;
	content: "";
	width: 10px;
	height: 10px;
	bottom: -4px;
	left: 50%;
	margin-left: -5px;
	border-radius: 50%;
}
.single-team img {
  width: 100%;
  height:180px;
}
.single-team {
  position: relative;
}
.team-hover {
  background-color: #222;
  color: #fff;
  position: absolute;
  bottom: -220px;
  left: 0;
  width: 100%;
  padding: 10px;
  text-align: center;
  -webkit-transition: .4s;
  transition:.4s
}
.team-hover h4 {
  font-size: 20px;
  text-transform: capitalize;
}
.team-hover h4 span {
  display: block;
  font-size: 14px;
  font-weight: 300;
  margin: 10px 0;
}
.team-hover a {
  display: inline-block;
  color: #fff;
  padding: 0 5px;
}
.single-team:hover .team-hover {
  bottom: 0;
}
.single-team {
  overflow: hidden;
}
</style> 