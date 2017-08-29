<?php 
 session_start();
 
 
 
 
if(isset($_POST['btn_submit']))
{
	$error = array();
	
	$_SESSION['height']=  $_POST['height'];
	$_SESSION['weight'] =  $_POST['weight'];
	$_SESSION['age'] =  $_POST['age'];
	$_SESSION['allergies'] =  $_POST['allergies'];
	$_SESSION['bloodtype'] =  $_POST['bloodtype'];
	$_SESSION['SAT'] =  $_POST['SAT'];
	$_SESSION['details'] =  $_POST['details'];
	
	
	if(count ($error)==0){
		
		header("location:final.php");
		exit();
	}
	
}
?>


<!doctype html>
<html>
<head>
<title>medical</title>
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

	
<?php
		
		
				
				echo "
		<form action ='' method = 'POST'>
			<table border = '1px' style ='background-color:gray;' >
			<h2 style = 'Times New Roman color: blue; '> Fill out The field</h2>
			
			<tr>
			<td>Height</td>
			<td><input type ='number' name = 'height' title='Please enter height' required>cm
			</tr>
			
			<tr>
			<td>Weight</td>
			<td><input type ='number' name = 'weight' placeholder = '' title='Please enter weight' required>kg
			</tr>
			
			<tr>
			<td>Age</td>
			<td><input type ='number' name = 'age' placeholder = '' title='Please enter age' required
			</tr>
			
			<tr>
			<td>Allergies</td>
			<td><select name = 'allergies'>
						<option value = 'Unknown'>Unknown</option>
						<option value = 'Food'>Food </option>
						<option value = 'Medication'>Medication </option>
			</td>
			</tr>
			
			
			
			
			<tr>
			<td>Blood Type</td>
			<td><select name ='bloodtype'>
				
									<option value = '0'> O </option>
									<option value = '0+'>O+ </option>
									<option value = 'A-'>A- </option>
									<option value = 'A+'>A+ </option>
									<option value = 'B-'>B- </option>
									<option value = 'B+'>B+ </option>
									<option value = 'AB-'> AB- </option>
									<option value = 'AB+'>AB+ </option>
								
			</td>
			
			
			</tr>
			
			<tr>
			<td>System Ailment Type</td>
			
			<td>
			
			<input type ='checkbox' id='p1' name = 'SAT' value = 'none'> None</br>
			
			
			
			<input type ='checkbox'id='p2' name = 'SAT' value = 'Cardiovascular' > Cardiovascular</br>
			
			
			
			<input type ='checkbox' id='p3' name = 'SAT' value = 'Digestive system'> Digestive system</br>
			
			
			
			<input type ='checkbox' id='p4' name = 'SAT' value = 'Endocrine system'>Endocrine system</br>
			
			
			<input type ='checkbox' id='p4' name = 'SAT' value = 'Integumentary system/'>Integumentary system/ Exocrine system</br>
			
			
			<input type ='checkbox' id='p4' name = 'SAT' value = 'Lymphatic system '>Lymphatic system / Immune system</br>
			
			
			
			<input type ='checkbox' id='p5' name = 'SAT' value = 'Muscular system'>Muscular system/Skeletal system</br>
			
			
			
			<input type ='checkbox' id='p6' name = 'SAT' value = 'Nervous system'> Nervous system</br>
			
			
			
			<input type ='checkbox' id='p7' name = 'SAT' value = 'Renal system'> Renal system / Urinary system</br>
			
			
			<input type ='checkbox' id='p8' name = 'SAT' value = 'Reproductive system'> Reproductive system</br>
			
			
			<input type ='checkbox' id='p9' name = 'SAT' value = 'Respiratory system'> Respiratory system</br>
			<td>
			
			</tr>
			<tr>
			<td>Health Details</td>
			<td><textarea name='details' row='20' cols='50'>
			</textarea>
			</td>
			
			</tr>
			
						<tr>
						<td>
							<input type = 'submit' name = 'btn_submit' value = 'Submit'/>
						</td>
					</tr>
			
		
		</table>
		</form>
		";
			?>
		

				
				
</div ><!--contentleft -->

<div id = "sidebar">
<div class = "sidebar-c">
<h3>Welcome to HealthCare</h3>
<p><h4>Health has launched a new health platform and sevice,to serve you even better. 
<p>Use your usual username and password to access your HealthCare accounts, pay bills,make appointments
<p>View investments and do account transfers.</h4>


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
