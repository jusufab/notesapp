<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
  #center{
      position:absolute;
      left:20%;
      top:20%;
  }
  .img {
  width: 60%;
  color: white;
  height: 100%;
  background: black;
  opacity: .7;
  height: 210px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}
.img {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  
  cursor: pointer;
}

#img{ height: 210px; width: 60%; margin: 0px auto; border-radius: 50%; }
   img {
  border-radius: 50%;
}
</style>
</head>
<body>
<?php

$db = mysqli_connect("localhost", "root", "", "noteapp");

$username = $_SESSION['username'];
$sqli = "SELECT id FROM signup WHERE username=:username";

$sqli = $conn->prepare($sqli);

$sqli->bindParam(':username', $username);

$sqli->execute();

$id2 = $sqli->fetch();
$result = mysqli_query($db, "SELECT * FROM profile_img WHERE user_id = $id2[id]");
    while ($row = mysqli_fetch_array($result)) {
        echo "<div id='center'>";
	  echo "<div id='img_div' >";
	  echo "<div id='imgscr' >";
      	echo "<img src='profileimages/".$row['profile_img']."' >";
      
	  echo "</div>";
      echo "</div>";
      echo "</div>";
    }
  ?>