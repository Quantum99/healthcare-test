<?php 
   
   session_start();
  
   $name=$_SESSION['name']	;
	$image=$_SESSION['image'];
	$user=$_SESSION['user'];
		

	
	
		
	function nurselist(){
	$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
		
	echo "nurse list</br>";
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query_sel = "SELECT IDnum,name,password,image,qualification,dob FROM nurse";
		//run query
	$display_db = mysqli_query($con, $query_sel);
		
	while($rows = mysqli_fetch_row($display_db))
	{

	echo  " 
		<ul class='list-group'>  
			<li class='list-group-item'>IDnum: ".$rows[0].", Name: ".$rows[1].", Password: ".$rows[2].", Qualification: ".$rows[4].", DOB:".$rows[5]."<a href = deletenurse.php?id=".$rows[0].">Delete</a></li>
	
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
<title>doctorpage</title>
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

	<?php	
		
		
			echo"
			<section>
				<div class='row'>
	                <div class='col-lg-12 text-center'>
	                	<h2>Welcome Doctor $name</h2>
	                </div>
            	</div>

            	<div class='row'>
	                <div class='col-lg-12 text-center'>
	                    <h2>Add new Nurse</h2>
	                </div>
            	</div>

				<form class='form-horizontal' method = 'post'  action='process.php' enctype='multipart/form-data' novalidate>
				<fieldset>

				
				<!-- Name input-->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='textinput'>Name</label>  
				  <div class='col-md-4'>
				  <input id='textinput' name='name' type='text' placeholder='Jon Brown' class='form-control input-md' required=''>
				  <span class='help-block'>Please put the Full Name</span>  
				  </div>
				</div>

				<!-- Password input-->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='passwordinput'>Password</label>
					  <div class='col-md-4'>
					    <input id='passwordinput' name='password' type='password' placeholder='' class='form-control input-md' required=''>
					    
					  </div>
					</div>

				<!-- Image Button --> 
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='image'>Image</label>
					  <div class='col-md-4'>
					    <input id='image' name='image' class='input-file' type='file'>
					  </div>
					</div>

				<!-- Qualification input-->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='qualification'>Qualification</label>  
					  <div class='col-md-4'>
					  <input id='qualification' name='qualification' type='text' placeholder='' class='form-control input-md' required=''> 
					  </div>
					</div>

				<!-- DOB input-->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='dob'>Date of Birth</label>  
					  <div class='col-md-4'>
					  <input id='dob' name='dob' type='text' placeholder='mm/dd/yy' class='form-control input-md' required=''>
					  </div>
					</div>

				

				<!-- Submit Button -->
				    <div class='form-group'>
				      <label class='col-md-4 control-label' for='singlebutton'></label>
				      <div class='col-md-4'>
				        <input type='submit' id='singlebutton' name='Addbutton' class='btn btn-primary' value = 'Add User'>
				      </div>
				    </div>
				</fieldset>
				</form>
			</section>

			<section>
				<form class='form-horizontal' method = 'post'  novalidate>
					<fieldset>
					<!-- Button -->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='view2'>View Nurse List</label>
					  <div class='col-md-4'>
					    <button type='submit' id='view' name='view' class='btn btn-primary'>View Nurses</button>
					  </div>
					</div>
					</fieldset>
				</form>
			</section>
		";

		echo "

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
			      

		";
		
		if(isset($_POST['view'])){
		
					nurselist();
			}
		
		
		echo "


			        </div>
			    </div>
			</div>
		</section>

		";	
			
			
		?>
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
