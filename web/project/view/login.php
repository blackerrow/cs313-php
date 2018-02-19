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

<div class="jumbotron">
    <h1>Welcome to Journal||Me</h1>
    <p>Journey before destination</p>
</div>

<form class="inline-form" action ="/cs313php/project/accounts/index.php?action=Login" method="post" enctype="multipart/form-data" name="SignInNotifaction">
    <div class="input-group">
        <input type="email" name="clientEmail" class="form-control" size="50" placeholder="email address" required>
        <input type="password" class="form-control" size="50" placeholder="password" required>
        <div class="input-group-btn">
            <input type="submit" name="action" value="Login" class="btn btn-success">

        </div>
    </div>
</form>
