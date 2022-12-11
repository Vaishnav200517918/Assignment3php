<!--Connecting to the database-->

<?php
try{
    $conn = new PDO('mysql:host=172.31.22.43;dbname=Vaishnav200517918;','Vaishnav200517918','gEerDBOc6H');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo'Connection Unsuccessfull' . $e->getMessage();
}
?>

