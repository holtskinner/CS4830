<?php
header('Content-Type: application/json');

require 'flight/Flight.php';
//Using Flight PHP framework flightphp.com for REST

function link_database() {

	$host = "localhost";
	$username = "root";
	$password = "1234";
	$database = "challenge2";

	$database = new mysqli($host, $username, $password, $database);

	return $database;
}

//DELETE Everything
Flight::route('DELETE /index.php/Teams', function() {
	$database = link_database();

  $database->query("DELETE FROM team");
	$database->query("DELETE FROM players");
	$database->query("DELETE FROM stadium");

	$database->close();
});

//Add a Team
Flight::route('POST /index.php/Teams', function() {
	$database = link_database() or die ("Cannot Connect to Database");

  //JSON data from body
  $json = Flight::request()->data;

	$TeamName = $json["Name"];
	$City = $json["City"];

	echo $TeamName;
	echo $City;

  //Separate stadium sub-object out for simplicity
  $stadium = $json["stadium"];

	$Name = $stadium["Name"];
	$Capacity = $stadium["Capacity"];
	$TicketPrice = $stadium["TicketPrice"];

  //INSERT Team and stadium into database
  $database->query("INSERT INTO teams (Name, City) VALUES ('$TeamName', '$City')") or die ("Insert into teams");

	$database->query("INSERT INTO stadium (Name, Capacity, TicketPrice, TeamName) VALUES ('$Name', '$Capacity', '$TicketPrice', '$TeamName')") or die ("Insert into stadiums");

	$database->close();

});

// //Get all teams
// Flight::route('GET /index.php/Teams', function() {
// 	$database = link_database();
//
// 	$allTeams = $database->select("team", [
// 		// "[>]stadium" => ["team.Name" => "stadium.TeamName"]
// 		// "[>]player" => ["team.Name" => "player.TeamName"]
// 	],[
// 		"team.Name",
// 		"team.City"
//
// 		// "HomeStadium" => [
// 		// 	"stadium.Name",
// 		// 	"stadium.Capacity",
// 		// 	"stadium.TicketPrice"
// 		// ]
// 		// ,
// 		//
// 		// "Players" => [
// 		// 	"player.FirstName",
// 		// 	"player.LastName",
// 		// 	"player.Age",
// 		// 	"player.Salary"
// 		// ]
// ]);
//
// 	echo json_encode($allTeams);
//
// });
//
// //Update a team
// Flight::route('PUT /index.php/Teams', function() {
//
// 	$database = link_database();
// 	$json = Flight::request()->data;
// 	$stadium = $json["stadium"];
//
// 	//UPDATE Team and stadium in database
// 	$database->update("team",[
// 		"Name" => $json["Name"],
// 		"City" => $json["City"],
// 		"StadiumName" => $stadium["Name"]
// 	],[
// 		"Name" => $json["Name"]
// 	]);
//
// 	$database->update("stadium",[
// 		"Name" => $stadium["Name"],
// 		"Capacity" => $stadium["Capacity"],
// 		"TicketPrice" => $stadium["TicketPrice"]
// 	],[
// 		"Name" => $stadium["Name"]
// 	]);
// });
//
// //Get a particular team
// Flight::route('GET /index.php/Teams/@teamName', function($teamName) {
//
// 	$database = link_database();
//
// 	$team = $database->select("team", [
// 		"[>]stadium" => ["team.Name" => "stadium.TeamName"],
// 		"[>]player" => ["team.Name" => "player.TeamName"]
// 	],[
//
// 		"team.Name",
// 		"team.City",
//
// 		"HomeStadium" => [
// 			"stadium.Name",
// 			"stadium.Capacity",
// 			"stadium.TicketPrice"
// 		],
//
// 		"Players" => [
// 			"player.FirstName",
// 			"player.LastName",
// 			"player.Age",
// 			"player.Salary"
// 		]
// 	],[
// 		"team.Name" => $teamName
// 	]);
//
// 	echo json_encode($team);
//
// });
//
// //Add a Player to a Team
// Flight::route('POST /index.php/Teams/@teamName/Players', function($teamName) {
//
// 	$database = link_database();
// 	$json = Flight::request()->data;
//
// 	$database->insert("player",[
//     "teamName" => $teamName,
//     "FirstName" => $json["FirstName"],
// 		"LastName" => $json["LastName"],
// 		"Age" => $json["Age"],
// 		"Salary" => $json["Salary"]
//   ]);
//
// });
//
// //Get all players for A team
// Flight::route('GET /index.php/Teams/@teamName/Players', function($teamName) {
//
// 	$database = link_database();
//
// 	$players = $database->select("player", [
// 			"player.FirstName",
// 			"player.LastName",
// 			"player.Age",
// 			"player.Salary"
// ],[
// 	"player.teamName" => $teamName
// ]);
//
// 	echo json_encode($players);
//
// });
//
// //Get stadium for a team
// Flight::route('GET /index.php/Teams/@teamName/Stadium', function($teamName) {
// 	$database = link_database();
//
// 	$stadium = $database->select("stadium", [
// 			"stadium.Name",
// 			"stadium.Capacity",
// 			"stadium.Ticketprice"
// 	],[
// 			"stadium.teamName" => $teamName
// ]);
//
// 	echo json_encode($stadium);
//
// });

Flight::start();
?>
