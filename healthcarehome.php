<?php 

if(isset($_POST['Sign_up']))
{
	$error = array();
	
	
	if(count ($error)==0){
		
		header("location:demographic.php");
		exit();
	}
	
}
elseif (isset($_POST['Signin'])) {
	$error = array();
	
	
	if(count ($error)==0){
		
		header("location:Signin.php");
		exit();
	}
}






?>








<!doctype html>
<html>
<head>
<title>homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="main.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>



<body>
<!--
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav> -->

<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="./" class="navbar-brand">Healthcare.com</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a class="nav-link" href="#">About Us</a>
        </li>
		<li>
			<a class="nav-link" href="#">Gallery</a>
		</li>
      	<li>
      		<a class="nav-link" href = '#' >Contact Us</a>
      	</li>		
      </ul>
      <form method='POST' id = 'sign form'>
		<ul class="nav navbar-nav navbar-right">
      		<li><input class="btn btn-primary" type ='submit' name = 'Signin' value="Signin" /></li>
        	<li><input class="btn btn-primary" type = 'submit'  name = 'Sign_up' value = 'Signup' /></li>
      	</ul>	
		
      </form>
      
    </nav>
  </div>
</header>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="image/healthcare.jpg">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 <!-- About Section -->
    <section class="about-us" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Welcome to HealthCare!</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Health has launched a new health platform and sevice,to serve you even better. Use your usual username and password to access your HealthCare accounts, pay bills,make appointments</p>
                </div>
                <div class="col-lg-4">
                    <p>View investments and do account transfers. We provide the best health care solution</p>
                </div>
            </div>
        </div>
    </section>


<section id="gallery">
	<div class="container">
		<div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Problem We Take Care Of</h2>
                    <hr class="star-primary">
                </div>
            </div>
		<div class="row">
			<div class="col-md-6 gallery-item">
				<div class="thumbnail">
					<img src="image/heart1.jpg" alt="Heart" class="img-responsive">
					<div class="caption">
      					<p>Cardiovascular</p>
    				</div>
				</div>
			</div>
			<div class="col-md-6 gallery-item">
				<div class="thumbnail">
					<img src="image/digestive.jpg" alt="Digestive" class="img-responsive">
					<div class="caption">
						<p>Digestive system</p>
					</div>
				</div>
			</div>		
		</div>

		<div class="row">
			<div class="col-md-6 gallery-item">
				<div class="thumbnail">				
					<img src="image/endocrine.jpg" alt="Endocrine" class="img-responsive">
					<div class="caption">
						<p>Endocrine system</p>
					</div>	
				</div>
			</div>
			
			<div class="col-md-6 gallery-item">
				<div class="thumbnail">
					<img src="image/muscular.jpg" alt="Muscular" class="img-responsive">
					<div class="caption">
						<p>Muscular system</p>
					</div>
				</div>
			</div>
		</div>

			<div class="row">
                <div class="col-lg-12 text-center">
                    <h2>AND MORE</h2>
                    <hr class="star-primary">
                </div>
            </div>
				
	</div>
</section>	

<footer>
  <div class="container">
  	<div class="row" id="contact">
                <div class="col-lg-12 text-center">
                    <h2>CONTACT</h2>
                    <hr class="star-primary">
                </div>
            </div>
		<div class="row">
    <div class="row">
      <div class="col-md-4 footerleft ">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,...</p>
        <p><i class="fa fa-map-pin"></i> Some Place in Jamaica</p>
        <p><i class="fa fa-phone"></i> Phone (Jamaica) : +876 878 398</p>
        <p><i class="fa fa-envelope"></i> E-mail : info@healthcare.com</p>
        
      </div>
      <div class="col-md-4 paddingtop-bottom">
        <h6 class="heading7">GENERAL LINKS</h6>
        <ul class="footer-ul">
        	<li><a href = 'healthcarehome.php' >Home</li></a>
			<li><a href = 'healthcarehome.php' >About us </li></a>
			<li><a href = 'healthcarehome.php' >News</li></a>
			<li><a href = 'contact.php' >Contact Us</li></a>	
        </ul>
      </div>
      <div class="col-md-4 paddingtop-bottom">
        <h6 class="heading7">LATEST POST</h6>
        <div class="post">
          <p>New Service<span>August 3,2015</span></p>
          <p>New Service <span>August 3,2016</span></p>
          <p>New Service<span>August 3,2017</span></p>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="copyright">
  <div class="container">
    <div class="row">
      <hr class="star-primary">
      <p><h4>© 2017 Healthcare Jamaica Ltd | Privacy Policy | Terms and Conditions| JBA Code of Banking Practice | FATCA FAQ</h4></p>
    </div>
  </div>
</div>

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>

</html>
