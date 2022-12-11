<?php
$email = $_POST['email'];
$password = hash('sha512', $_POST['password']);
require 'database.php';

//sql to select a particular user
$sql = "SELECT userid FROM register WHERE  email = '$email' AND pass_word = '$password'";
$results = $conn->query($sql);
$count = $results -> rowCount();
//validating user
if($count == 1){
    echo '<p>Logged In</p>';
    foreach ($results as $row){
        session_start();
        $_SESSION['userid'] = $row['userid'];
        Header('Location:register.php');
    }
}else {
    echo'<p>Error: Invalid Login</p>';
}
?>
