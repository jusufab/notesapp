<?php

	include_once('config.php');

	if(isset($_POST['submit']))
	
	{

		$username = $_POST['username'];

		$name = $_POST['name'];
		$email = $_POST['email'];

		$tempPass = $_POST['password'];
		$password = password_hash($tempPass, PASSWORD_DEFAULT);



		$tempConfirm = $_POST['confirm_password'];
		$confirm_password = password_hash($tempConfirm, PASSWORD_DEFAULT);


		if(empty($username))
		{
			echo "Nuk i ke plotesu te gjitha fushat.";
		}
		else
		{

			if($tempPass == $tempConfirm)
			{

				$sql = "INSERT INTO signup(username,name,email,password, confirm_password) VALUES ( :username,:name, :email, :password, :confirm_password)";

				$insertSql = $conn->prepare($sql);

				
				$insertSql->bindParam(':username', $username);
				$insertSql->bindParam(':name', $name);
				$insertSql->bindParam(':email', $email);
				$insertSql->bindParam(':password', $password);
				$insertSql->bindParam(':confirm_password', $confirm_password);

				$insertSql->execute();

				echo "Te dhenat jan shtuar me sukses...";
				header( "Location: index.php");


			}
			else
			{
				echo "Password doesn't match!!";
			}




		}



	}


?> 