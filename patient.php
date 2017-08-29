
<?php 
		session_start();
		

		
		
		
		$fn =$_SESSION['fname'];
		$ln =$_SESSION['lname'];
		$gen=$_SESSION['gender'];
		$dob =$_SESSION['dob'];
		$st =$_SESSION['StreetAddress'];
		$ad=$_SESSION['addressline'];
		$city=$_SESSION['city'];
		$country =$_SESSION['country'];
		$em=$_SESSION['email'];
		$hom=$_SESSION['homephone'];
		$cell=$_SESSION['cellphone'];
		$work =$_SESSION['workphone'];
		$height=$_SESSION['height'];
		$weight=$_SESSION['weight'];
		$age =$_SESSION['age'];
		$all =$_SESSION['allergies'];
		$blo =$_SESSION['bloodtype'];
		$SAT =$_SESSION['SAT'];
		$det =$_SESSION['details'];
		$pass =$_SESSION['password'];
		
	
			function BMI($height ,$weight){
			$height =$height*$height;
			$bmi =$weight/$height *10000;
			
			if($bmi <= 16){
				echo "=".round($bmi,2)."kg/m2". "(Your underweight)";
			}
			if($bmi >= 18.5 && $bmi <= 25)
			{
				echo  "=".round($bmi,2)."kg/m2"."( your weight is normal)";
			}
			if( $bmi >= 25 && $bmi <= 30 ){
				
					echo "=".round($bmi,2)."kg/m2"."(your weight is overweight)";
			}else if ($bmi > 30){
				
				echo "=".round($bmi,2)."kg/m2"."( your  Obese)";
			}
			
			
			
		}
		
	function doclist(){
	$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
	echo "Doctor list</br>";
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
	
		echo  " <ul>  
		<li>Record: ".$rows[0].",".$rows[1].",".$rows[2].",".$rows[4].",".$rows[5]."</li>
		
		</ul>
		</br>";
			
		}
	}
		
	if (isset($_POST['Signout'])) {
		session_destroy();
		header('Location: healthcarehome.php');
	}	
		
		
		
		
		
		
	//session_destroy();
	?>	
	
	
	
	
	
	
<!doctype html>
<html>
<head>
<title>Patient</title>
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

	<div class='container'>
	    <div class='col-lg-12 text-center'>
			<h2>Welcome <?php echo $_SESSION['fname'];?></h2>
			<h3>Time:
				<?php
					echo
					date("l")." ".
					date("Y/m/d")." ".
					date("h:1:sa");
				?>
			</h3>
		</div>
		<table class="table table-condensed">
			<tbody>
				<tr>
					<td><h3>First Name: </h3></td>
					<td><h3><?php echo $_SESSION['fname'];?></h3></td>
				</tr>

				<tr>
					<td><h3>Last Name: </h3></td>
					<td><h3><?php echo $_SESSION['lname'];?></h3></td>
				</tr>

				<tr>
					<td><h3>Gender: </h3></td>
					<td><h3><?php echo $_SESSION['gender'];?></h3></td>
				</tr>

				<tr>
				<td><h3>Date Of Birth: </h3></td>
				<td><h3><?php echo $_SESSION['dob']; ?></h3></td> 
				<!-- 	<td><?php echo $_SESSION['dob']; ?> </td>-->
				</tr>

				<tr>
					<td><h3>Street Address: </h3></td>
					<td><h3><?php echo $_SESSION['StreetAddress']; ?></h3></td>
				</tr>

				<tr>
					<td><h3>Address Line 2: </h3></td>
					<td><h3><?php echo $_SESSION['addressline']; ?></h3></td>
				</tr>

				<tr>
					<td><h3>City: </h3></td>
					<td><h3><?php echo $_SESSION['city']; ?></h3></td>
				</tr>

				<tr>
					<td><h3>Country: </h3></td>
					<td><h3><?php echo $_SESSION['country']; ?></h3></td>
				</tr>

				<tr>
					<td><h3>Email: </h3></td>
					<td><h3><?php echo $_SESSION['email']; ?></h3></td>
				</tr>

				<tr>
					<td><h3>Home Phone: </h3></td>
					<td><h3><?php echo $_SESSION['homephone']; ?></h3></td>
				</tr>
				
				<tr>
					<td><h3>Work Phone: </h3></td><
					<td><h3><?php echo $_SESSION['workphone']; ?></h3></td>
				</tr>
				
				<tr>
					<td><h3>Cell phone: </h3></td>
					<td><h3><?php echo $_SESSION['cellphone']; ?></h3></td>
				</tr>

				<tr>
					<td><h3>Height: </h3></td>
					<td><h3><?php echo $_SESSION['height']; ?></h3></td>
				</tr>
				
				<tr>
					<td><h3>Weight: </h3></td>
					<td><h3><?php echo $_SESSION['weight']; ?></h3></td>
				</tr>
					
				<tr>
					<td><h3>BMI: </h3></td>
					<td><h3><?php echo BMI ( $_SESSION['height'],$_SESSION['weight']); ?></h3></td>
				</tr>
					
				<tr>
					<td><h3>Age</h3></td>
					<td><h3><?php echo $_SESSION['age']; ?></h3></td>
				</tr>
				<tr>
					<td><h3>Allergies</h3></td>
					<td><h3><?php echo $_SESSION['allergies']; ?></h3></td>
				</tr>
					
				<tr>
					<td><h3>Blood Type</h3></td>
					<td><h3><?php echo $_SESSION['bloodtype']; ?></h3></td>
				</tr>	
				
				<tr>
					<td><h3>System Ailment Type</h3></td>
					<td><h3><?php echo $_SESSION['SAT']; ?></h3></td>
				</tr>	
				
				<tr>
					<td><h3>Health Details</h3></td>
					<td><h3><?php echo $_SESSION['details']; ?></h3></td>
				</tr>
			</tbody>
		</table>
	</div>
	

	
	
	<form  method = 'post'  action='patient.php' novalidate>
	
	<table border =1;>
		<tr>
		<td>View Doctor profile</td>
		 <td><button type='submit' name='view7' >View user </button></td>
		</tr>
	</table>
		<?php
		if(isset($_POST['view7'])){
		doclist();
			}
		?>
		
	</form>
		
		
		
	
</section>

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
                <frameset cols="15%,15%,15%">
				 <frame <?php echo date("Y/m/d"); ?> >
				 </frame >
				</frameset>
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
