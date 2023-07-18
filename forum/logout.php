<?php
session_start();
echo "logging out.. Please wait";
session_destroy();
header("location: /project/forum/index.php");
?>