<?php
$client = new MongoDB\Client(
    'mongodb+srv://m001-student:<password>@sandbox.mu1ze.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');
$db = $client->test;

?>