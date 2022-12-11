<?php
//require the database page
require 'database.php';
$title = "Edit";
$description = "This page will contain your Edit page";
$editId = $_GET['editId'];
?>


<?php
if(isset($_POST['update'])) {
    $fname = $_POST['ufname'];
    $lname = $_POST['ulname'];
    $email = $_POST['uemail'];
    $userid = $_POST['userid'];

    $sql = "UPDATE register SET fname = '$fname', lname = '$lname', email = '$email' WHERE userid = '$userid'";
    $conn->exec($sql);
    $conn = null;
    header( 'location:register.php');

}

?>
<!--Using the header template -->
<?php
require './templates/header.php';
?>
<!--Main element of the edit page-->
<main>
    <div class="uform-container">
        <div>
            <!--Form to edit the register -->
            <form action="edit-register.php" method="POST">
                <div>
                    <label for="ufname">First Name:</label>
                    <input type="text"  name="ufname"  required="">
                </div>
                <div>
                    <label for="ulname">Last Name:</label>
                    <input type="text"  name="ulname"  required="">
                </div>
                <div>
                    <label for="uemail">Email:</label>
                    <input type="email"  name="uemail"  required="">
                </div>
                <div>
                    <input type="hidden" name="userid" value="<?php echo $editId; ?>">
                    <input type="submit" name="update"  style="float:right;" value="Update">
                </div>
            </form>
        </div>
    </div>
</main>

<!--Using the footer template -->
<?php

require './templates/footer.php'

?>
