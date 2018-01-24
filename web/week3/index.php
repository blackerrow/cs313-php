<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Week 3 Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Here is a basic form</h1>
        <form action="thanks.php" method="post" enctype="multipart/form-data" name="SimpleForm" >
            <fieldset>
                <label>Name</label><br><input type="text" name ="name" placeholder="John Smith" required>
                <br><br><label>Email</label><br><input type ="email" name ="email" placeholder="email@email.com">
                <br><br><label>Major</label><br><input type ="radio" name ="major" value ="Computer Science">Computer Science
                <br><input type ="radio" name ="major" value ="Web Design and Development">Web Design and Development<br>
                <input type ="radio" name ="major" value ="Computer information Technology">Computer information Technology<br>
                <input type ="radio" name ="major" value ="Computer Engineering">Computer Engineering<br><br>
                <label>Please Select which continents you have previously visited:</label><br>
                <input type="checkbox" name="Continent[]" value="North America"> North America<br>
                <input type="checkbox" name="Continent[]" value="South America"> South America<br>
                <input type="checkbox" name="Continent[]" value="Europe"> Europe<br>
                <input type="checkbox" name="Continent[]" value="Asia"> Asia<br>
                <input type="checkbox" name="Continent[]" value="Australia"> Australia<br>
                <input type="checkbox" name="Continent[]" value="Africa"> Africa<br>
                <input type="checkbox" name="Continent[]" value="Antarctica"> Antarctica<br>
                <br><br><label>Comments</label><br>
                <textarea name ="comments"></textarea>
                
            </fieldset>
            <input type ="submit" name ="submit" value ="submit">
        
        </form>    
    </body>
</html>

