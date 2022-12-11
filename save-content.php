<?php
//requiring the database and setting up the template files
require 'database.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

require './templates/header.php';
if(true){
//    sql query to insert data into the table
    $sql = "INSERT INTO offemployee (fname, lname, email) VALUES ('$fname', '$lname', '$email');";
    $conn->exec($sql);
    echo '<section class = "success-row">';
    echo '<div>';
    echo '<h3>Employee Saved</h3>';
    echo '</div>';
    echo '</section>';
    $conn = null;
    header('Location: content.php');
}

?>

<?php require './templates/footer.php';?>
