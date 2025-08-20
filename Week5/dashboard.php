<?php
session_start();

if(!$_SESSION['logged_in']){
    header("Location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_destroy();
    header("Location: login.php");
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
    <h1>Hello, <?php echo $_SESSION['username'];?>!</h1>
    <form action="dashboard.php" method="post"><button type="submit" name="button" value="clicked">Log out</button>
    </form>
  </body>
</html>