<?php

  class Team {
    public $City;
    public $Name;
    public $HomeStadium;
    public $Players = array();

    function Team($City, $Name, $HomeStadium, $Player) {
      $this->$City = $City;
      $this->$Name = $Name;
      $this->$HomeStadium = $HomeStadium;
      array_push($this->$Players, $Player);
    }

  }

  class Player {
    var $FirstName;
    var $LastName;
    var $Age;
    var $Salary;

    function Player($FirstName, $LastName, $Age, $Salary) {
      $this->$FirstName = $FirstName;
      $this->$LastName = $LastName;
      $this->$Age = $Age;
      $this->$Salary = $Salary;
    }
  }

  class Stadium {
    var $Name;
    var $Capacity;
    var $TicketPrice;

    function Stadium($Name, $Capacity, $TicketPrice) {
      $this->$Name = $Name;
      $this->$Capacity = $Capacity;
      $this->$TicketPrice = $TicketPrice;
    }
  }

    //Which verb is being used?
    switch ($_SERVER['REQUEST_METHOD']) {

      case 'GET':

        if (isset($_GET['Teams']) {
          $response = json_encode($Teams);
          echo $response;
        }
        elseif (isset($_GET['TeamName'])) {
          $TeamName = $_GET['TeamName'];
          $response = json_encode($Teams[$TeamName]);
          echo $response;
        }
        elseif (isset($_GET['Players'])) {
          $Players = $Teams[$TeamName];
        }

        else {
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
      //Delete All teams butunsetting array of teams
        unset($Teams);
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
