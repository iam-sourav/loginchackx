<?php
   $server = "localhost";
   $user = "root";
   $pass = "";
   $database = "login_create";
   $con = mysqli_connect($server, $user, $pass, $database);
   if(!$con){
      echo "<script>alert('Connection Faild.')</script>";
   }
?>