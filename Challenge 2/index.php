<?php
header('Content-Type: application/json');

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

//Add a Team
Flight::route('POST /index.php/Teams', function() {
	$database = link_database();

  //JSON data from body
  $json = Flight::request()->data;

  //Separate stadium sub-object out for simplicity
  $stadium = $json["stadium"];

  //INSERT Team and stadium into database
  $database->insert("team",[
    "Name" => $json["Name"],
    "City" => $json["City"]
  ]);

  $database->insert("stadium",[
    "Name" => $stadium["Name"],
    "Capacity" => $stadium["Capacity"],
    "TicketPrice" => $stadium["TicketPrice"],
		"TeamName" => $json["Name"]
  ]);
});

//Get all teams
Flight::route('GET /index.php/Teams', function() {
	$database = link_database();

	$allTeams = $database->select("team", [
		// "[>]stadium" => ["team.Name" => "stadium.TeamName"]
		// "[>]player" => ["team.Name" => "player.TeamName"]
	],[
		"team.Name",
		"team.City"

		// "HomeStadium" => [
		// 	"stadium.Name",
		// 	"stadium.Capacity",
		// 	"stadium.TicketPrice"
		// ]
		// ,
		//
		// "Players" => [
		// 	"player.FirstName",
		// 	"player.LastName",
		// 	"player.Age",
		// 	"player.Salary"
		// ]
]);

	echo json_encode($allTeams);

});

//Update a team
Flight::route('PUT /index.php/Teams', function() {

	$database = link_database();
	$json = Flight::request()->data;
	$stadium = $json["stadium"];

	//UPDATE Team and stadium in database
	$database->update("team",[
		"Name" => $json["Name"],
		"City" => $json["City"],
		"StadiumName" => $stadium["Name"]
	],[
		"Name" => $json["Name"]
	]);

	$database->update("stadium",[
		"Name" => $stadium["Name"],
		"Capacity" => $stadium["Capacity"],
		"TicketPrice" => $stadium["TicketPrice"]
	],[
		"Name" => $stadium["Name"]
	]);
});

//Get a particular team
Flight::route('GET /index.php/Teams/@teamName', function($teamName) {

	$database = link_database();

	$team = $database->select("team", [
		"[>]stadium" => ["team.Name" => "stadium.TeamName"],
		"[>]player" => ["team.Name" => "player.TeamName"]
	],[

		"team.Name",
		"team.City",

		"HomeStadium" => [
			"stadium.Name",
			"stadium.Capacity",
			"stadium.TicketPrice"
		],

		"Players" => [
			"player.FirstName",
			"player.LastName",
			"player.Age",
			"player.Salary"
		]
	],[
		"team.Name" => $teamName
	]);

	echo json_encode($team);

});

//Add a Player to a Team
Flight::route('POST /index.php/Teams/@teamName/Players', function($teamName) {

	$database = link_database();
	$json = Flight::request()->data;

	$database->insert("player",[
    "teamName" => $teamName,
    "FirstName" => $json["FirstName"],
		"LastName" => $json["LastName"],
		"Age" => $json["Age"],
		"Salary" => $json["Salary"]
  ]);

});

//Get all players for A team
Flight::route('GET /index.php/Teams/@teamName/Players', function($teamName) {

	$database = link_database();

	$players = $database->select("player", [
			"player.FirstName",
			"player.LastName",
			"player.Age",
			"player.Salary"
],[
	"player.teamName" => $teamName
]);

	echo json_encode($players);

});

//Get stadium for a team
Flight::route('GET /index.php/Teams/@teamName/Stadium', function($teamName) {
	$database = link_database();

	$stadium = $database->select("stadium", [
			"stadium.Name",
			"stadium.Capacity",
			"stadium.Ticketprice"
	],[
			"stadium.teamName" => $teamName
]);

	echo json_encode($stadium);

});

Flight::start();
?>
