<?php
session_start();
require "../dbConnect.php";
$db = get_db();
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'login':
        include '../view/login.php';
        break;
    case 'Login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
           function getClient($clientEmail){
            $db = get_db();
            $sql = 'SELECT userid, firstname, lastname, email, password FROM users WHERE email = :email';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
            $stmt->execute();
            $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $clientData;
        }
        $clientData = getClient($clientEmail);
        $_SESSION['clientData'] = $clientData;
        $_SESSION['loggedIn'] = TRUE;
        include '../view/your-page.php';
        break;
    case 'viewEntries':
        $userId = $_SESSION['clientData']['userid'];

        function getEntries($userId){
            $db = get_db();
            $sql = 'SELECT entryid, entrytitle, to_char(entrydate, \'MM-DD-YYYY\') as date, entrytext from entries where userid = :userid';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $entries = $stmt->fetchALL(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $entries;
        }

        $entries = getEntries($userId);

//             foreach ($entries as $entry) {
//            echo '<div class="panel panel-default">';
//            echo '<div class="panel-heading">';
//            echo '<h3><span> Title: <strong>'. $entry['entrytitle'].'</strong></span>';
//            echo '<span> Date: <strong>'. $entry['date'].'</strong></span>';
//            echo '</h3>';
//            echo ' </div>';
//            echo ' <div class="panel-body">';
//            echo '<p>'.$entry['entrytext'].'</p>';
//            echo ' </div></div>';
//            }

        include '../view/entries.php';
    break;

    case 'addEntry':
        $userId = $_SESSION['clientData']['userid'];
        $entryTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $entryText = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

        function addEntry($userId, $title, $text){
            $db = get_db();
            $sql = 'INSERT INTO entries (userid, entrytitle, entrytext) VALUES (:userid, :title, :text)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':text', $text, PDO::PARAM_STR);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            $stmt->closeCursor();
            return $rowCount;
        }

        $newEntry = addEntry($userId, $entryTitle, $entryText);

        if ($newEntry == 1){
            $message = 'Entry was added succesfully';
        }else{
            $message = 'ERROR: entry not added, please contact administrator';
        }
        include '../view/your-page.php';

    break;

    case 'goAddEntry':
        include '../view/new-entry.php';
        break;

        case 'Logout' :
            session_destroy();
            header('location: ../');
        break;

    case 'editEntry':

        $entryId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        function getEntry($entryId){
            $db = get_db();
            $sql = 'SELECT entryid, entrytitle, to_char(entrydate, \'MM-DD-YYYY\') as date, entrytext from entries where entryid = :entryid';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':entryid', $entryId, PDO::PARAM_STR);
            $stmt->execute();
            $entries = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $entries;
        }

        $entry = getEntry($entryId);

        $_SESSION['entryId'] = $entry;
        function buildEntryEditForm($entry){


            $review = "<form  class='inline-form' action='/cs313php/project/accounts/?action=updateEntry' method='post' enctype='multipart/form-data' name='updateEntry' id= 'updateEntryForm'> ";
            $review .= "<h2>$entry[entrytitle]</h2>";
            $review .= "<p>Entered on $entry[date]</p>";
            $review .= "<label>Review Text </label><br>";
            $review .= "<textarea class='form-control' name = 'newText' required>";
            $review .= $entry['entrytext'];
            $review .= "</textarea><br>";
            $review .= "<input type = 'submit' value = 'update' >";
            $review .= "<input type = 'hidden' name = 'action' value = 'updateReview'>";
            $review .= "<input type = 'hidden' name = 'reviewId' value = '$entry[entryid]'>";
            $review .= "</form>";
            return $review;
        }

        $editEntryView= buildEntryEditForm($entry);
        include '../view/edit-entry.php';

        break;

    case 'updateEntry':
        $entryId = $_SESSION['entryId'];
        var_dump($entryId);
        $newText =  filter_input(INPUT_POST, 'newText', FILTER_SANITIZE_STRING);
        function addEntry($text, $entryId){
            $db = get_db();
            $sql = 'UPDATE entries SET  entrytext = :text WHERE entryid = :entryid)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':text', $text, PDO::PARAM_STR);
            $stmt->bindValue(':entryid', $entryId, PDO::PARAM_STR);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            $stmt->closeCursor();
            return $rowCount;
        }
        $newEntry = addEntry($newText, $entryId);
        if ($newEntry == 1){
            $message = 'Entry was updated successfully';
        }else{
            $message = 'ERROR: entry not updated, please contact administrator';
        }
        include '../view/your-page.php';

        break;




    default:
        include '../view/your-page.php';


}