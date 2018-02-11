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
    <title>Scripture List</title>
</head>

<body>
<div>

    <h1>Here is a list of Users: </h1>

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

</body>
</html>