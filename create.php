<?php
   include'config.php';
   error_reporting(0);
   session_start();
   if(isset($_SESSION['userneme'])){
      header("Location: index.php");
   }

   if(isset($_POST['submit'])){
   $firstneme = $_POST['first'];
   $lastneme = $_POST['last'];
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);

   if($password == $cpassword){
      $sql = "SELECT * FROM user WHERE username='$username'";
      $result = mysqli_query($con, $sql);
      if(!$result->num_rows > 0){
         $sql = "INSERT INTO user (firstname, lastname, username, password)
         VALUES ('$firstneme', '$lastneme', '$username', '$password')";
         $result = mysqli_query($con, $sql);
         if($result){
            echo "<script>alert('Your Account Successfully Created.')</script>";
            $firstneme = "";
            $lastneme = "";
            $username = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
         }else{
            echo "<script>alert('Woops! Sumthing Wrong When.')</script>";
         }
      }else{
         echo "<script>alert('Username Already Taken.')</script>"; 
      }
   }else{
      echo "<script>alert('Password Not Matched.')</script>";
   } 
   }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>signup</title>
   <link rel="stylesheet" href="style.css">
   <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }
      body {
         height: 100vh;
         width: 100vw;
         display: flex;
         justify-content: center;
         align-items: center;
         background: #24292E;
      }
      .contaner {
         position: absolute;
         width: 60vw;
         height: 60vh;
         background: #e2e2e2;
         border-radius: 10px;
         display: grid;
         grid-template-columns: repeat(40, 1fr);
         grid-template-rows: repeat(22, 1fr);
         box-shadow: 0 0 3vw #000000;
      }
      .contaner .up {
         grid-column: 6 / 36;
         grid-row: 2 / 4;
         color: #2819aa;
         font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
         text-align: center;
         font-size:  5vw;
      }
      .contaner input {
         padding: 10%;
         border-radius: 1.4vw;
         font-size: 2.2vw;
         outline: none;
         box-shadow: inset 0 0.1vw 0.8vw #00000077;
         border: solid 0.2vw #00000077;
      }
      .contaner .in1{
         grid-column: 6 / 20;
         grid-row: 5 / 7;
      }
      .contaner .in2 {
         grid-column: 21 / 36;
         grid-row: 5 / 7;
      }
      .contaner .in3 {
         grid-column: 6 / 36;
         grid-row: 8 / 10;
      }
      .contaner .in4 {
         grid-column: 6 / 36;
         grid-row: 11 / 13;
      }
      .contaner .in5 {
         grid-column: 6 / 36;
         grid-row: 14 / 16;
      }
      .contaner button {
         grid-column: 6 / 36;
         grid-row: 17 / 19;
         border-radius: 10vw;
         border: none;
         box-shadow: 0 0.3vw 1vw #000000;
         background: #2819aa;
         font-size: 3vw;
         color: #ffffff;
      }
      .contaner .next_page{
         grid-column: 6 / 36;
         grid-row: 20 / 22;
         font-size: 2vw;
         text-align: center;
         color: #000000;
      }
      .contaner .next_page a{
         color: #009fff;
         text-decoration: none;
      }
      @media(max-width: 360px){
         .contaner {
            width: 80vw;
            height: 55vh;
         }
         .contaner .up {
            font-size:  10vw;
         }
         .contaner input {
            padding: 15%;
            border-radius: 3vw;
            font-size: 4vw;
         }
         .contaner button {
            border-radius: 100vw;
            font-size: 5vw;
         }
         .contaner .next_page{
            font-size: 4vw;
         }
      }
      @media(min-width: 450px){
         .contaner {
            width: 60vw;
            height: 65vh;
         }
         .contaner .up {
         font-size:  5vw;
         }
         .contaner input {
            padding: 5%;
            border-radius: 1.4vw;
            font-size: 2.2vw;
         }
         .contaner button {
            border-radius: 100vw;
            font-size: 3vw;
         }
         .contaner .next_page{
            font-size: 2vw;
         }
      }
      @media (min-width: 700px){
         .contaner {
            width: 50vw;
            height: 60vh;
         }
         .contaner .up {
            font-size:  3vw;
         }
         .contaner input{
            border-radius: 1vw;
            font-size: 1.5vw;
            box-shadow: inset 0 0.1vw 0.8vw #00000033;
            border: solid 0.1vw #00000055;
         }
         .contaner .next_page {
            font-size: 1.2vw;
         }
         .contaner button {
            font-size: 1.6vw;
         }
      }
      @media(min-width: 1000px){
         .contaner {
            width: 35vw;
            height: 65vh;
         }
         .contaner .up {
            font-size:  2.5vw;
         }
         .contaner input{
            border-radius: 1vw;
            font-size: 1.2vw;
            box-shadow: inset 0 0.1vw 0.8vw #00000033;
            border: solid 0.1vw #00000055;
         }
         .contaner .next_page {
            font-size: 1.2vw;
         }
         .contaner button {
            font-size: 1.6vw;
         }
      }
      @media(min-width: 1300px){
         .contaner {
            width: 30vw;
            height: 70vh;
         }
         .contaner .up {
            font-size:  2vw;
         }
         .contaner input{
            border-radius: 0.5vw;
            font-size: 1vw;
            box-shadow: inset 0 0.1vw 0.5vw #00000033;
            border: solid 0.1vw #00000033;
         }
         .contaner button {
            font-size: 1vw;
         }
         .contaner .next_page {
            font-size: 0.9vw;
         }
      }
      </style>
</head>
<body>
   <form action="" method="POST" class="contaner">
      <p class="up">Sign Up</p>
      <input type="text" spellcheck="false" placeholder="First Name" name="first" class="in1" value="<?php echo $firstneme ?>" required>
      <input type="text" spellcheck="false" placeholder="Last Name" name="last" class="in2" value="<?php echo $lastneme ?>" required>
      <input type="username" spellcheck="false" placeholder="Username" name="username" class="in3" value="<?php echo $username ?>" required>
      <input type="password" placeholder="Password" name="password" class="in4" value="<?php echo $_POST['password'] ?>" required>
      <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword'] ?>" class="in5" required>
      <button name="submit" class="btn">Create Account</button>
      <p class="next_page">Have an account? <a href="index.php">Login account</a></p>
   </form>
   <script>
      document.querySelector('.in5').addEventListener("keyup", () => {
         if(document.querySelector('.in4').value != document.querySelector('.in5').value){
            document.querySelector('.in5').style.borderColor = '#ff0000';
         }else{
            document.querySelector('.in5').style.borderColor = '#00000055';
         }
      }) 
      document.querySelector('.in4').addEventListener("keyup", () => {
         if(document.querySelector('.in4').value == document.querySelector('.in5').value){
            document.querySelector('.in5').style.borderColor = '#00000055';
         }
      }) 
   </script>
</body>
</html>