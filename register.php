<?php
//setting up the template files and requiring the database
$title = "Register";
$description = "This page will contain your Register page";
require ('./templates/header.php');
require 'database.php';



//if statement to check the delete id
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $sql = "DELETE FROM register WHERE userid = '$deleteId'";
    $conn->exec($sql);
}
?>
<main class="register-main">
<?php
  session_start();
//  check if the user is logged in or not
  if(!isset($_SESSION['userid'])){
      header('location:login.php');
      exit();
  }else {
//      display the users who registered
      $sql = "SELECT * FROM register";
      $result = $conn->query($sql);
      echo '<section class="register-section">';
      echo '<table>
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>';
      foreach ($result as $row) {
          ?>
          <tr>
              <td><?php echo $row['userid'] ?></td>
              <td><?php echo $row['fname'] ?></td>
              <td><?php echo $row['lname'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td>
                  <a class="linke" href="edit-register.php?editId=<?php echo $row['userid'] ?>">Edit
                  </a></td>
              <td>
                  <a class="linkd" href="register.php?deleteId=<?php echo $row['userid'] ?>" >Delete
                      </a>
              </td>
          </tr>
      <?php }
      echo '</table>
<button class="logoutbtn"><a href="log-out.php"Logout</a>Logout</button>
</section>
         </main>';
      require './templates/footer.php';
  }?>
