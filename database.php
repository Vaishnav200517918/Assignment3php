<?php
//Database information
class database
{
    private $servername = "172.31.22.43";
    private $username = "Vaishnav200517918";
    private $password = "gEerDBOc6H";
    private $database = "Vaishnav200517918";
    public $con;
//Connecting the database
    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect: " . mysqli_connect_error());
        }else{
            return $this->con;
        }
    }
    //Code for inserting the data
    public function insertData($post)
    {
        $fullname = $this->con->real_escape_string($_POST['fullname']);
        $email = $this->con->real_escape_string($_POST['email']);
        $bio = $this->con->real_escape_string($_POST['bio']);
        $query="INSERT INTO profiles(fullname,email,bio) VALUES('$fullname','$email','$bio')";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php");
        }else{
            echo "Registration failed!";
        }
    }
    // Code for displaying the data
    public function displayData()
    {
        $query = "SELECT * FROM profiles";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else{
            echo "No records were found";
        }
    }
    // code for deleting the data

    public function deleteRecord($id)
    {
        $query = "DELETE FROM profiles WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php");
        }else{
            echo "Record wasn't deleted";
        }
    }

    //Identiying the record id
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM profiles WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "The record is not found";
        }
    }

    // code for editing the data
    public function updateRecord($postData)
    {
        $fullname = $this->con->real_escape_string($_POST['ufullname']);
        $email = $this->con->real_escape_string($_POST['uemail']);
        $bio = $this->con->real_escape_string($_POST['ubio']);
        $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE profiles SET fullname = '$fullname', email = '$email', bio = '$bio' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php");
            }else{
                echo "Record not updated!";
            }
        }

    }


}