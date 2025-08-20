<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

      $username = trim($_POST["username"]);
      $password = trim($_POST["password"]);
      $error = [];

      if(!$username){
        $error["username"] = "🛈 No username entered.";}

      elseif (!preg_match("/^[A-Za-z0-9]+$/", $username)){
        $error["username"] = "🛈 Username should only contain numbers or letters.";
      }

      if(!$password){
        $error["password"] = "🛈 No password entered.";}

      elseif (strlen($password) < 6){
        $error["password"] = "🛈 Password must contain at least 6 characters.";
      }

      if(!$error){
        $_SESSION ["logged_in"] = true;
        $_SESSION ["username"] = $username;
        $_SESSION ["password"] = $password;
        header("Location: dashboard.php");
      }


}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Samson Joshua Oshoma Week 3 Task</title>
    <meta name="author" content="Samson Joshua Oshoma" />
    <meta
    name="description"
    content="A contact form with client-side validation"
    <!-- content="A contact form with PHP form processing" -->
    />
    <link rel="stylesheet" href="form.css" />
    <!-- <script src="form.js" defer></script> -->
  </head>
  <body>
    <h1>
      <span class="breakline">Log into your</span>
      <span class="breakline">Pacific Account?</span>
    </h1>
    <form action="login.php" method="post">
      <div class="container">
        <label for="username"> Username</label
        ><input type="text" id="username" name="username" />
        <p><?php
        if(isset($error["username"])){
          echo $error["username"];
        }
        ?></p>
      </div>
      <div class="container">
        <label for="password">Password</label
        ><input type="text" id="password" name="password" />
        <p><?php
        if(isset($error["password"])){
          echo $error["password"];
        }
        ?></p>
      </div>
      <button type="submit">Submit</button>
    </form>
  </body>
</html>

