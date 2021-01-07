<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="contact-style.css">
</head>
<body>
    <!-- header -->
    <?php
        include ("home_header.php");
    ?>

    <div class="contact-container">
    <div class="contact-main">Contact Us</div>
        <hr class="line-main"> </hr>
        <div class="phone-address-main">
            <p> Local Phone: (615) 894-3928 <br>
            Toll Free: (800) 293-4853 <br> </p>
            <p> 8234 Hendrix Avenue <br>
            Minneapolis, MN 55485 </p>
        </div>
    </div>
    </div>

    <div class="hours-container">
    <div class="hours-title">Business Hours </div>
        <div class="hours">
        Monday: 8AM - 5:30PM <br>
        Tuesday: 8AM - 5:30PM <br>
        Wednesday: 8AM - 5:30PM <br>
        Thursday: 8AM - 5:30PM <br>
        Friday: 8AM - 5:30PM <br>
        Saturday: 8AM - 12PM <br>
        Sunday: Closed
        </div>
    </div>


	<?php
        include ("footer.php");
    ?>

</body>
</html>