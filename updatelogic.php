

<?php

include_once('config.php');

$username = $_SESSION['username'];
$sql="SELECT * FROM signup WHERE username='$username'";
$getUser = $conn->prepare($sql);
$getUser->execute();
$id8 = $getUser->fetchAll();


$the_id = $id8[0][0];

$sql2="SELECT * FROM signup  WHERE id=".$the_id;
$getuser2 = $conn->prepare($sql2);
$getuser2->execute();
$user = $getuser2->fetchAll();

if(isset($_POST['submit'])){


    
    $id = $_POST['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tempPass = $_POST['password'];
    $password = password_hash($tempPass, PASSWORD_DEFAULT);



    $tempConfirm = $_POST['confirm_password'];
    $confirm_password = password_hash($tempConfirm, PASSWORD_DEFAULT);

    $sql = "UPDATE signup SET   name = '$name' , email = '$email' , password = '$password'  WHERE id=$the_id";
    $sqlQuery = $conn->prepare($sql);

     


        
        $sqlQuery->execute();

        echo "Jan shtuar te dhenat me sukses. Bravo :)!";
        header('Location: index.php');
}

?>
