<?php
	
	$conn=new mysqli("localhost","root","","patient");
	if($conn->connect_error)
	{
		die();
	}
	else
	{ 
		$uid=$_POST['userid'];
		$password=$_POST['password'];
		$sql="SELECT * FROM login WHERE userid='$uid' AND password='$password'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			echo "logged in successfully";
		}
		else
		{
			echo "oops!! Enter the user id and password";
		}
	}
 ?>