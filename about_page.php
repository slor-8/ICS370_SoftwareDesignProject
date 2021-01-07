<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="about-style.css">

</head>
<body>
    <!-- header -->
    <?php
        include ("home_header.php");
    ?>

    <div class="about">
        <div class="main-about">
            Open Seas Bank is a new local financial service helping customers better manage and store their financial assets at a safe place.
            At Open Seas Bank we hope to give our customers a peace of mind that they don't have to worry about their financial situations.
        </div>
    </div>

    <div class="developers-container">
        <div class="developers"> Our developers </div>
            <div class="devoloper1" style="float:left;">
                <div class="account-photo">
                    <img src="default-profile-image.jpeg" alt="Missing Image" style="height:100px; border-radius:50%;"/>
                </div>
                <div class="name">Ong Vue</div>
            </div>

            <div class="devoloper2" style="float:left;">
                <div class="account-photo">
                    <img src="default-profile-image.jpeg" alt="Missing Image" style="height:100px; border-radius:50%;"/>
                </div>
                <div class="name">Shoua Lor</div>
            </div>
            
            <div class="explanation">
                <div class="account-photo">
                  
                </div>
                <div class="main-explanation">
                </div>
            </div>
    </div>


	<?php
        include ("footer.php");
    ?>

</body>
</html>