<?include_once('config.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload PHP</title>
  <!-- Bootstrap CSS -->
</head>

 <?php

include_once('photouploadlogic.php');

$username = $_SESSION['username'];
$sqli = "SELECT id FROM signup WHERE username=:username";

$sqli = $conn->prepare($sqli);

$sqli->bindParam(':username', $username);

$sqli->execute();

$id2 = $sqli->fetch();
$result = mysqli_query($db, "SELECT * FROM images WHERE user_id = $id2[id]");
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='gallery'>";
      echo "<div class='gallery1' >";
      
      echo "<div id='imgscr' >";
          echo "<img src='userimages/".$row['image']."' >";
      
      echo "</div>";
      echo "</div>";
      echo "</div>";
    }
  ?>

<body>
  
<style>
.gallery{
  position:relative;
}
  
  .gallery1{
    
    margin:5px;
    border:1px solid #000;
    float:left;
    width:25.33%;
    height:200px;
  }
  div.gallery1 img{
    width:100%;
    height:200px;
  
  }
  </style>
</body>
<script src="javascript/index.js"></script>