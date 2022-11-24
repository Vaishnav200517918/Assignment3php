<!--Using the database file -->
<?php

include 'database.php';

$profileObj = new database();

if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $profile = $profileObj->displyaRecordById($editId);
}

if(isset($_POST['update'])) {
    $profileObj->updateRecord($_POST);
}

?>
<!--Using the header template -->
<?php

$title = "Edit Your Profile";
$description = "This page will edit your profile page";
require './templates/header.php';
?>
<!--Main element of the edit page-->
<main>
    <div class="uform-container">
        <div class="form-card">
            <!--Form to edit the records -->
            <form action="edit.php" method="POST">
                <div>
                    <label for="name">Name:</label>
                    <input type="text"  name="ufullname" value="<?php echo $profile['fullname']; ?>" required="">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email"  name="uemail" value="<?php echo $profile['email']; ?>" required="">
                </div>
                <div>
                    <label for="bio">Bio:</label>
                    <input type="text"  name="ubio" value="<?php echo $profile['bio']; ?>" required="">
                </div>
                <div>
                    <input type="hidden" name="id" value="<?php echo $profile['id']; ?>">
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