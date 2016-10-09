<?php
ini_set('display_errors','On');
error_reporting(E_ALL | E_STRICT);

require 'flight/Flight.php';
//Using Flight PHP framework flightphp.com for REST
require 'medoo.php';
//Using Medoo.php framework with MySQL for database interactions

function link_database() {
	//Create link to database
	$database = new medoo([
		'database_type' => 'mysql',
		'database_name' => 'challenge2',
		'server' => 'localhost',
		'username' => 'root',
		'password' => '1234',
		'charset' => 'utf8'
	]);
	return $database;
}


//DELETE Everything
Flight::route('DELETE /index.php/Teams', function() {
	$database = link_database();

  $database->delete("team", []);
	$database->delete("player", []);
	$database->delete("stadium", []);
});

Flight::route('POST /index.php/Teams', function() {
	$database = link_database();

  //JSON data from body
  $json = Flight::request()->data;

  //Separate stadium sub-object out for simplicity
  $stadium = $json["stadium"];

  //INSERT Team and stadium into database
  $database->insert("team",[
    "teamName" => $json["Name"],
    "city" => $json["City"],
		"stadiumName" => $stadium["Name"]
  ]);

  $database->insert("stadium",[
    "stadiumName" => $stadium["Name"],
    "capacity" => $stadium["Capacity"],
    "ticketprice" => $stadium["TicketPrice"]
  ]);

});

Flight::route('GET /index.php/Teams', function() {
	$database = link_database();
	//Working!
	$allTeams = $database->select("team", [
		"[>]stadium" => "stadiumName",
		"[>]player" => "teamName"
	],[

		"team.teamName",
		"team.city",

		"homeStadium" => [
			"stadium.stadiumName",
			"stadium.capacity",
			"stadium.ticketprice"
		],

		"players" => [
			"player.fname",
			"player.lname",
			"player.age",
			"player.salary"
		]
]);

	echo json_encode($allTeams);

});

Flight::route('PUT /index.php/Teams', function() {

	$database = link_database();
	$json = Flight::request()->data;
	$stadium = $json["stadium"];

	//UPDATE Team and stadium in database
	$database->update("team",[
		"teamName" => $json["Name"],
		"city" => $json["City"],
		"stadiumName" => $stadium["Name"]
	],[
		"teamName" => $json["Name"]
	]);

	$database->update("stadium",[
		"stadiumName" => $stadium["Name"],
		"capacity" => $stadium["Capacity"],
		"ticketprice" => $stadium["TicketPrice"]
	],[
		"stadiumName[>]" => $stadium["Name"]
	]);

});

Flight::route('GET /index.php/Teams/@teamName', function($teamName) {
	echo $teamName;
});

Flight::start();
?>
