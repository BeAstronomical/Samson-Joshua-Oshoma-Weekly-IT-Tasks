<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

      $firstName = trim($_POST["firstName"]);
      $lastName = trim($_POST["lastName"]);
      $phoneNumber = trim($_POST["phoneNumber"]);
      $error = [];

      if(!$firstName){
        $error["firstName"] = "🛈 No first name entered.";}

      elseif (!preg_match("/^[A-Za-z]+( - [A-Za-z]+)?$/", $firstName)){
        $error["firstName"] = "🛈 Names can only contain letters, spaces, and a hypen.";
      }

      if(!$lastName){
        $error["lastName"] = "🛈 No last name entered.";}

      elseif (!preg_match("/^[A-Za-z]+( - [A-Za-z]+)?$/", $firstName)){
        $error["lastName"] = "🛈 Names can only contain letters, spaces, and a hypen.";
      }

      if(!$phoneNumber){
        $error["phoneNumber"] = "🛈 No number entered.";}

      elseif (!preg_match("/^[0-9]{11}$/", $phoneNumber)){
        $error["phoneNumber"] = "🛈 Numbers must be exactly 11 digits.";
      }

      if(!$error){
        $firstName = ucwords(strtolower($firstName));
        $lastName = ucwords(strtolower($lastName));
        header("Location: thanks.php");
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
      <span class="breakline">Can we have</span>
      <span class="breakline">your contact?</span>
    </h1>
    <form action="index.php" method="post">
      <div class="container">
        <label for="firstName"> First Name</label
        ><input type="text" id="firstName" name="firstName" />
        <p><?php
        if(isset($error["firstName"])){
          echo $error["firstName"];
        }
        ?></p>
      </div>
      <div class="container">
        <label for="lastName">Last Name</label
        ><input type="text" id="lastName" name="lastName" />
        <p><?php
        if(isset($error["lastName"])){
          echo $error["lastName"];
        }
        ?></p>
      </div>
      <div class="container">
        <label for="phoneNumber">Phone Number</label
        ><input type="tel" id="phoneNumber" name="phoneNumber" />
        <p><?php
        if(isset($error["phoneNumber"])){
          echo $error["phoneNumber"];
        }
        ?></p>
      </div>
      <button type="submit">Submit</button>
    </form>
  </body>
</html>

