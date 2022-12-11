
<!--Setting title/ requiring templates and database file -->
<?php
$title = "Content";
$description = "This page will contain your Content page";
require ('./templates/header.php');
require 'database.php';




    if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
        session_start();
        if (!isset($_SESSION['userid'])) {
            header('location:login.php');
            exit();
        } else {
            $deleteId = $_GET['deleteId'];
            $sql = "DELETE FROM offemployee WHERE ID = '$deleteId'";
            $conn->exec($sql);
        }
    }
?>
<!-- main of the page -->
<main class="content-main">
    <section class="content-section">
        <div>
            <form method="post" action="save-content.php">
                <input  name="fname" type="text" placeholder="First Name" required/>
                <input  name="lname" type="text" placeholder="Last Name" required />
                <input  name="email" type="email" placeholder="Email" required />
                <input  type="submit" name="submit" value="Insert" />
            </form>
        </div>
        <div>
            <?php

            $sql = "SELECT * FROM offemployee";
            $result = $conn->query($sql);
            echo '<section>';
                echo '<table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>';
                    foreach ($result as $row) {
                     ?>
                        <tr>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['lname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td>
                                <a class="linke" href="edit-content.php?editId=<?php echo $row['ID'] ?>">Edit
                                </a></td>
                            <td>
                                <a class="linkd" href="content.php?deleteId=<?php echo $row['ID'] ?>" >Delete
                                </a>
                            </td>
                        </tr>
                    <?php }
                    echo '</table>';
                echo '<button class="logoutbtn"><a href="log-out.php"Logout</a>Logout</button>';
                echo '</section>';
            $conn = null;
            ?>
        </div>
    </section>
</main>
<!-- footer file -->
<?php require ('./templates/footer.php'); ?>