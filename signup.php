<?php 
session_start();

	include("db_connect.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		
		$password = $_POST['password'];
        $aadhar_id=$_POST['aadhar_id'];
		$dob=$_POST['dob'];
		$name=$_POST['name'];
	 
		if(!empty($password) && !empty($aadhar_id) && !empty($name))
		{

			//save to database
			//$user_id = random_num(20);
			$query = "insert into voters (name,dob,aadhar_id,password) values ('$name','$dob','$aadhar_id','$password')";

			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<label>Enter Voter's Name</label><br>
			<input id="text" type="text" name="name"><br><br>
			<label>Enter Your aadhar number</label><br>
			<input id="text" type="text" name="aadhar_id"><br><br>
			<label>Enter Your date of birth</label><br>
			<input id="text" type="date" name="dob"><br><br>
			<label>Enter your password(UID_last 4 digits of aadhar no.)</label><br>
            <input id="text" type="password" name="password"><br><br> 
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
