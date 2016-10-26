<?php
  session_start();
    //Redirect to homepage if form hasnt been submitted correctly
    // function failure() {
    //   $_SESSION["fail"] = 1;
    //   header("Location: index.php");
    // }
    //
    // if (!isset($_POST)) {
    //   failure();
    // } elseif (!isset($_GET)) {
    //   failure();
    // } elseif (!isset($_COOKIES["Age"])) {
    //   failure();
    // } elseif (!isset($_SESSION["Phone"])) {
    //   failure();
    // } else {
      ?>
      <!DOCTYPE html>
      <html>

      <head>
          <!-- Materialize by Google for fancy styles! -->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    // } //End Else
 ?>
