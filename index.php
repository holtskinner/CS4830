<?php
require 'flight/Flight.php';

Flight::route('/index.php', function(){
    echo 'Hello world!';
});

Flight::route('/index.php/hey', function(){
    echo 'Hey world!';
});


Flight::start();
?>
