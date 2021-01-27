<?php 
	include_once('config.php'); 

	if(empty($_SESSION['username']))
	{
		header('Location: index.php');
	}

?>
<?php include_once('navbar.php')?>

<div>
<header>

<div class="container">

	<div class="profile">

		<div class="profile-image">
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
     
		echo "<img src='userimages/".$row['profile_img']."' >";
      
    }
  ?>



		</div>

		<div class="profile-user-settings">

			<h1 class="profile-user-name"> <?php echo $_SESSION['username']; ?> </h1>

			<a href='update.php' class="btn profile-edit-btn">Edit Profile</a>

			<button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>

		</div>

		<div class="profile-stats">

			<ul>
				<li><span class="profile-stat-count">0</span> posts</li>
				<li><span class="profile-stat-count">0</span> followers</li>
				<li><span class="profile-stat-count">0</span> following</li>
			</ul>

		</div>

		<div class="profile-bio">
</p>

		</div>

	</div>
	<!-- End of profile section -->

</div>
<!-- End of container -->

</header>

<main>

<div class="or-seperator"><a href="profile.php">IMAGES</a><a href="#">Notes</a></div>
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



 
<!-- End of container -->


	<!-- End of container -->

</main>
<style>
	/*

All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 310). 
        
The 'supports' rule will only run if your browser supports CSS grid.

Flexbox and floats are used as a fallback so that browsers which don't support grid will still recieve a similar layout.

*/

/* Base Styles */

:root {
    font-size: 10px;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

body {
    font-family: "Open Sans", Arial, sans-serif;
    min-height: 100vh;
    background-color: #fafafa;
    color: #262626;
    padding-bottom: 3rem;
}
.or-seperator {
        margin-top: 32px;
		text-align: center;
		border-top: 1px solid #e0e0e0;
    }
    .or-seperator a{
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
    .or-seperator a:hover{
        background-color:black;
        color:white;

    }
    .galleryy{
        text-align:center;
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


img {
    display: block;
}


.container {
    max-width: 93.5rem;
    margin: 0 auto;
    padding: 0 2rem;
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
   	width: 60%;
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
       text-align:center;
       background-color:#f5f1f0;
   }
   #h12 p{
     
    text-align:center;
    background-color:#f2f6f7;
    
   }
   #h12 {
     width:100%;
     height:auto;
   }



.btn {
    display: inline-block;
    font: inherit;
    background: none;
    border: none;
    color: inherit;
    padding: 0;
    cursor: pointer;
}

.btn:focus {
    outline: 0.5rem auto #4d90fe;
}

.visually-hidden {
    position: absolute !important;
    height: 1px;
    width: 1px;
    overflow: hidden;
    clip: rect(1px, 1px, 1px, 1px);
}

/* Profile Section */

.profile {
    padding: 5rem 0;
}

.profile::after {
    content: "";
    display: block;
    clear: both;
}

.profile-image {
    float: left;
    width: calc(33.333% - 1rem);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 3rem;
}

.profile-image img {
    width:150px;
    height:150px;
    border-radius: 50%;
}

.profile-user-settings,
.profile-stats,
.profile-bio {
    float: left;
    width: calc(66.666% - 2rem);
}

.profile-user-settings {
    margin-top: 1.1rem;
}

.profile-user-name {
    display: inline-block;
    font-size: 3.2rem;
    font-weight: 300;
}

.profile-edit-btn {
    font-size: 1.4rem;
    line-height: 1.8;
    border: 0.1rem solid #dbdbdb;
    border-radius: 0.3rem;
    padding: 0 2.4rem;
    margin-left: 2rem;
}

.profile-settings-btn {
    font-size: 2rem;
    margin-left: 1rem;
}

.profile-stats {
    margin-top: 2.3rem;
}

.profile-stats li {
    display: inline-block;
    font-size: 1.6rem;
    line-height: 1.5;
    margin-right: 4rem;
    cursor: pointer;
}

.profile-stats li:last-of-type {
    margin-right: 0;
}

.profile-bio {
    font-size: 1.6rem;
    font-weight: 400;
    line-height: 1.5;
    margin-top: 2.3rem;
}

.profile-real-name,
.profile-stat-count,
.profile-edit-btn {
    font-weight: 600;
}



/* Media Query */

@media screen and (max-width: 40rem) {
    .profile {
        display: flex;
        flex-wrap: wrap;
        padding: 4rem 0;
    }

    .profile::after {
        display: none;
    }

    .profile-image,
    .profile-user-settings,
    .profile-bio,
    .profile-stats {
        float: none;
        width: auto;
    }

    .profile-image img {
        width: 7.7rem;
    }

    .profile-user-settings {
        flex-basis: calc(100% - 10.7rem);
        display: flex;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .profile-user-name {
        font-size: 2.2rem;
    }

    .profile-edit-btn {
        order: 1;
        padding: 0;
        text-align: center;
        margin-top: 1rem;
    }

    .profile-edit-btn {
        margin-left: 0;
    }

    .profile-bio {
        font-size: 1.4rem;
        margin-top: 1.5rem;
    }

    .profile-edit-btn,
    .profile-bio,
    .profile-stats {
        flex-basis: 100%;
    }

    .profile-stats {
        order: 1;
        margin-top: 1.5rem;
    }

    .profile-stats ul {
        display: flex;
        text-align: center;
        padding: 1.2rem 0;
        border-top: 0.1rem solid #dadada;
        border-bottom: 0.1rem solid #dadada;
    }

    .profile-stats li {
        font-size: 1.4rem;
        flex: 1;
        margin: 0;
    }

    .profile-stat-count {
        display: block;
    }
}


/* Spinner Animation */

@keyframes loader {
    to {
        transform: rotate(360deg);
    }
}

/*

The following code will only run if your browser supports CSS grid.

Remove or comment-out the code block below to see how the browser will fall-back to flexbox & floated styling. 

*/

@supports (display: grid) {
    .profile {
        display: grid;
        grid-template-columns: 1fr 2fr;
        grid-template-rows: repeat(3, auto);
        grid-column-gap: 3rem;
        align-items: center;
    }

    .profile-image {
        grid-row: 1 / -1;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
        grid-gap: 2rem;
    }

    .profile-image,
    .profile-user-settings,
    .profile-stats,
    .profile-bio,
    .gallery-item,
    .gallery {
        width: auto;
        margin: 0;
    }

    @media (max-width: 40rem) {
        .profile {
            grid-template-columns: auto 1fr;
            grid-row-gap: 1.5rem;
        }

        .profile-image {
            grid-row: 1 / 2;
        }

        .profile-user-settings {
            display: grid;
            grid-template-columns: auto 1fr;
            grid-gap: 1rem;
        }

        .profile-edit-btn,
        .profile-stats,
        .profile-bio {
            grid-column: 1 / -1;
        }

        .profile-user-settings,
        .profile-edit-btn,
        .profile-settings-btn,
        .profile-bio,
        .profile-stats {
            margin: 0;
        }
    }
}

	</style>
</div>
	