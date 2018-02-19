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
    <h2>Add a New Journal Entry</h2>
</div>


<form class="inline-form" action ="/cs313php/project/accounts/" method="post" enctype="multipart/form-data" name="SignInNotifaction">

    <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" size="50" placeholder="ex: BEST DAY EVER!" required>
    <label for="text">Entry Text:</label>
    <textarea class = "form-control" name="text" id="textInput"></textarea>
        <div class="input-group-btn">
            <input type="submit"  value="Add Entry" class="btn btn-default">
            <input type="hidden" name = "action" value="addEntry">

        </div>
</form>

</body>
</html>
