<?php 
   
   session_start();
  
   
		$id=$_SESSION['id']	;
		$name=$_SESSION['name']	;
		//$image=$_SESSION['image'];

	
	
	
	
	
		
		
	function Patient(){
	$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
		

	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query_sel = "SELECT * from patient ";
		//run query
	$display_db = mysqli_query($con, $query_sel);
		
		while($rows = mysqli_fetch_row($display_db))
		{
			$pid=$rows[0];
		$pname =$rows[1];
		echo  "<select id='patient' name = 'patient'>
		<option value='default'>default</option>
		<option value=$pid>$pname </option>
		</select>
		";
		
			
		}
   
		}
		
	function doclist(){
	$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
	
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query_sel = "SELECT IDnum,name,password,image,qualification,dob FROM doctor";
		//run query
	$display_db = mysqli_query($con, $query_sel);
		
		while($rows = mysqli_fetch_row($display_db))
		{
		$docid=$rows[0];
		$docname =$rows[1];
		echo  "<select id='doctor' name = 'doctor'>
		<option value='default'>default</option>
		<option value=$docid>$docname </option>
		</select>
		";
			
		}
	
	}
	
	function Patientlist(){
	$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
		
	echo "nurse list</br>";
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query_sel = "SELECT * from patient ";
		//run query
	$display_db = mysqli_query($con, $query_sel);
		
		while($rows = mysqli_fetch_row($display_db))
		{
	
		echo  " 
		<ul class='list-group'>  
			<li class='list-group-item'>Record: ".$rows[0].",".$rows[1].",".$rows[2].",".$rows[3].",".$rows[4].",".$rows[5]." <a href = delete.php?id=".$rows[0].">Delete3</a>
			</li>
		</ul>
		</br>";
			
		}
   
		}

	if (isset($_POST['Signout'])) {
		session_destroy();
		header('Location: healthcarehome.php');
	}
		
		
		
		
		
		
 ?>


<!doctype html>
<html>
<head>
<title>nursepage</title>
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
      		<li><input class="btn btn-primary" type ='submit' name = 'Signout' value="Signout" /></li>
      	</ul>	
		
      </form>
      
    </nav>
  </div>
</header>


<section>
	<div class='row'>
	    <div class='col-lg-12 text-center'>
			<h1>Welcome Nurse <?php echo$name?></h1></br>
		</div>
	</div>

	<div class='row'>
        <div class='col-lg-12 text-center'>
            <h2>Make an appointment</h2>
        </div>
	</div>
	
	<form class='form-horizontal' method = 'post'  action='process.php' enctype='multipart/form-data' novalidate>
		<fieldset>

		<!-- Date input-->
		<div class='form-group'>
		  <label class='col-md-4 control-label' for='date'>Date</label>  
		  <div class='col-md-4'>
		  <input id='date' name='date' type='date' placeholder='' class='form-control input-md' required=''>
		  </div>
		</div>

		<!-- Time input-->
		<div class='form-group'>
		  <label class='col-md-4 control-label' for='time'>Time</label>  
		  <div class='col-md-4'>
		  <input id='time' name='date' type='time' placeholder='' class='form-control input-md' required=''>
		  </div>
		</div>

		<!-- Doctor input-->
		<div class='form-group'>
		  <label class='col-md-4 control-label' for='doctor'>Doctor</label>  
		  <div class='col-md-4'>
		 	<?php doclist();?>
		  </div>
		</div>
		
		<!-- Patient input-->
		<div class='form-group'>
		  <label class='col-md-4 control-label' for='patient'>Patient</label>  
		  <div class='col-md-4'>
		 	<?php Patient();?>
		  </div>
		</div>
		
		<!-- Submit Button -->
	    <div class='form-group'>
	      <label class='col-md-4 control-label' for='singlebutton'></label>
	      <div class='col-md-4'>
	        <input type='submit' id='singlebutton' name='app' class='btn btn-primary' value = 'set appointment'>
	      </div>
	    </div>
		
		</fieldset>
	</form>
		
</section>			
			
<section>	
	<form class='form-horizontal' method = 'post'  action='demographic.php' novalidate>
		<fieldset>
			<div class='row'>
			    <div class="form-group">
			    	<label class="col-md-4 control-label" for="view">Register New Patient</label>
			    </div>
			    <div class="col-md-4">
			    	<button type='submit' id="view" class="btn btn-primary" name='view' >Register </button>
			    </div>
			</div>
		</fieldset>
	</form>

			
	<form class='form-horizontal' method='post' action='nursepage.php'>
		<fieldset>

			<div class='row'>
			    <div class="form-group">
			    	<label class="col-md-4 control-label" for="view1">View Patients</label>
			    </div>
			    <div class="col-md-4">
			    	<button type='submit' id="view1" class="btn btn-primary" name='view1' >View</button>
			    </div>
			</div>
		</fieldset>
	</form>
		
	
</section>

<section id='results'>
	<div class='container'>
		<div class='row'>
	        <div class='col-lg-12 text-center'>
	            <h2>Here's The Result:</h2>
	            <hr class='star-light'>
	        </div>
	    </div>
	    <div class='row'>
	        <div class='col-lg-12'>

<?php

	if(isset($_POST['view1'])){
			Patientlist();
	}	
?>

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
