<?php
//setting the the template file
$title = "Emplo";
$description = "This page will contain your profile page";
require './templates/header.php';
?>

<!--main of the index page-->
    <main class="main">
        <section class="hero">
            <div class="hero-img-container">
                <img class="hero-img" src="img/hero-img.jpg" alt="">
            </div>
            <div class="hero-text-container">
                <h2 class="hero-heading">Emplo</h2>
                <h3 class="hero-subheading">Official Employee List</h3>
                <p class="hero-para">This website stores and manage the list of the employee working in our company.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque consequatur sint veniam magnam laboriosam quidem inventore nobis vitae esse! Repellat corrupti ab debitis enim et, libero cumque sit qui ipsam.
                </p>
            </div>
        </section>
    </main>
<?php
require './templates/footer.php';
?>
