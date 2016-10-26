<?php
  session_start();
  
  //Redirect to homepage if form hasnt been submitted
  public function failure() {
    $_SESSION["fail"] = 1;
    header("Location: index.php");
  }

  //Check for each value
  if (!isset($_POST["first-name"])) {
    failure();
  } elseif (!isset($_POST["last-name"])) {
    failure();
  } elseif (!isset($_POST["birthdate"])) {
    failure();
  } elseif (!isset($_POST["age"])) {
    failure();
  } elseif (!isset($_POST["city"])) {
    failure();
  } elseif (!isset($_POST["state"])) {
    failure();
  } elseif (!isset($_POST["telephone"])) {
    failure();
  } else {

  }



?>
