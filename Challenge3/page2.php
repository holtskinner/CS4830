<?php
  session_start();

  //Allows transmitting of POST Variables to next page
  header('HTTP/1.1 307 Temporary Redirect');

  //Redirect to homepage if form hasnt been submitted correctly
  function failure() {
    header("Location: index.php");
  }

  //Check for each value
  if (!isset($_POST["first-name"])) {
    failure();
  } elseif (!isset($_POST["last-name"])) {
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

    setcookie("Age", $_POST["age"]);
    //Place phone number in session array
    $_SESSION["Phone"] = $_POST["telephone"];

    //Redirect to final page with query string
    header("Location: final.php?FirstName=".$_POST["first-name"]."&LastName=".$_POST["last-name"]);
}
?>
