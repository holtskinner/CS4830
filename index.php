<?php
require 'flight/Flight.php';

class Team {
  public $City;
  public $Name;
  public $HomeStadium;
  public $Players = [];

  function Team($City, $Name, $StadiumName, $Capacity, $Price) {
    $this->City = $City;
    $this->Name = $Name;
    $this->HomeStadium = new Stadium($StadiumName, $Capacity, $Price);
  }

  function addPlayer($TeamName, $Player) {
    array_push($Teams[$TeamName]->$Players, $Player);
  }

}

class Player {
  public $FirstName;
  public $LastName;
  public $Age;
  public $Salary;

  function Player($FirstName, $LastName, $Age, $Salary) {
    $this->FirstName = $FirstName;
    $this->LastName = $LastName;
    $this->Age = $Age;
    $this->Salary = $Salary;
  }
}

class Stadium {
  public $Name;
  public $Capacity;
  public $TicketPrice;

  function Stadium($Name, $Capacity, $TicketPrice) {
    $this->Name = $Name;
    $this->Capacity = $Capacity;
    $this->TicketPrice = $TicketPrice;
  }
}
//TODO FIX ALL OF THIS BY CREATING A DATABASE OR SOMETHING
Flight::route('POST /index.php/Teams', function() {
  //Create New array if one doesn't exist
  if(!isset($Teams)) {
    $Teams = [];
  }

  //JSON data from body
  $json = Flight::request()->data;

  //Separate stadium sub object out for simplicity
  $stadium = $json["stadium"];

  //Create new Team Object
  $team = new Team($json->City, $json->Name, $stadium["Name"], $stadium["Capacity"], $stadium["TicketPrice"]);

  //Check if Team already exits
  if(!array_key_exists($team->Name, $Teams)) {
    $Teams[$team->Name] = $team;
  }

});

Flight::route('GET /index.php/Teams', function() {
  echo json_encode($Teams);
});

Flight::route('DELETE /index.php/Teams', function(){
  if (isset($Teams)) {
    unset($Teams);
  }
});

Flight::route('PUT /index.php/Teams'), function(){
  Team
}

Flight::start();
?>
