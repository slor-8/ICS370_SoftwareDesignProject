<!DOCTYPE html> 
<html lang="en">
<head>
    <link rel="stylesheet" href="homecss.css">
</head>
<body>
    <!-- header -->
    <?php
        include ("home_header.php");
    ?>
    <!-- news section -->
    <div></div>
    <div class="newssection"> </div>
    <h1 class="news"> NEWS </h1>
    <img src="online_banking.jpg" class="newsImage" alt="image2" width="absolute" height="absolute">
    <div class="info">
    <h3 class="infoheading"> Open Seas Bank Has Gone Online! </h3>
    <p class="infopara">Join the new and convenient way of banking with Open Seas Bank! <br>
     We've provided our customers a convenient way at accessing their bank accounts through the great usage of an online banking website.
     Customers can now view their bank account balance, see the transactions they've made,
      and also have the ability to transfer money from one account to another. </br></p>
    </div>

    <!-- login -->
    <?php
        include ("home_login.php");
    ?>

    <!-- footer -->
    <?php 
        include ("footer.php");
    ?>
</body>

</html>