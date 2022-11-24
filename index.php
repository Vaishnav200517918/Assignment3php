
<!-- Assigning title and description variable -->
<!-- Using the header template -->
<?php

$title = "Profile Page";
$description = "This page will contain your profile page";
require './templates/header.php';
?>
<!-- Using the database file -->
<?php

include 'database.php';

$profileObj = new database();

if(isset($_POST['submit'])) {
    $profileObj->insertData($_POST);
}

//Delete
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $profileObj->deleteRecord($deleteId);
}
?>
<!-- Main element of the index starts here-->
    <main>
        <div class="profile-card-container">
            <?php
            $profiles = $profileObj->displayData();
            foreach ($profiles as $profile) {
                ?>
                    <div class="profile-card">
                        <div><img class="profile-pic" src="img/profile-pic.png "></div>
                            <div class="profile-text">
                                <div><p><span class="ptext">Full Name: </span><?php echo $profile['fullname'] ?></p></div>
                                <div><p><span class="ptext">Email Id: &nbsp&nbsp </span><?php echo $profile['email'] ?></p></div>
                                <div><p><span class="ptext">Bio: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><?php echo $profile['bio'] ?></p></div>
                                <div class="profile-btn-container">
                                    <a href="edit.php?editId=<?php echo $profile['id'] ?>">
                                        <button class="profile-btn">EDIT</button>
                                    </a>
                                    <p> | </p>
                                    <a href="index.php?deleteId=<?php echo $profile['id'] ?>" >
                                           <button class="profile-btn">DELETE</button>
                                    </a>

                                </div>
                            </div>
                    </div>
            <?php } ?>

        </div>
        <!--Form to get the user details-->
        <div class="form-container">
            <div class="form-card">
                <form action="index.php" method="POST">
                    <div>
                        <label for="fullname">Name:</label>
                        <input type="text"  name="fullname" placeholder="Enter name" required="">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email"  name="email" placeholder="Enter email" required="">
                    </div>
                    <div>
                        <label for="bio">Bio:</label>
                        <input type="text"  name="bio" placeholder="Enter bio" required="">
                    </div>
                    <input type="submit" name="submit"   value="Submit">
                </form>
        </div>
    </main>
<!-- Using the footer template -->
<?php

require './templates/footer.php'

?>