<!DOCTYPE html>

<html>
    <head>
        <title>Week 3 Form: Submission</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        Welcome, <?php echo $_POST["name"];?> <br>
        Your email address is <?php echo $_POST["email"];?>
        <br>Your major is <?php echo $_POST["major"];?>
        <br> Your comments said " <?php echo $_POST["comments"];?>"
        <br> According to you, you have visited <?php if(isset($_POST['submit'])){
foreach($_POST['Continent'] as $continent)
{
echo $continent.", ";
}
}?>
    </body>
</html>

