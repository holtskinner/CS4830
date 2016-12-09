<?php
require  'medoo.php';

$database = new medoo([
  'database_type' => 'mysql',
  'database_name' => 'hackweek',
  'server' => 'localhost',
  'username' => 'root',
  'password' => 'password',
  'charset' => 'utf8'
]);

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET") {
  //selects all fortunes
  $data = $database->select("fortune", "fortune");

  if(isset($_GET["fortune"])) {
    //$databse->select returns an array. To simplify client, just send one randomly selected item from the size of the array
    echo $data[array_rand($data, 1)];
  } elseif (isset($_GET["allFortunes"])) {
    echo json_encode($data);
  }

  //just in case
  unset($_GET);
  unset($_SERVER['REQUEST_METHOD']);

} elseif (isset($_POST["fortune"])) {

  $database->insert("fortune", [
    "fortune" => htmlspecialchars($_POST["fortune"])//Gotta prevent XSS!
  ]);

  echo "Fortune Successfully Added";
  unset($_POST);
  unset($_SERVER['REQUEST_METHOD']);

} elseif ($method == "DELETE") {

  //Deletes all user created fortunes
  //Id greater than 12 (12 originals, autoincremented)
  $database->delete("fortune", [
    "id[>]" => 12
  ]);

  echo "Reverted to Default";
  unset($_SERVER['REQUEST_METHOD']);

} else {
  echo "I have no clue what you mean. :( Try again.";
  unset($_SERVER['REQUEST_METHOD']);
}
?>
