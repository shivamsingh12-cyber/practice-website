<?php
$showError="false";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    include "headers/dbconnect.php";
    $email=$_POST['Email'];
    $pass=$_POST['Pass'];

    $sql="select * from users where user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if ($numRows==1) {
        $row=mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['user_pass'])) {
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['useremail']=$email;
                echo "you are logged in";
            } 
            header("location: /project/forum/index.php");
            
    }
    else{
        header("location: /project/forum/index.php");
    }
   
}
?>