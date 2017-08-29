<?php 
   
   if (isset($_POST['Signin'])) {
		$error = array();
		
		
		if(count ($error)==0){
			
			header("location:Signin.php");
			exit();
		}
	}

   session_start();
   if(isset($_POST['btn_submit']))
	{	
    $_SESSION['title'] = $_POST['title'];
	$_SESSION['fname'] =  $_POST['fname'];
	$_SESSION['lname'] = $_POST['lname'];
	$_SESSION['gender']=  $_POST['gender'];
	$_SESSION['dob'] =  $_POST['dob'];
	$_SESSION['password'] = $_POST['password'];
	$error = array();
	
	 if(empty($_POST['fname']))
	 {
		 
		$error['fname1']="Your name  cannot be empty.";	 
	 }
	 
	 if(strlen($_POST['fname']) < 2)
	 {
		  
		$error['fname2']="Your firstname should be more than 2 characters.";
	 }
	 
	 
	 if(ctype_upper(substr($_POST['fname'],0,1))){
		
	}else{
		$error['fname3']="Your first name should start with capital letter.";
	}	
	
	 
	
	 
	 
	 
	 if(empty($_POST['lname']))
	 {
		 
		$error['lname1']="Your last name should be more than 2 characters.";
		 
	 }
	 
	 if(empty($_POST['dob']))
	 {
		$error['dob1']="Your date of birth should not be empty.";
	 }
		
		
   
   $date = $_POST['dob'];
	if(date('m/d/Y',strtotime($date))==$date)
	{
	}else{
		$error['dob2']='The date is not valid.';
	}

	
	
	if(count($error)==0)
	{
		
		$_SESSION['error']=0;
		echo $error;
		header("location:contact.php");	
		 exit();
	}
	
}
   
   
 ?>


<!doctype html>
<html>
<head>
<title>demographic</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="main.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>



<body>
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
      		<a class="nav-link" href = '#contact' >Contact Us</a>
      	</li>		
      </ul>
      <form method='POST' id = 'sign form'>
		<ul class="nav navbar-nav navbar-right">
      		<li><input class="btn btn-primary" type ='submit' name = 'Signin' value="Signin" /></li>
      	</ul>	
		
      </form>
      
    </nav>
  </div>
</header>

<section>
	
	<form class="form-horizontal" method = 'post'  action='demographic.php' novalidate>
	<fieldset>

	<!-- Form Name -->
	<legend>Sign Up Form</legend>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="selectbasic">Title</label>
	  <div class="col-md-4">
	    <select id="selectbasic" name="selectbasic" class="form-control" value="<?php if(isset($_SESSION['title'])); ?>">
	      <option value="Mister">Mr</option>
	      <option value="Missess">Mrs</option>
	      <option value="Miss">Ms</option>
	    </select>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="fname">First Name</label>  
	  <div class="col-md-4">
	  <input id="fname" name="fname" type="text" placeholder="Jill" class="form-control input-md"  value="<?php if(isset($_SESSION['urs'])) echo $_SESSION['fname']; ?>" required="">
	  <span class="help-block">
	  	<p> <?php if(isset($error['fname1']))echo  $error['fname1']; ?> </p>
		<p> <?php if(isset($error['fname2']))echo  $error['fname2']; ?> </p>
		<p> <?php if(isset($error['fname3']))echo  $error['fname3']; ?> </p>
	  </span>    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="lname">Last Name</label>  
	  <div class="col-md-4">
	  <input id="lname" name="lname" type="text" placeholder="Stone" class="form-control input-md" value="<?php if(isset($_SESSION['lname']))echo $_SESSION['lname']; ?>" required="">
	  <span class="help-block">
	  	<p> <?php if(isset($error['lname1']))echo  $error['lname1']; ?> </p>
	  </span>    
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="gender">Gender</label>
	  <div class="col-md-4">
	    <select id="gender" name="gender" class="form-control">
	      <option value="male">Male</option>
	      <option value="female">Female</option>
	    </select>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="dob">DOB</label>  
	  <div class="col-md-4">
	  <input id="dob" name="dob" type="text" placeholder="mm/dd/yy" class="form-control input-md" value="<?php if(isset($_SESSION['dob']))echo $_SESSION['dob']; ?>" required="">
	  <span class="help-block">
	  	Please enter date of birth
	  	<p> <?php if(isset($error['dob1']))echo  $error['dob1']; ?> </p>
		<p> <?php if(isset($error['dob2']))echo  $error['dob2']; ?> </p>
	  </span>  
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="password">Password</label>
	  <div class="col-md-4">
	    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
	    
	  </div>
	</div>

	
	<!-- Submit Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="singlebutton"></label>
	  <div class="col-md-4">
	    <input type="submit" id="singlebutton" name="btn_submit" class="btn btn-primary" value = 'Sign Up'>
	  </div>
	</div>

	</fieldset>
	</form>


</section>
		
		
		
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
