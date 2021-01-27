<?php
  // Create database connection
  include_once('config.php');

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['post_notes'])) {
  	// Get image name
  	
  	// Get text
      $note =  $_POST['note'];
      
  	$title =  $_POST['head'];

  	// image file directory
	  $username = $_SESSION['username'];
	  $sqli = "SELECT id FROM signup WHERE username=:username";

	  $sqli = $conn->prepare($sqli);

	  $sqli->bindParam(':username', $username);

	  $sqli->execute();

      $id2 = $sqli->fetch();
	  $sql = "INSERT INTO notes(note, title, user_id) VALUES ('$note', '$title', '$id2[id]')";
  	
      // execute query
      $sqli = $conn->prepare($sql);

      $sqli->execute();
      header('Location:dashboard.php');
  	
  	
  }