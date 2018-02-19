<?php
session_start();
include 'Modules/head.php'; ?>


<form class="inline-form">
    <div class="input-group">
        <input type="email" class="form-control" size="50" placeholder="email address" required>
        <div class="input-group-btn">
            <a class="btn btn-success" href="accounts/index.php?action=login"> Get Started</a>
            <button class="btn btn-primary">Log in </button>
        </div>
    </div>
</form>
<div class="container-fluid about">
    <h2>About journal||me</h2>
    <p>JournalMe lets you keep track of your life. You can access your journal from anywhere! As long as your are connected to the internet,
        you can create a journal entry or view previous entries. We enable you to seamlessly record  and remember the moments that matter
        most to you. </p>

</div>
<!--<div class="container-fluid grayback">-->
<!--    <h2>Here is a list of Users: </h2>-->
<!---->
<!--    --><?php
//
//    $statement = $db->prepare("SELECT u.firstname, u.lastname, e.entrytext, to_char(e.entrydate, 'DD-MM-YYYY') as date from users u JOIN entries e USING(userid);");
//    $statement->execute();
//    // Go through each result
//    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//    foreach ($data as $info) {
//        echo '<p>';
//        echo 'Name:'. $info['lastname'] . ', ' . $info['firstname'].'';
//        echo '<br>'.'Date: '. $info['date'];
//        echo '<br>' . $info['entrytext'];
//        echo '</p>';
//    }
//    ?>
<!--</div>-->
<div>

</div>

</body>
</html>