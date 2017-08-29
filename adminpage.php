<?php 
   
   session_start();
  
	$id=$_SESSION['id']	;
	$name=$_SESSION['name']	;
	$image=$_SESSION['image'];
			
				/// show admin list
   function Adminlist(){
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
		
		echo "Admin list</br>";
		
		//check if error to connect to database
		if(mysqli_error($con))
		{
			die("There was an error in connecting to database");
		}
		
		//run query
		$query_sel = "SELECT IDnum,name,password,image,qualification,dob FROM admin";
		
		$display_db = mysqli_query($con, $query_sel);
			
		while($rows = mysqli_fetch_row($display_db))
		{
			$id= $rows[0];
			$name= $rows[1];
			$password= $rows[2];
			$image= $rows[3];
			$qualification= $rows[4];
			$dob= $rows[4];
			echo " 
				<ul class='list-group'>  
				<li class='list-group-item'>IDnum: ".$rows[0].", Name: ".$rows[1].", Password: ".$rows[2].", Qualification: ".$rows[4].", DOB:".$rows[5]." <a href = delete.php?id=".$rows[0]."></a>
				</li>
				
				</ul>
				</br>
			";
		}
		
	}

	function delete($idnum){
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
		//check if error to connect to database
		if(mysqli_error($con))
		{
			die("There was an error in connecting to database");
		}
		else
		{
			$query_del = "DELETE FROM admin WHERE IDnum = $idnum";
			mysqli_query($con, $query_del);
			mysqli_close($con);	
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
			
	
		echo  " 
			<ul class='list-group'>  
				<li class='list-group-item'>IDnum: ".$rows[0].", Name: ".$rows[1].", Password: ".$rows[2].", Qualification: ".$rows[4].", DOB:".$rows[5].">Delete</a>
				</li>
			</ul>
		</br>";	
		}
	}
		
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
				<li class='list-group-item'>IDnum: ".$rows[0].", Name: ".$rows[1].", Password: ".$rows[2].", Qualification: ".$rows[4].", DOB:".$rows[5]." <a href = delete3.php?id=".$rows[0].">Delete</a>
				</li>
			</ul>
			</br>";	
		}
	}

	//patient list
	function patientlist(){
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
		
		echo "Patient list</br>";
		//check if error to connect to database
		if(mysqli_error($con))
		{
			die("There was an error in connecting to database");
		}
		
		$query_sel = "SELECT firstname,lastname,password,gender,image,dob,email, height, weight, age FROM patient";
			//run query
		$display_db = mysqli_query($con, $query_sel);
			
		while($rows = mysqli_fetch_row($display_db))
		{

	
		echo  "
			<ul class='list-group'>  
				<li class='list-group-item'>First Name: ".$rows[0].", Last Name: ".$rows[1].", Password: ".$rows[2].", Gender:".$rows[3].", DOB: ".$rows[5].", E-mail: ".$rows[6].", Height: ".$rows[7].", Weight: ".$rows[8].", Age: ".$rows[9]."<a href = delete4.php?id=".$rows[0].">Delete</a>
				</li>
			</ul>
			</br>";
			
		}
    }
		
		
	function countadmin(){
		$con = mysql_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
		
		
		//check if error to connect to database
		if(!$con)
		{
			die("There was an error in connecting to database");
		}
		
		mysql_select_db("healthcare_database",$con);
		
		//run query
		$result = mysql_query("SELECT count(1)from admin");	
		$row= mysql_fetch_array($result);
		$rowcount =$row[0];
			
		return $rowcount;
	}
	if (isset($_POST['Signout'])) {
		session_destroy();
		header('Location: healthcarehome.php');
	}
		
		
 ?>


<!doctype html>
<html>
<head>
<title>adminpage</title>
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
      		<li><input class="btn btn-primary" type ='submit' name = 'Signout' value="Signout" /></li>
      	</ul>	
		
      </form>
      
    </nav>
  </div>
</header>

<div id = "container">
	<?php	
		
			echo "
			<section>
				<div class='row'>
	                <div class='col-lg-12 text-center'>
	                    <img src='data:image/jpeg;base64,'>
	                    <h2>Welcome to Administrator page $name</h2>
	                </div>
            	</div>

            	<div class='row'>
	                <div class='col-lg-12 text-center'>
	                    <h2>Add new User</h2>
	                </div>
            	</div>

				<form class='form-horizontal' method = 'post'  action='process.php' enctype='multipart/form-data' novalidate>
				<fieldset>

				<!-- Select User type -->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='user'>User</label>
				  <div class='col-md-4'>
				    <select id='user' name='user' class='form-control'>
				      <option value='admin'>Admin</option>
				      <option value='doctor'>Doctor</option>
				      <option value='nurse'>Nurse</option>
				      <option value='patient'>Patient</option>
				    </select>
				  </div>
				</div>

				<!-- Name input-->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='textinput'>Name</label>  
				  <div class='col-md-4'>
				  <input id='textinput' name='name' type='text' placeholder='Jon Brown' class='form-control input-md' required=''>
				  <span class='help-block'>Please put you Full Name</span>  
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
				  <input id='dob' name='dob' type='text' placeholder='' class='form-control input-md' required=''>
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

				<!-- Submit Button -->
			    <div class='form-group'>
			      <label class='col-md-4 control-label' for='singlebutton'></label>
			      <div class='col-md-4'>
			        <input type='submit' id='singlebutton' name='Addbutton' class='btn btn-primary' value = 'upload'>
			      </div>
			    </div>

				</fieldset>
				</form>
			</section>

			<section>

				<form class='form-horizontal' method = 'post'  action='adminpage.php' novalidate>
					<fieldset>

					<div class='row'>
					    <div class='col-lg-12 text-center'>
					        <h2>Select what to View</h2>
					    </div>
					</div>

					<!-- Button -->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='view'>View Admin List</label>
					  <div class='col-md-4'>
					    <button type='submit' id='view' name='view' class='btn btn-primary' value =\"Adminlist();\">View Admins</button>
					  </div>
					</div>
					</fieldset>
				</form>

				<form class='form-horizontal' method = 'post'  action='adminpage.php' novalidate>
					<fieldset>
					<!-- Button -->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='view2'>View Doctor List</label>
					  <div class='col-md-4'>
					    <button id='view2' name='view2' class='btn btn-primary'>View Doctors</button>
					  </div>
					</div>
					</fieldset>
				</form>

				<form class='form-horizontal' method = 'post'  action='adminpage.php' novalidate>
					<fieldset>
					<!-- Button -->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='view3'>View Nurse List</label>
					  <div class='col-md-4'>
					    <button id='view3' name='view3' class='btn btn-primary'>View Nurses</button>
					  </div>
					</div>
					</fieldset>
				</form>

				<form class='form-horizontal' method = 'post'  action='adminpage.php' novalidate>
					<fieldset>
					<!-- Button -->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='view4'>View Patient List</label>
					  <div class='col-md-4'>
					    <button id='view4' name='view4' class='btn btn-primary'>View Patients</button>
					  </div>
					</div>
					</fieldset>
				</form>

				<form class='form-horizontal' method = 'post'  action='adminpage.php' novalidate>
					<fieldset>
					<!-- Button -->
					<div class='form-group'>
					  <label class='col-md-4 control-label' for='view5'>Resign as Admin</label>
					  <div class='col-md-4'>
					    <button id='view5' name='view5' class='btn btn-primary'>Resign</button>
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

		if(isset($_POST['view']))
		{
			Adminlist();
			header('Location:adminpage.php#results');
			
		}
		else if(isset($_POST['view2']))
		{
			doclist();
			header('Location:adminpage.php#results');
		}
		else if(isset($_POST['view3']))
		{
			nurselist();
			header('Location:adminpage.php#results');
		}
		else if(isset($_POST['view4']))
		{
			patientlist();
			header('Location:adminpage.php#results');
		}
		else if(isset($_POST['view5'])){
			if (countadmin()==1){
				header('Location:adminpage.php#results');
				echo"cant be less than one admin account";
				
			}else{
			delete($id);
			header('Location:Signin.php');
		}			
				
		}		

		echo "


			        </div>
			    </div>
			</div>
		</section>

		";
	?>
</div><!--container-->

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
