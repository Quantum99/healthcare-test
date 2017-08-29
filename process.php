<?php
	session_start();
	if(isset($_POST['Addbutton'])){
		
	$name= $_POST['name'];
	$password= $_POST['password'];
	//$image= $_POST['image'];
	$qualification= $_POST['qualification'];
	$dob= $_POST['dob'];
	$user=$_SESSION['user'];
	//$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	//$image =base64_encode($image);

	
	
	
	if ($_POST['user']== 'admin'){
	addadmin($name,$password,$image,$qualification,$dob);
	}
	else if ($_POST['user']== 'nurse'){
	addnurse($name,$password,$image,$qualification,$dob);
	}
	else if ($_POST['user']== 'doctor'){
	adddoc($name,$password,$image,$qualification,$dob);
	
	}
	if($user=='admin'){
		header('Location:adminpage.php');
	}
	else if($user=='doctor'){
	header('Location:nursepage.php');
	}
	}
	
	//////////////////set appointment
	if(isset($_POST['app'])){
		$date=$_POST['date'];
		$time =$_POST['time'];
		$docid=$_POST['doctor'];
		$pid=$_POST['patient'];
		$nurseid=$_SESSION['id'];
					
		addapp($date,$time,$docid,$pid,$nurseid);
		
			header('Location:nursepage.php');
		
		
		
	}
	////////////////////////////////appointment
	function addapp($date,$time,$docid,$pid,$nurseid){
			
		
	
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database");
		
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	else
	{
		
		$query_ins = "INSERT INTO appointment (date,time,DocID,NurseID,pid) VALUES (\"$date\", \"$time\",\"$docid\",\"$nurseid\",\"$pid\")";
		mysqli_query($con, $query_ins);
	
		
		mysqli_close($con);
		
	}
	
	
	}
	
	///////////validation for password
	if(isset($_POST['btn_submit'])){
		$error =0;
		$name= $_POST['name'];
		$password= $_POST['password'];
		
		
	if(empty($_POST['name']))
	 {
	$error =1;
	    echo" Your name cannot be empty </br>";
	 }
	 if(strlen($_POST['name']) < 2)
	 {
		  
		echo "Your firstname should be more than 2 characters.";
	 }
	 
	 
	 
	 
	 if($error ==1){
		$_SESSION['error']=$error;
		// header('Location:Signin.php');
		
		echo "</br></br> <a href = \"Signin.php\">Go back </a>";
	 }
	 if($error==0){
	
		if ($_POST['type']== 'admin'){
	Adminval($name,$password);
		}
	else if ($_POST['type']== 'doctor'){
		 Doctorval($name,$password);
	}
	else if ($_POST['type']== 'nurse'){
		Nurseval($name,$password);
	}
	else if ($_POST['type']== 'patient'){
		 patientval($name,$password);
	}
	
	
	 }
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
 
	function addadmin($name,$password,$image,$qualification,$dob){
		
		
	
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database");
		
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	else
	{
		
		$query_ins = "INSERT INTO admin (name,password,image,qualification,dob) VALUES (\"$name\", \"$password\",\"$image\",\"$qualification\",\"$dob\")";
		mysqli_query($con, $query_ins);
	
		
		mysqli_close($con);
		
	}
	
	}
	
	function adddoc($name,$password,$image,$qualification,$dob){
		
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database");
		
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	else
	{
		$query_ins = "INSERT INTO doctor (name,password,image,qualification,dob) VALUES (\"$name\", \"$password\",\"$image\",\"$qualification\",\"$dob\")";
		mysqli_query($con, $query_ins);
		mysqli_close($con);
		
	}
		
	}
	
	function addnurse($name,$password,$image,$qualification,$dob){
		
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database");
		
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	else
	{
		$query_ins = "INSERT INTO nurse (name,password,image,qualification,dob) VALUES (\"$name\", \"$password\",\"$image\",\"$qualification\",\"$dob\")";
		mysqli_query($con, $query_ins);
		mysqli_close($con);
		
	}
		
	}
	
	
	
	
	
	
	
	// Retrieve data from database
	function Adminval($name2,$password2){
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
				$id= '';
				$name= '';
				$password= '';
				$image= '';
				$qualification= '';
				$dob= '';
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query = "SELECT * FROM `admin` WHERE `name`= '$name2' and `password` = '$password2' ";
		//run query
	$result = mysqli_query($con, $query);
		while($rows = mysqli_fetch_array($result))
		{		
	
				$id= $rows[0];
				$name= $rows[1];
				$password= $rows[2];
				$image= $rows[3];
				$qualification= $rows[4];
				$dob= $rows[4];
				
		}
		
		
	if ($name == $name2 && $password == $password2){
		
					$_SESSION['user']= 'admin';
				$_SESSION['id']= $id;
				$_SESSION['name']= $name;
				$_SESSION['password']= $password;
				$_SESSION['image']= $image;
				$_SESSION['qualification']= $qualification;
				$_SESSION['dob']= $dob;
		
			
		header('Location:adminpage.php');
			
		}else{
			
		header('Location:Signin.php');
		
		}
			
		
		
		mysqli_free_result($result);

	
	 mysqli_close($con);
	}
		
		
	// Retrieve data from database
	
	//////////////////////////////////////////////////////////////////////////////

		function Doctorval($name2,$password2){
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
				$id= '';
				$name= '';
				$password= '';
				$image= '';
				$qualification= '';
				$dob= '';
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query = "SELECT * FROM `doctor` WHERE `name`= '$name2' and `password` = '$password2' ";
		//run query
	$result = mysqli_query($con, $query);
		while($rows = mysqli_fetch_array($result))
		{		
	
				$id= $rows[0];
				$name= $rows[1];
				$password= $rows[2];
				$image= $rows[3];
				$qualification= $rows[4];
				$dob= $rows[4];
		}
	if ($name == $name2 && $password == $password2){
		
					$_SESSION['user']= 'doctor';
				$_SESSION['id']= $id;
				$_SESSION['name']= $name;
				$_SESSION['password']= $password;
				$_SESSION['image']= $image;
				$_SESSION['qualification']= $qualification;
				$_SESSION['dob']= $dob;
		echo $_SESSION['name'].' '.$_SESSION['password'];
			
		header('Location:docpage.php');
			
		}else{
			
		header('Location:Signin.php');
	
		}
			
		
		
		mysqli_free_result($result);

	
	 mysqli_close($con);
	}
	
	
	///////////////////////////////////////////////////////////////////////////////////////////
	
	function Nurseval($name2,$password2){
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
				$id= '';
				$name= '';
				$password= '';
				$image= '';
				$qualification= '';
				$dob= '';
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query = "SELECT * FROM `nurse` WHERE `name`= '$name2' and `password` = '$password2' ";
		//run query
	$result = mysqli_query($con, $query);
		while($rows = mysqli_fetch_array($result))
		{		
	
				$id= $rows[0];
				$name= $rows[1];
				$password= $rows[2];
				$image= $rows[3];
				$qualification= $rows[4];
				$dob= $rows[4];
		}
	if ($name == $name2 && $password == $password2){
		
				$_SESSION['user']= 'nurse';
				$_SESSION['id']= $id;
				$_SESSION['name']= $name;
				$_SESSION['password']= $password;
				$_SESSION['image']= $image;
				$_SESSION['qualification']= $qualification;
				$_SESSION['dob']= $dob;
		echo $_SESSION['name'].' '.$_SESSION['password'];
			
		header('Location:nursepage.php');
			
		}else{
			
		header('Location:Signin.php');
	
		}
			
		
		
		mysqli_free_result($result);

	
	 mysqli_close($con);
	}
	////////////////////////////////////////////////////////////////////////////////////
	
	function patientval($name2,$password2){
		$con = mysqli_connect("localhost", "root", "password", "healthcare_database"); // host, username, password, database
	
	//check if error to connect to database
	if(mysqli_error($con))
	{
		die("There was an error in connecting to database");
	}
	
	$query = "SELECT * FROM `patient` WHERE `firstname`= '$name2' and `password` = '$password2' ";
		//run query
	$result = mysqli_query($con, $query);
		while($rows = mysqli_fetch_array($result))
		{		
	
		$id= $rows[0];
		$name= $rows[1];
		$ln=$rows[2] ;
		$gen= $rows[3] ;
		$dob= $rows[4];
		$st= $rows[5];
		$ad= $rows[6];
		$city= $rows[7];
		$em= $rows[8];
		$hom= $rows[9];
		$work= $rows[10];
		$cell= $rows[11];
		$height= $rows[12];
		$weight= $rows[13];
		$age= $rows[14];
		$all= $rows[15];
		$blo= $rows[16];
		$SAT= $rows[17];
		$det= $rows[18];
		$country= $rows[19];
		$pass= $rows[20];
		}
	if ($name == $name2 && $pass == $password2){
		
		// need to change
		$_SESSION['fname']=$name;
		$_SESSION['lname']=$ln ;
		$_SESSION['gender']=$gen ;
		$_SESSION['dob']=$dob;
		$_SESSION['StreetAddress']=$st;
		$_SESSION['addressline']=$ad;
		$_SESSION['city'] =$city;
		$_SESSION['country']=$country ;
		$_SESSION['email']=$em;
		$_SESSION['homephone']=$hom;
		$_SESSION['cellphone']=$cell;
		$_SESSION['workphone']=$work;
		$_SESSION['height']=$height;
		$_SESSION['weight']=$weight;
		$_SESSION['age']=$age;
		$_SESSION['allergies']=$all;
		$_SESSION['bloodtype']=$blo;
		$_SESSION['SAT']=$SAT;
		$_SESSION['details']=$det;
		$_SESSION['password']=$pass;
		
		//echo $_SESSION['name'].' '.$_SESSION['password'];
			
	header('Location:patient.php');
			
		}else{
			
	header('Location:Signin.php');
	
		}
			
		
		
		mysqli_free_result($result);

	
	 mysqli_close($con);
	}
	
	
	
	
	
	
	
	
		//echo "</br></br> <a href = \"adminpage.php\">Go back to form</a>";
		
	
	
	


	

	
?>