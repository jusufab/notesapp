<?php 
	include_once('config.php'); 

	if(empty($_SESSION['username']))
	{
		header('Location: login.php');
	}

?>

<?php include_once('navbar.php')?>

	<style>

		form>input {
		    margin-bottom: 10px;
		    font-size: 20px;
		    padding: 5px;
		}

		button {
		    background: none;
		    border: none;
		    border: 1px solid black;
		    padding: 10px 40px;
		    font-size: 20px;
		    cursor: pointer;
		}
	</style>
</head>
<body>
	
	

<a href="update.php" style="margin:20px;" class="btn btn-warning">Go to updte</a>
      
	

</body>
</html>