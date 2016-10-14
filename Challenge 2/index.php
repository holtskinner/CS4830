<?php
header('Content-Type: application/json');

require 'flight/Flight.php';
//Using Flight PHP framework flightphp.com for REST
//http://flightphp.com/
require 'medoo.php';
//Using Medoo.php framework with MySQL for database interactions
//medoo.in

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
    "teamName" => $json["Name"],
    "city" => $json["City"],
		"stadiumName" => $stadium["Name"]
  ]);

  $database->insert("stadium",[
    "stadiumName" => $stadium["Name"],
    "capacity" => $stadium["Capacity"],
    "ticketprice" => $stadium["TicketPrice"]
  ]);

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

//Get all teams
Flight::route('GET /index.php/Teams', function() {
	$database = link_database();

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

	//Formatting array output becuase PHP...
	$allTeams = $allTeams[0];
	//var_dump($allTeams);
	$stadiumArray = array(
		"Capacity" => $allTeams["homeStadium"]["capacity"],
		"Name" => $allTeams["homeStadium"]["stadiumName"],
		"TicketPrice" => $allTeams["homeStadium"]["ticketprice"]
	);

	$playersArray = array(
		"FirstName" => $allTeams["players"]["fname"],
		"LastName" => $allTeams["players"]["lname"],
		"Age" => $allTeams["players"]["age"],
		"Salary" => $allTeams["players"]["salary"],
	);

	$output = array(array(
		"Name" => $allTeams["teamName"],
		"City" => $allTeams["city"],
		"stadium" => $stadiumArray,
		"players" => $playersArray
	));

	echo json_encode($output);

});

//Update a team
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
		"stadiumName" => $stadium["Name"]
	]);

});

//Get a particular team
Flight::route('GET /index.php/Teams/@teamName', function($teamName) {
	$database = link_database();

	$team = $database->select("team", [
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
],[
	"teamName" => $teamName
]);

	echo json_encode($team);

});

//Add a Player to a Team
Flight::route('POST /index.php/Teams/@teamName/Players', function($teamName) {

	$database = link_database();
	$json = Flight::request()->data;

	$database->insert("player",[
    "teamName" => $teamName,
    "fname" => $json["FirstName"],
		"lname" => $json["LastName"],
		"age" => $json["Age"],
		"salary" => $json["Salary"]
  ]);

});

//Get all players for A team
Flight::route('GET /index.php/Teams/@teamName/Players', function($teamName) {
	$database = link_database();

	$players = $database->select("player", [
			"player.fname",
			"player.lname",
			"player.age",
			"player.salary"
],[
	"teamName" => $teamName
]);

	echo json_encode($players);

});

//Get stadium for a team
Flight::route('GET /index.php/Teams/@teamName/Stadium', function($teamName) {
	$database = link_database();

	$stadium = $database->select("team", [
		"[>]stadium" => "stadiumName"
	],[
			"stadium.stadiumName",
			"stadium.capacity",
			"stadium.ticketprice"
	],[
			"teamName" => $teamName
]);
	echo json_encode($stadium);
});

Flight::start();
?>
