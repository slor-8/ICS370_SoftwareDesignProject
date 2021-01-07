<?php 
    require('dbh.php');
?>
<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="header-style.css">
    <!-- logout btn & icon -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="empty-client-header"></div>
    <div class="header"></div>
    <div class="open-seas" style="color:white;"><a href="../home_page.php" > Open Seas Bank<a> </div>

    <!-- main account links -->
    <div class="account-profile"></div>
        <div class="account-photo">
            <img src="default-profile-image.jpeg" alt="Missing Image" style="height:100px; border-radius:50%;"/>
        </div>

        <?php          
        $sql = "SELECT * FROM customer where customerID = ' ".$_SESSION['sess_accountID']."'";
		$res_data = mysqli_query($conn,$sql);
		if (!$res_data) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		else {
			while ($row = mysqli_fetch_array($res_data)){
                $firstName = $row["c_firstName"];
                echo '<div class="welcome-message">'." Welcome,
                                                        ".$firstName.'</div>';

		    }
        }
   
  ?>

        </div>

        <div class="edit-profile">
            <a href="client_edit_profile.php">Edit Profile</a>
        </div>

        <button class="logout" ><a href="../logout.php">Logout <i class="fa fa-sign-out"></i></a></button>

</body>
</html>
