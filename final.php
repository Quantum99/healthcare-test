
<?php 
		session_start();
		
	
		
		function Agefor ($birthDate){
			 $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
		//echo "Age is:" . $age;
			
			return $age;
		}
		
		
		echo $_SESSION['age']=Agefor($_SESSION['dob']);
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
		
		
		// add patient to database
		function addpatient($fn,$ln,$gen,$dob,$st,$ad,$city,$em,$hom,$cell,$work,$height,$weight,$age,$all,$blo,$SAT,$det,$country,$pass )
		{

		
	
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database");
		
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	else
	{
		
		
		//$query_ins = "INSERT INTO patient (firstname,lastname,gender,dob,streetaddress,addressLine2,city,email,homephone,workphone,cellphone,height,weight,age,allergies,bloodtype,systemAilment,health details,country) VALUES (\"$fn\",\"$ln\",\"$gen\",\"$dob\",\"$st\",\"$ad\",\"$city\",\"$em\",\"$hom\",\"$cell\",\"$work\",\"$height\",\"$weight\",\"$age\",\"$all\",\"$blo\",\"$SAT\",\"$det\",\"$country\")";
		$query_ins = "INSERT INTO patient (firstname,lastname,gender,dob,streetaddress,addressLine2,city,email,homephone,workphone,cellphone,height,weight,age,allergies,bloodtype,systemAilment,healthdetails,country,password) VALUES (\"$fn\",\"$ln\",\"$gen\",\"$dob\",\"$st\",\"$ad\",\"$city\",\"$em\",\"$hom\",\"$work\",\"$cell\",\"$height\",\"$weight\",\"$age\",\"$all\",\"$blo\",\"$SAT\",\"$det\",\"$country\",\"$pass\")";
		
		mysqli_query($con, $query_ins);
	
		
		mysqli_close($con);
		
	}
	
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
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
		
		
		if(isset($_POST['Save'])){
		
		 addpatient($fn,$ln,$gen,$dob,$st,$ad,$city,$em,$hom,$cell,$work,$height,$weight,$age,$all,$blo,$SAT,$det,$country,$pass);	
		header('Location:patient.php');
		session_destroy();
			}
		
	
	?>	
	
	
	
	
	
	
<!doctype html>
<html>
<head>
<title>Final</title>
<link rel = "stylesheet" type = "text/css" href="style.css">
</head>



<body>
<div id ="header">
<a href ="" ><img src ='image/logo.jpg'  width = '200px' height = '200px' alt='logo'/></a>
<h1>Healthcare.com </h1>
<h4>smart choice for your health</h4>
</div><!-- header-->

<div id ="navigation">
	<ul>
		<li><a href = 'healthcarehome.php' >Home</li></a>
		<li><a href = 'homepage.html' >About us </li></a>
		<li><a href = 'homepage.html' >News</li></a>
		<li><a href = 'homepage.html' >Contact Us</li></a>
	
	</ul>


</div><!--navigation -->
<div id = "container">

<div id="content">

<div id ="contentleft">


		<h1>Information </h1>
		
		<?php
		echo
		
			date("l")." ".
			date("Y/m/d")." ".
			date("h:1:sa");
		?>
		 
		 
		 
		
	
			<form  method = "POST" action ='final.php'>
			<table border = '1px' style = 'margin-top: 10px  float:right; background-color:gray;' >
			<h2 style = 'Times New Roman color: blue; '>Welcome <?php echo $_SESSION['fname'];?>, is this information correct ? </h2>
			<tr>
			<td>Title</td>
			<td><?php echo $_SESSION['title']; ?></td>
			</tr>
			
			<tr>
			<td>First Name </td>
			<td><?php echo $_SESSION['fname']; ?></td>
			</tr>
			
			<tr>
			<td>Last Name</td>
			<td><?php echo $_SESSION['lname']; ?></td>
			</tr>
			
			<tr>
			<td>Gender</td>
			<td><?php echo $_SESSION['gender']; ?></td>
			</tr>
			
			<tr>
			<td>Date Of Birth</td>
			<td><?php echo $_SESSION['dob']; ?> </td> 
			<!-- 	<td><?php echo $_SESSION['dob']; ?> </td>-->
			<tr>
			
			<tr>
			<td>Street Address </td>
			<td><?php echo $_SESSION['StreetAddress']; ?></td>
			</tr>
			
			<tr>
			<td>Address Line 2</td>
			<td><?php echo $_SESSION['addressline']; ?></td>
			</tr>
			
			<tr>
			<td>City</td>
			<td><?php echo $_SESSION['city']; ?></td>
			</tr>
			
			<tr>
			<td>Country</td>
			<td><?php echo $_SESSION['country']; ?></td>
			</tr>
	
		<tr>
			<td>Email </td>
			<td><?php echo $_SESSION['email']; ?></td>
			</tr>
			
		<tr>
			<td>Home Phone </td>
			<td><?php echo $_SESSION['homephone']; ?></td>
			</tr>
		<tr>
			<td>Work Phone </td>
			<td><?php echo $_SESSION['workphone']; ?></td>
			</tr>
		<tr>
			<td>Cell phone</td>
			<td><?php echo $_SESSION['cellphone']; ?></td>
			</tr>
		
			<tr>
			<td>Height</td>
			<td><?php echo $_SESSION['height']; ?></td>
			</tr>
			<tr>
			<td>Weight</td>
			<td><?php echo $_SESSION['weight']; ?></td>
			</tr>
			
			<tr>
			<td>BMI</td>
			<td><?php echo BMI ( $_SESSION['height'],$_SESSION['weight']); ?></td>
			</tr>
			
			
			
			<tr>
			<td>Age</td>
			<td><?php echo $_SESSION['age']; ?></td>
			</tr>
			
			
			<td>Allergies</td>
			<td><?php echo $_SESSION['allergies']; ?></td>
			</tr>
			
			
			
			
			
			
			<tr>
			<td>Blood Type</td>
			<td><?php echo $_SESSION['bloodtype']; ?></td>
			
			<tr>
			<td>System Ailment Type</td>
			<td><?php echo $_SESSION['SAT']; ?></td>
			
			<tr>
			<td>Health Details</td>
			<td><?php echo $_SESSION['details']; ?></td>
			
			
		</table>
		 <input type = 'submit'  name = 'Save' value = 'Save' />
		<FRAMESET rows="30%" border="1">
      <FRAME src ="banner.html"/> 
	  
  </FRAMESET>

	
		
			
				
				
</div ><!--contentleft -->

<div id = "sidebar">
<div class = "sidebar-c">
<h3>Welcome to HealthCare</h3>
<p><h4>Health has launched a new health platform and sevice,to serve you even better. 
<p>Use your usual username and password to access your HealthCare accounts, pay bills,make appointments
<p>View investments and do account transfers.</h4>


				<h3>We provide the best health care solution</h3>
				
		<frameset cols="15%,15%,15%">
		 <frame <?php echo date("Y/m/d"); ?> >
		 <frame >
		</frameset>
				

</div>
<div class = "sidebar-c">
<h3>List of health problem  we take care of</h3>
<ul>
		<li><a href ="">Cardiovascular<a/></li>
		<li><a href ="">Digestive system<a/></li>
		<li><a href ="">Endocrine system<a/></li>
		<li><a href ="">Integumentary system<a/></li>
		<li><a href ="">Lymphatic system<a/></li>
		<li><a href ="">Muscular system<a/></li>
		<li><a href ="">Nervous system<a/></li>
		<li><a href ="">Reproductive system<a/></li>
		<li><a href ="">Respiratory system<a/></li>
	
	</ul>
	</div>
</div><!--sidebar-->






</div><!--content -->







</div><!--container-->

<div id = "footer">
<ul>
		<li><a href = 'homepage.html' >Home</li></a>
		<li><a href = 'homepage.html' >About us </li></a>
		<li><a href = 'homepage.html' >News</li></a>
		<li><a href = 'homepage.html' >Contact Us</li></a>
		
		<p><h4>Copyright © 2014 Healthcare Jamaica Ltd | Privacy Policy | Terms and Conditions| JBA Code of Banking Practice | FATCA FAQ</h4>
	
	</ul>
</div>

				<script src='http://code.jquery.com/jquery-1.12.1.min.js'></script>
				<script src='slider.js'></script>

</body>

</html>