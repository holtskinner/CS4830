<?php
  session_start();
    //Redirect to homepage if form hasnt been submitted correctly
    function failure() {
      header("Location: index.php");
    }

    if (!isset($_GET["FirstName"])) {
      failure();
    } elseif (!isset($_GET["LastName"])) {
      failure();
    } elseif (!isset($_POST["city"])) {
      failure();
    } elseif (!isset($_POST["state"])) {
      failure();
    } elseif (!isset($_COOKIE["Age"])) {
      failure();
    } elseif (!isset($_SESSION["Phone"])) {
      failure();
    } else {
      ?>
      <!DOCTYPE html>
      <html>
      <head>
          <?php include_once "materialize.php" ?>
        </head>
      <body>
          <div class="container">
            <h1 class="center-align">Challenge 3</h1>
                <table class="striped">
                  <tbody>
                    <tr>
                      <td>First Name</td>
                      <td> <?php echo $_GET["FirstName"]; ?> </td>
                    </tr>
                    <tr>
                      <td>Last Name</td>
                      <td> <?php echo $_GET["LastName"]; ?> </td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td> <?php echo $_POST["city"]; ?> </td>
                    </tr>
                    <tr>
                      <td>State</td>
                      <td> <?php echo $_POST["state"]; ?> </td>
                    </tr>
                    <tr>
                      <td>Age</td>
                      <td> <?php echo $_COOKIE["Age"]; ?> </td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td> <?php echo $_SESSION["Phone"]; ?> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </body>
            </html>
      <?php
    } //End Else
 ?>
