<?php
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	$difficulty=$_POST['difficulty'];
	$phno=$_POST['number'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$conn=new mysqli("localhost","root","","patient");
	if($conn->connect_error)
	{
		die();
	}
	else
	{ 
		$uq= "SELECT * from signin order by ID desc limit 1";
		$result=mysqli_query($conn,$uq);
		$row= mysqli_fetch_array($result);
		$last= $row["username"];
		if($last == ' ')
		{
			$p="PA1";
		}
		else
		{
			$p=substr($last, 2);
			$p=intval($p);
			$p="PA".($p+1);
		}
		$sql= "INSERT INTO signin (fname, lname, height, weight, difficulty, phno, emailid, password, username) VALUES ('$fname','$lname','$height','$weight','$difficulty','$phno','$email','$password', '$p')";
		$ssql= "INSERT INTO login (userid, password) VALUES('$p', '$password')";
		if($conn->query($sql)===TRUE && $conn->query($ssql)===TRUE )
		{
			echo "Record has been inserted";
		}
		else
		{
			echo "Not able to insert";
			echo $conn->error;
		}
	}
	/*
	$num='91'.$phno;
	$meg = "Thanks for selecting our platform.\nUserid:".$p."\nPassword:".$password."\n";
	$apiKey = urlencode('NmU1YTcwMzI3NjU5Mzk0YzQ4NTU2ZDc0NzAzMDZkNGE=');
	
	
	$numbers = array($num);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($meg);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;*/
?>