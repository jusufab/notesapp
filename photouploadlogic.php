<?include_once('config.php');?>
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "noteapp");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "userimages/".basename($image);
	  $username = $_SESSION['username'];
	  $sqli = "SELECT id FROM signup WHERE username=:username";

	  $sqli = $conn->prepare($sqli);

	  $sqli->bindParam(':username', $username);

	  $sqli->execute();

      $id2 = $sqli->fetch();
	  $sql = "INSERT INTO images (image, text, user_id) VALUES ('$image', '$image_text', '$id2[id]')";
  	

	  // execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		 
		  
  	}else{
  		$msg = "Failed to upload image";
  	}
  };

  ?>


  