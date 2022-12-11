
<!--login/sign up page-->
<?php

//setting up the template
$title = "Login/ Sign Up";
$description = "This page will contain your Login page";
require './templates/header.php';
?>

<!--main of the login page-->
<main class="login-main">
    <section class="login-section">
        <div >
<!--            create account form-->
            <form method="post" action="save-registers.php">
                <h3>Don't have an account, create a new one</h3>
                <p><input name="fname" type="text" placeholder="First Name" required/></p>
                <p><input name="lname" type="text" placeholder="Last Name" required /></p>
                <p><input name="email" type="email" placeholder="Email" required /></p>
                <p><input name="password" type="password" placeholder="Password" required /></p>
                <p><input name="confirm" type="password" placeholder="Confirm Password" required /></p>
                <input type="submit" name="submit" value="Register" />
            </form>

        </div>
        <div>
<!--            sign up form-->
            <h3>Already have an account? Sign In</h3>
            <form method="post" action="validate.php">
                <p><input name="email" type="email" placeholder="Email" required /></p>
                <p><input name="password" type="password" placeholder="Password" required /></p>
                <input type="submit" value="Sign In" />
            </form>

        </div>
    </section>
</main>
<?php require './templates/footer.php'?>