<?php 

 session_start();
 

 
 
 


if(isset($_POST['btn_submit']))
{	

	$error = array();
	$_SESSION['StreetAddress'] = $_POST['StreetAddress'];
	$_SESSION['addressline'] =  $_POST['addressline'];
	$_SESSION['city'] = $_POST['city'];
	$_SESSION['country'] = $_POST['country'];
	$_SESSION['email']=  $_POST['email'];
	$_SESSION['homephone'] =  $_POST['homephone'];
	$_SESSION['workphone'] =  $_POST['workphone'];
	$_SESSION['cellphone'] =  $_POST['cellphone'];
	

	
//validation

 if(empty($_POST['StreetAddress']))
	 {
		 
		$error['StreetAddress1']="Your address cannot be empty.";
		
	 }
	 
	 
	 if(strlen($_POST['StreetAddress']) < 2)
	 {
		  
		$error['StreetAddress2']="Your address should be more than 2 characters.";
	 }
	 
	 
	 
	 if(empty($_POST['city']))
	 {
		$error['city1']="Your city name should not be empty.";
	 }
		

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
		{
		
		}
		else
		{
			$error['email1']="Invalid Email address.</br>";
		}

		if(!preg_match("/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i",$_POST['homephone'])) 
{
    $error['homephone1']= "Please enter a valid phone number (Correct Format: 1-888-888-8888).</br>";
}

if(!preg_match("/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i",$_POST['workphone'])) 
{
    $error['workphone1']= "Please enter a valid phone number (Correct Format: 1-888-888-8888).</br>";
}


if(!preg_match("/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i",$_POST['cellphone'])) 
{
    $error['cellphone1']= "Please enter a valid phone number (Correct Format: 1-888-888-8888).</br>";
}

//validaion end


	if(count ($error)==0){
		
		$_SESSION['error']=0;
		header("location:medical.php");
		exit();
	}
	}

?>


<!doctype html>
<html>
<head>
<title>Contact</title>
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

		
	
		<form  method = "post" action ="contact.php" novalidate>
							<table border = '1px' s
							tyle = 'background-color:gray;' >
							<h2 style = ' color: blue; '> Mail</h2></br>
							
							<tr>
							<td>Street Address </td>
							<td><input type ='text' name = 'StreetAddress' placeholder = 'North St' title='Please enter Address' value="<?php if(isset($_SESSION['StreetAddress']))echo $_SESSION['StreetAddress']; ?>"  required>
							<p> <?php if(isset($error['StreetAddress1']))echo  $error['StreetAddress1']; ?> </p>
							<p> <?php if(isset($error['StreetAddress2']))echo  $error['StreetAddress2']; ?> </p>
							</td>
							</tr>
							
							<tr>
							<td>Address Line 2</td>
							<td><input type ='text' name = 'addressline' placeholder = 'West St' title='Please enter Address ' value="<?php if(isset($_SESSION['addressline']))echo $_SESSION['addressline']; ?>" required></td>
							
							</tr>
							
							<tr>
							<td>City</td>
							<td><input type ='text' name = 'city' placeholder = 'Please enter city name' value="<?php if(isset($_SESSION['city']))echo $_SESSION['city']; ?>" required>
							<p> <?php if(isset($error['city1']))echo  $error['city1']; ?> </p>
							</td>
							</tr>
							
							<tr>
							<td>Country</td>
							<td><select name ='country' value="<?php if(isset($_SESSION['country']))echo $_SESSION['country']; ?>">
								
													<option value = 'Jamaica'> Jamaica </option>
													<option value = 'Haiti'>Haiti </option>
													<option value = 'Trinidad Tobago'>Trinidad </option>
													<option value = 'Barbados'>Barbados</option>
													<option value = 'Bermuda'>Bermuda</option>
													<option value = 'Usa'>USA</option>
													<option value = 'Mexico'>Mexico</option>
													<option value = 'Cuba'>Cuba</option>
													<option value = 'england'>England</option>
													
													
							</td>
							</tr>
							
						
						</table>
						
						
						
			<table border = '1px' style = background-color:gray;' >
						<h2 style = ' color: blue; '> Communication</h2></br>
						<tr>
							<td>Email </td>
							<td><input type ='text' name = 'email' placeholder = 'Jonb&gmail.com' title='Please enter first name' value="<?php if(isset($_SESSION['email']))echo $_SESSION['email']; ?>" required>
							<p> <?php if(isset($error['email1']))echo  $error['email1']; ?> </p>
							</td>
							</tr>
						<tr>
							<td>Home Phone </td>
							<td><input type ='text' name = 'homephone' placeholder = '1-888-555-555' title='Please enter home phone number' value="<?php if(isset($_SESSION['homephone']))echo $_SESSION['homephone']; ?>" required>
							<p> <?php if(isset($error['homephone1']))echo  $error['homephone1']; ?> </p>
							</tr>
						<tr>
							<td>Work Phone </td>
							<td><input type ='text' name = 'workphone' placeholder = '1-888-555-555' title='Please enter work phone number' value="<?php if(isset($_SESSION['workphone']))echo $_SESSION['workphone']; ?>" required>
							<p> <?php if(isset($error['workphone1']))echo  $error['workphone1']; ?> </p>
							</tr>
						<tr>
							<td>Cell phone</td>
							<td><input type ='text' name = 'cellphone' placeholder = '1-888-555-555' title='Please enter cell phone number' value="<?php if(isset($_SESSION['cellphone']))echo $_SESSION['cellphone']; ?>" required>
							<p> <?php if(isset($error['cellphone1']))echo  $error['cellphone1']; ?> </p>
							</tr>
						<tr>
										<td>
										</td>
										<td>
											<input type = 'submit' name = 'btn_submit' value = 'Submit'/>
										</td>
									</tr>
		
		    </table>
		</form>
		
		
		
		

				
				
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
