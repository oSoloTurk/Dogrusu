<?php 

require_once("vendor/autoload.php");

$client = new MongoDB\Client(
  'mongodb+srv://dogrusu:123456a@indeed.mu1ze.mongodb.net/indeed?retryWrites=true&w=majority');

$db = $client->app;

?>