<?php include_once('photouploadlogic.php')?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<body>
<style type="text/css">
body{
  width:100%;
  height:auto;
}
input#file-input{
    display: none;
}

input#file-input + label{
    background-color: lightgreen;
    padding: 8px;
    color: #fff;
    border: 2px solid #000;
    border-radius: 9px;
    margin-left: 20px;
}
input#file-input + label:hover{
    background-color:green ;
    border-color: red;
    cursor: pointer;
}
   #content{
   	width: 60%;
     margin: 20px auto;
     
	   
   }
  
   #imgscr{
     width:90%;
     height:250;
     padding:10px;

   	margin: 15px auto;

	   height:auto;
   }
   #img_div a{
    background-color: black;
    width:100px;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius:20px;
   }
   #img_div a:hover{
     background-color:white;
     color:black;
     border:1px solid #000;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
	   
       height:auto;
       cursor:pointer;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 100%;
   	height: 200px;
   }
   #post_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
	   
       height:auto;
       cursor:pointer;
   }
   #post_div a{
    background-color: black;
    width:100px;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius:20px;
   }
   #post_div a:hover{
     background-color:white;
     color:black;
     border:1px solid #000;
   }
   #h12 h1{
       background-color:#f5f1f0;
   }
   #h12 p{
     

    background-color:#f2f6f7;
    
   }
   #h12 {
     width:100%;
     height:auto;
   }



</style>

</head>
<body>
<div id="content">
  <?php

  include_once('postlogic.php');
  $username = $_SESSION['username'];
	  $sqli = "SELECT id FROM signup WHERE username=:username";

	  $sqli = $conn->prepare($sqli);

	  $sqli->bindParam(':username', $username);

	  $sqli->execute();

      $id = $sqli->fetch();
      
  $resultt = mysqli_query($db, "SELECT * FROM notes WHERE user_id = $id[id]");
    while ($row = mysqli_fetch_array($resultt)) {
	  echo "<div id='post_div' >";
      echo "<div id='h12' >";
      
      echo "<a href='profile.php'><i class='fa fa-user-o'></i> $_SESSION[username]</a>";
      	echo "<h1>".$row['title']."'</h1 >";
      	echo "<p>".$row['note']."</p>";
      echo "</div>";
     echo' <div class="container">';
   echo'  <button class="like__btn animated">';
    echo'<i class="like__icon fa fa-heart"></i>';
   echo' <span class="like__number">0</span>';
  echo'</button>';

  echo "</div>";

	  echo "</div>";
    }
    ?>
    <script>
    $('.like__btn').on('click', function(){
  // Check if it's already been clicked
  if (!$(this).hasClass('like__btn--disabled')) {
    // Update the number
    updated_likes = parseInt($('.like__btn span').html()) + 1;
    $('.like__btn span').html(updated_likes);
   }
  // Make btn disabled
  $(this).attr('disabled', true).addClass('tada');
});
    </script>

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
            echo "<div id='center'>";
          echo "<div id='img_div' >";
          
          echo "<a href='profile.php'><i class='fa fa-user-o'></i> $_SESSION[username]</a>";
          echo "<div id='imgscr' >";
              echo "<img src='userimages/".$row['image']."' >";
          
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      ?>
</div>
</body>
</html>
  
  
