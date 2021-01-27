<?php 
	include_once('config.php'); 

	if(empty($_SESSION['username']))
	{
		header('Location: index.php');
	}

?>


<?php include_once('navbar.php')?>


<body>
<div class="head">

<div class="or-seperator">
<div class="dropdown">
<button><i class="fas fa-camera"></i></button>

  <div class="dropdown-content">
  <form method="Post" action=dashboard.php enctype="multipart/form-data">

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
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
 

  
</div>

  </form>
</div>
  
</div>
<div class="or-seperator">
<div class="dropdown">
<button><i class="fas fa-comment-medical"></i></button>

  <div class="dropdown-content">
  <div class="post-form">
    <h6 id="header-form1">Write New Post or Upload a Image</h6>
    <div class="post-form2">
    <form method="POST" action="postlogic.php" enctype="multipart/form-data">
  	<input type="text" name="head" style="width: 100%;height: 35px;" placeholder="Title" >
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="note" 
      	placeholder="What's on your mind?"></textarea>
	  </div>
	  
  	<div>
  		<button type="submit" id="post-notes-button" name="post_notes">POST</button>
  	</div>
  </form>
 

  
</div>

  </form>
</div>
  
</div>

</div>


</div>
<div class="head2">


 

<?php include_once('photodisplay.php')?>





</div>

<style>
	.head{
		width:100%;
		height:200px;
		
	}
	.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  left:50%;
  top:10%;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.or-seperator {
        margin-top: 32px;
		text-align: center;
		border-top: 1px solid #e0e0e0;
    }
    .or-seperator button{
		color: #666;
        padding: 0 8px;
		width: 100px;
		height: 30px;
		font-size: 13px;
		text-align: center;
		line-height: 26px;
		background: #fff;
		display: inline-block;
		border: 1px solid #e0e0e0;
		
		position: relative;
		top: -15px;
		z-index: 1;
        text-decoration:none;
    }
    .or-seperator button:hover{
        background-color:black;
        color:white;

    }

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdownn-content {
  display: none;
  position: absolute;
  left:50%;
  top:10%;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdownn:hover .dropdown-content {
  display: block;
}

.avatar-wrapper{
	position: relative;
	height: 100px;
	width: 300px;
	margin: 50px auto;
	overflow: hidden;
	box-shadow: 1px 1px 15px -5px black;
	transition: all .3s ease;
}
.buton button{
	position:absolute;
	left:50%;
	width:100px;
	background-color:white;
}
.buttoncenter button{


	width:100px;
	
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
	


	
	</style>
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
</script>	<script>


</script>



</body>

