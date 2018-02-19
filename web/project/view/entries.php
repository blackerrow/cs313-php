<!DOCTYPE html>
<html>
<head>
    <title>Journal Me</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include '../modules/navigation.php';
?>
<div class="jumbotron intro">
    <h2><?php echo $_SESSION['clientData']['firstname'];  ?>'s journal entries</h2>
</div>


<?php

    $entries = getEntries($userId);
    foreach ($entries as $entry) {
        echo '<div class="panel panel-default">';
        echo '<div class="panel-heading">';
        echo '<h3><span> Title: <strong>' . $entry['entrytitle'] . '</strong></span>';
        echo '<span> Date: <strong>' . $entry['date'] . '</strong></span>';
        echo '</h3>';
        echo ' </div>';
        echo ' <div class="panel-body">';
        echo '<p>' . $entry['entrytext'] . '</p>';
        echo ' </div></div>';
        echo  "<a class='btn btn-primary' href = '/cs313php/project/accounts/?action=editEntry&id=$entry[entryid]'>edit</a> | ";
        echo "<a class='btn btn-danger' href = '/cs313php/project/accounts/?action=editEntry&id=$entry[entryid]'>delete</a>";
    }

?>

</body>
</html>
