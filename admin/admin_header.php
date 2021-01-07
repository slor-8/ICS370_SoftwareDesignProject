<?php 
    require('dbh.php');
    
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <!-- ../client/client-header-style.css -->
	<link rel="stylesheet" href="../client/header-style.css">
    <!-- logout btn & icon -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="empty-client-header"></div>
    <div class="header"></div>
    <div class="open-seas" style="color:white;"> Open Seas Bank </div>
        

    <!-- main account links -->
    <div class="account-profile"></div>
        <div class="account-photo">
            <img src="default-profile-image.jpeg" alt="Missing Image" style="height:100px; border-radius:50%;"/>
        </div>
        <?php  if (isset($_SESSION['sess_name'])) : 
      
            $sysAdmin = $_SESSION['sess_name'];
        echo '<div class="welcome-message">'." Welcome,
                                                ".$sysAdmin.'(Admin)</div>';
         
        ?>
<?php endif ?>
        </div>

        <div class="edit-profile">
            <a href="admin_edit_profile.php">Edit Profile</a>
        </div>

        <button class="logout"><a href="../logout.php">Logout <i class="fa fa-sign-out"></i></a></button>

</body>
</html>
