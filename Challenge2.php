<?php
    //Which verb is being used?
    switch ($_SERVER['REQUEST_METHOD']) {

      case 'GET':

        if(isset($_GET['filename'])) {
          $file_content = file_get_contents($_GET['filename']);
        } else {
          die("ERROR: INVALID PARAMETER");
        }

        break;

      case 'POST':
        if(isset($_POST['filename'])) {

        } else {
          die("ERROR: INVALID PARAMETER");
        }
        break;

      case 'DELETE':

        break;

      case 'PUT':
        if(isset($_PUT['filename'])) {
          $file_content = file_put_contents($_PUT['filename']);
        } else {
          die("ERROR: INVALID PARAMETER");
        }
        break;

      default:

        break;
    }

 ?>
