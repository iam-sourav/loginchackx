<?php
   include'config.php';
   session_start();
   error_reporting(0);

   if(isset($_SESSION['userneme'])){
      header("Location: welcome.php");
   }

   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $sql = "SELECT * FROM user WHERE username='$username'";
      $result = mysqli_query($con, $sql);
      $connect = mysqli_num_rows($result);

      if($connect){ 
         $row = mysqli_fetch_assoc($result);;
         if($row['password'] == $password){
            $_SESSION['firstname'] = $row['firstname']; 
            header("Location: welcome.php");
         }else{
            echo "<script>alert('Password Incorrect.')</script>";
         }
      }else{
         echo "<script>alert('Invalid Username.')</script>";
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
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #24292E;
      }
      .contaner {
      position: relative;
      width: 60vw;
      height: 40vh;
      background: #e2e2e2;
      border-radius: 10px;
      display: grid;
      grid-template-columns: repeat(10, 1fr);
      grid-template-rows: repeat(15, 1fr);
      box-shadow: 0 0 3vw #000000;
      }
      .contaner .up {
      grid-column: 2 / 10;
      grid-row: 2 / 4;
      color: #2819aa;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      text-align: center;
      font-size:  5vw;
      }
      .contaner input {
         padding: 5%;
         border-radius: 1.4vw;
         font-size: 2.2vw;
         outline: none;
         box-shadow: inset 0 0.1vw 0.8vw #00000077;
         border: solid 0.2vw #00000077;
      }
      .contaner .in1{
         grid-column: 2 / 10;
         grid-row: 5 / 7;
      }
      .contaner .in2 {
      grid-column: 2 / 10;
      grid-row: 8 / 10;
      }
      .contaner button {
         grid-column: 2 / 10;
         grid-row: 11 / 13;
         border-radius: 10vw;
         border: none;
         box-shadow: 0 0.3vw 1vw #000000;
         background: #2819aa;
         font-size: 3vw;
         color: #ffffff;
      }
      .contaner .next_page{
         grid-column: 2 / 10;
         grid-row: 14 / 15;
         font-size: 2vw;
         text-align: center;
         color: #000000;
      }
      .contaner .next_page a{
         color: #009fff;
         text-decoration: none;
      }
      @media all and (min-width: 550px){
         .contaner {
            width: 60vw;
            height: 45vh;
         }
      }
      @media all and (min-width: 700px){
         .contaner {
            width: 50vw;
            height: 45vh;
         }
         .contaner .up {
            font-size:  4vw;
         }
         .contaner input{
            border-radius: 1vw;
            font-size: 1.5vw;
            box-shadow: inset 0 0.1vw 0.8vw #00000033;
            border: solid 0.1vw #00000055;
         }
         .contaner .next_page {
            font-size: 1.5vw;
         }
         .contaner button {
            font-size: 1.9vw;
         }
      }
      @media all and (min-width: 1000px){
         .contaner {
            width: 35vw;
            height: 50vh;
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
      @media all and (min-width: 1300px){
         .contaner {
            width: 30vw;
            height: 50vh;
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
      <p class="up">Login</p>
      <input type="username" spellcheck="false" placeholder="Username" name="username" value="<?php echo $username ?>" class="in1" required>
      <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password'] ?>" class="in2" required>
      <button name="submit">Submit</button>
      <p class="next_page">Don't Have an account? <a href="create.php"> create account</a></p>
   </form>
</body>
</html>