<?php
require_once 'dbConnect-scriptures.php'; // this is the file that holds a pdo connection
$db = get_db();
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action){
    case 'addScripture':
        $book = $_POST["book"];
        $chapter = $_POST["chapter"];
        $verse = $_POST["verse"];
        $content = $_POST["content"];
        $topicIds = $_POST["topics"];


        $addedScripture = addScripture($book, $chapter, $verse, $content);
        $addedTopics = addTopicId($topicIds);

//
        if ($addedScripture == 1){
            echo "$book $chapter ':' $verse successfully added <br>";
        }
        else{echo "UNSUCCESSEFUL! <br>";}

        if ($addedTopics){
            echo $addedTopics. " added";
        }

//        $topicN = count($topicIds);
//        echo $topicN;
//        echo("Topics selected: ");
//	    for($i=0; $i < $topicN; $i++){
//	      echo($topicIds[$i] . " ");
//	    }
////       var_dump($topicIds);
    break;

        }

?>

<!DOCTYPE html>

<html lang="en">

<head>

</head>

<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Book: </label> <input type="text" name ="book" required><br>
    <label>Chapter: </label><input type="text" name ="chapter" required><br>
    <label>Verse: </label><input type="text" name="verse" required><br>
    <label>Content: </label><textarea rows="4" cols="50" name="content"> </textarea><br>
    <label>Topics: </label><br>


    <?php
//    Create a checklist of topics ***************************************
    $statement = $db->prepare("SELECT name, id FROM topic");
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<input type='checkbox' name='topics[]' value='$row[id]'>$row[name]</input></br>";
    }
//    ******************************************************************************************

 //     This method is called when the form is submitted: ****************************

 function addScripture($book, $chapter, $verse, $content)
 {
     $db = get_db();
     $statement = $db->prepare('INSERT INTO scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content) ');
     $statement->bindValue(':book', $book);
     $statement->bindValue(':chapter', $chapter);
     $statement->bindValue(':verse', $verse);
     $statement->bindValue(':content', $content);
     $statement->execute();
     $rowsChanged = $statement->rowCount();

     $statement->closeCursor();
     return $rowsChanged;
 }
// ****************************   ****************************   ****************************
    ?>

    <input type="submit" name = "action" value = "addScripture">
</form>

<?php
//****** This method is also called when the form is submitted:
//          This function will add to the relational table "topic_scripture_relation",
function addTopicId($topicIds){

    $db = get_db();

    $statement = $db->prepare("SELECT last_value FROM scriptures_id_seq");
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $scriptureId = $row['last_value'];


// Now go through each topic id in the list from the user's checkboxes
    foreach ($topicIds as $topicId) {
        echo "scriptureId: $scriptureId, topicId: $topicId";
        // Again, first prepare the statement
        $statement = $db->prepare('INSERT INTO topic_scripture_relation (scripture_id, topic_id) VALUES(:scripture_id, :topic_id)');
        // Then, bind the values
        $statement->bindValue(':scripture_id', $scriptureId);
        $statement->bindValue(':topic_id', $topicId);
        $statement->execute();

//        $rowsChanged = $statement->rowCount();
//        $statement->closeCursor();
//        echo $rowsChanged;
//        *********************************************************************************************

    }

}
?>
</body>
</html>