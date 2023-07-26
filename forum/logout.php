<?php
session_start();
echo "logging out.. Please wait";
session_destroy();
header("location: /index.php");
?>