
<?php

include_once('config.php');

$username = $_SESSION['username'];
$sql="SELECT * FROM signup WHERE username='$username'";
$getUser = $conn->prepare($sql);
$getUser->execute();
$id6 = $getUser->fetchAll();


$the_id = $id6[0][0];

$sql2="SELECT * FROM signup  WHERE id=".$the_id;
$getuser2 = $conn->prepare($sql2);
$getuser2->execute();
$user = $getuser2->fetchAll();


?>

<?php include_once('navbar.php')?>
    <style>
        .btn-light:hover{
            background-color: black;
            color:wheat;
            transition: 0.5s ease-in-out; 
            
        }
    </style>
</head>
<body>
    <div class="width">
        <h1>Update Profile Info</h1>
    <form  action="updatelogic.php" method="POST" style="margin: 20px;">
        
        
        <input type="text" id="fname" name="username" value="<?= $user[0]['username']?>" placeholder="name..." readonly> <br><br>
        
        <input type="text" id="lname" name="name" value="<?= $user[0]['name']?>" placeholder="last name..."><br><br>
        
        <input type="text" id="lnamse" name="email" value="<?= $user[0]['email']?>" placeholder="email..."><br><br>

        <input type="text" id="lnamse" name="password"  placeholder="change password..."><br><br>
        
<button type="submit" name="submit"  class="btn btn-light">Submit</button>

      </form>
    </di>
      <style>

</style>
<body>



</body>
</html>
      <style>
    input#file-input{
    display: none;
}
input#file-input + label{
    background-color: black;
    padding: 8px;
    color: #fff;
    border: 2px solid #000;
    border-radius: 9px;
    margin-left: 20px;
}
input#file-input + label:hover{
    background-color: white;
    border-color: black;
    color:black;
    cursor: pointer;
}
.width{
    width:700px;
    height:auto;
    position:absolute;
    left:20%;
}
.upload-profile{
    width:600px;
    height:auto;
    position:absolute;
    left:5%;
    border:1px solid #000
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
.avatar-wrapper{
	position: relative;
	height: 200px;
	width: 200px;
	margin: 50px auto;
	border-radius: 50%;
	overflow: hidden;
	box-shadow: 1px 1px 15px -5px black;
	transition: all .3s ease;
}
.avatar-wrapper:hover{
		transform: scale(1.05);
		cursor: pointer;
	}
.avatar-wrapper:hover .profile-pic{
		opacity: .5;
	}
	.profile-pic {
    height: 100%;
		width: 100%;
        transition: all .3s ease;
    }
		.profile-pic:after{
			font-family: FontAwesome;
			content: "\f007";
			top: 0; left: 0;
			width: 100%;
			height: 100%;
			position: absolute;
			font-size: 190px;
			background: #ecf0f1;
			color: #34495e;
			text-align: center;
		}
	}
	.upload-button {
		position: absolute;
		top: 0; left: 0;
		height: 100%;
        width: 100%;
    }
    .upload-button .fa-arrow-circle-up{
			position: absolute;
			font-size: 234px;
			top: -17px;
			left: 0;
			text-align: center;
			opacity: 0;
			transition: all .3s ease;
			color: #34495e;
		}
	.upload-bbutton:hover .fa-arrow-circle-up{
			opacity: .9;
		}
	}
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<h1>Uppload Pofile Image</h1>
<form method="Post" action="profileimglogic.php" enctype="multipart/form-data">

<div class="upload-profile">     
    <div class="avatar-wrapper">
	<img class="profile-pic" src="" />
	<div class="upload-button">
		<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
	</div>
	<input class="file-upload" type="file" name="image"/>
</div>
        <div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..." style="display:none;"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="submit">POST</button>
  	</div>
  </form>
 

  
</div>

  </form>
</div>

  
</div>
<script>

    $(document).ready(function() {
	
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
<div>
      <a href="dashboard.php" style="margin:20px; position:absolute;top:150%;" class="btn btn-warning">Go to dashboard</a>
</div>    
</body>
</html>
