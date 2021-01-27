<?php 


// include_once('config.php');
require 'config.php';

if(isset($_POST['submit']))
{
	$error = "";


	$username = $_POST['username'];
	$password = $_POST['password'];


	if(empty($username) || empty($password))
	{
		
	 	echo "Ploteso krejt!";
	}
	else
	{

		$sql = "SELECT  username, name, password FROM signup WHERE username=:username";

		$insertSql = $conn->prepare($sql);

		$insertSql->bindParam(':username', $username);

		$insertSql->execute();


		$data = $insertSql->fetch();



		if($data == false)
		{
			echo "<script> alert('Hello! I am an alert box!!)$username '</script>";
		}
		else
		{
			if(password_verify($password, $data['password']))
			{

				$_SESSION['username'] = $data['username'];
				$_SESSION['password'] = $data['password'];
				
				header('Location:dashboard.php');
			}
			else
			{
				echo "Password not match!";
			}
		}




	}

}
	
?>