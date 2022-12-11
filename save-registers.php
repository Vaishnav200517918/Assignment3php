<?php
//requiring database file
require 'database.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

// template file
require './templates/header.php';

if($ok){
    //hashing the password
    $password = hash('sha512', $password);
    $sql = "INSERT INTO register (fname, lname, email, pass_word) VALUES ('$fname', '$lname', '$email', '$password');";
    $conn->exec($sql);
    $conn = null;
}
?>
<main>
    <section>
        <div>
            <p>Successfully Registered</p>
            <a href ="login.php">Sign In </a>
        </div>
    </section>
</main>
<?php require './templates/footer.php';?>


