<?php
/**********************************************************
 * File: viewScriptures.php
 * Author: Br. Burton
 *
 * Description: This file shows an example of how to query a
 *   PostgreSQL database from PHP.
 ***********************************************************/
require "dbConnect.php";
$db = get_db();

//var_dump($db);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Journal Me</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="jumbotron">
    <h1>Welcome to Journal||Me</h1>
    <p>Journey before destination</p>
</div>
<form class="inline-form">
    <div class="input-group">
        <input type="email" class="form-control" size="50" placeholder="email address" required>
        <div class="input-group-btn">
            <button class="btn btn-success">Get Started</button>
        </div>
    </div>
</form>
<div class="container-fluid">
    <h2>About JournalMe</h2>
    <p>We are family... Lorem ipsum....................</p>
    <button class="btn btn-default btn-lg">Contact us</button>
</div>
<div class="container-fluid grayback">
    <h2>Here is a list of Users: </h2>

    <?php

    $statement = $db->prepare("SELECT u.firstname, u.lastname, e.entrytext, to_char(e.entrydate, 'DD-MM-YYYY') as date from users u JOIN entries e USING(userid);");
    $statement->execute();
    // Go through each result
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $info) {
        echo '<p>';
        echo 'Name:'. $info['lastname'] . ', ' . $info['firstname'].'';
        echo '<br>'.'Date: '. $info['date'];
        echo '<br>' . $info['entrytext'];
        echo '</p>';
    }
    ?>
</div>
<div>





</div>

</body>
</html>