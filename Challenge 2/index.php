<?php
// ini_set('display_errors','On');
// error_reporting(E_ALL | E_STRICT);

require 'flight/Flight.php';
//Using Flight PHP framework flightphp.com for REST
require 'medoo.php';
//Using Medoo.php framework with MySQL for database interactions

//Create link to database
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => 'challenge2',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '1234',
	'charset' => 'utf8'
]);

//DELETE ALL Teams
Flight::route('DELETE /index.php/Teams', function($database) {
  $database->delete("team", "*");
});

Flight::route('POST /index.php/Teams', function() {

  //JSON data from body
  $json = Flight::request()->data;
  var_dump($json);
  //Separate stadium sub-object out for simplicity
  $stadium = $json["stadium"];

  //INSERT Team and stadium into database
  $database->insert("team",[
    "name" => $json->Name,
    "city" => $json->City
  ]);

  $database->insert("stadium",[
    "name" => $stadium["Name"],
    "capacity" => $stadium["Capacity"],
    "ticketprice" => $stadium["TicketPrice"]
  ]);
});

Flight::route('GET /index.php/Teams', function($database) {
  echo "Get";
});

Flight::route('PUT /index.php/Teams', function($database) {
  echo "PUT";
});

Flight::start();
?>
