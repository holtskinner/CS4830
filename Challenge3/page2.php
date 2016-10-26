<?php
  //Redirect to homepage if form hasnt been submitted
  if (!isset($_POST["first-name"])) {
    header("Location: index.php");
  }

?>
