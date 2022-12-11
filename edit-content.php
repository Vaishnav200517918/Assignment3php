<?php
//requiring database
require 'database.php';
$editId = $editId = $_GET['editId'];
if(isset($_POST['update'])) {
//    assigning variables
    $fname = $_POST['ufname'];
    $lname = $_POST['ulname'];
    $email = $_POST['uemail'];
    $ID = $_POST['id'];
//section start
    session_start();
    if (!isset($_SESSION['userid'])) {
        header('location:login.php');
        exit();
    } else {
//sql query for updating
        $sql = "UPDATE offemployee SET fname = '$fname', lname = '$lname', email = '$email' WHERE ID = '$ID'";
        $conn->exec($sql);
        $conn = null;
        header('location:content.php');

    }
}

?>

<!--setting up the template file-->
<?php

$title = "Edit Content";
$description = "This page will edit your Content page";
require './templates/header.php';
?>
<!--Main element of the edit page-->
<main class="editc-main">
    <div class="uform-container">
        <div>
            <!--Form to edit the content -->
            <form action="edit-content.php" method="POST">
                <h3>Changes won't be made, if you are not Signed In </h3>
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
                    <input type="hidden" name="id" value="<?php echo $editId; ?>">
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
