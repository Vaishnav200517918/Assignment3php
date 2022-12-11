
<!--log out setup-->
<?php
require './templates/header.php';
session_start();
session_unset();
session_destroy();
header('Location: index.php');
require './templates/footer.php';
?>