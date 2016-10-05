<?php
require 'flight/Flight.php';
//
// class Team {
//   public $City;
//   public $Name;
//   public $HomeStadium;
//   public $Players = [];
//
//   function Team($City, $Name, $HomeStadium) {
//     $this->$City = $City;
//     $this->$Name = $Name;
//     $this->$HomeStadium = $HomeStadium;
//     array_push($this->$Players, $Player);
//   }
//
// }
//
// class Player {
//   var $FirstName;
//   var $LastName;
//   var $Age;
//   var $Salary;
//
//   function Player($FirstName, $LastName, $Age, $Salary) {
//     $this->$FirstName = $FirstName;
//     $this->$LastName = $LastName;
//     $this->$Age = $Age;
//     $this->$Salary = $Salary;
//   }
// }
//
// class Stadium {
//   var $Name;
//   var $Capacity;
//   var $TicketPrice;
//
//   function Stadium($Name, $Capacity, $TicketPrice) {
//     $this->$Name = $Name;
//     $this->$Capacity = $Capacity;
//     $this->$TicketPrice = $TicketPrice;
//   }
// }

Flight::route('DELETE /index.php/Teams', function(){
  if (isset($Teams)) {
    unset($Teams);
  }
});

Flight::route('GET /index.php/Teams', function() {
  echo "Get";
});

Flight::route('POST /Teams', function() {
  //Create New array if one doesn't exist
  //JSON data
  //$id = Flight::request()->data->id;
  if(!isset($Teams)) {
    $Teams = [];
  }

  array_push($Teams, )
  echo 'Post';
});

Flight::start();

echo 'hello';
?>
