<?php


$showError="false";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    include "headers/dbconnect.php";
    $user_email=$_POST['email'];
    $user_pass=$_POST['pass'];
    $cpass=$_POST['cpass'];

    $existsql="select * from users where user_email='$user_email'";
    $result=mysqli_query($conn, $existsql);
    $numRows=mysqli_num_rows($result);
    if ($numRows>0) {
        $showError="Email already in use";
        echo $showError;
    }
    else{
        if ($user_pass=$cpass) {
            $hash= password_hash($pass, PASSWORD_DEFAULT);
            $SQL="INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result=mysqli_query($conn, $SQL);
            if ($result) {
                $showAlert=true;
                header("Location: /project/forum/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError="Password do not match";
           
        }
    }
    header("Location: /project/forum/index.php?signupsuccess=false&error=$showError");
 
     
}

?>