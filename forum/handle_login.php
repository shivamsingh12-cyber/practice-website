<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    include "partials/dbconnect.php";
    $email=$_POST['Email'];
    $pass=$_POST['Pass'];
    $showError="false";
    $sql="select * from users where user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if ($numRows==1) {
        $row=mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['user_pass'])) {
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['sno'];
                $_SESSION['useremail']=$email;
                //echo "you are logged in";
                header("location: /index.php?loginsuccess=true");
                exit();
            } 
        
    }
    else{
        $showError="User_id_is_not_available";
    }
    header("location: /index.php?loginsuccess='false'&error=$showError");
   
}
?>