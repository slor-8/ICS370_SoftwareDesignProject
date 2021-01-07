<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="edit-profile-setting.css">
</head>
<body>
	<!-- main client header/nav -->
	<?php
		include ("client_header.php");
	?>
    
    <!-- main navigation --> 
    <nav class="navbar1">
    	<div class="main-account" style="float:left">
            <a href="client_homepage.php">My Accounts</a>
        </div>
        <div class="transfer-page" style="float:left">
            <a href="client_transfer.php">Transfer</a>
        </div>
        <div class="settings-page" style="float:left">
            <a href="client_settings.php">Settings</a>
        </div>	
    </nav>

    <div class="main-bg"> </div>
    <h1 class="heading"> Edit Profile </h1>

    <!-- update contact information -->
    <?php
        $customerID = $_SESSION['sess_accountID'];
        $query = mysqli_query($conn, "SELECT * FROM customer WHERE customerID=' ".$_SESSION['sess_accountID']."'") 
        or die (mysqli_error($conn));
        $row = mysqli_fetch_array($query);
        

    ?>
    
    <form class="contact-form" method="post" action="client_edit_profile.php">
        <div class="username-bg">
        <label class="username">Username: </label>
            <div class="username-form-control" name="cusUsername"><?php echo $row['cusUsername'];?></div>
        </div>
            
        <div class="password-bg">
        <label class="password">Password: </label>
            <input type="submit" class="password-link" name="resetPassword" value="Change Password"/>
        </div>

        <div class="first-name-bg">
        <label class="first-name">First Name: </label>
            <input type="text" class="firstName-form-control" name="c_firstName" value="<?php echo $row['c_firstName'];?>"required>
        </div>

        <div class="middle-name-bg">
        <label class="middle-name">Middle Name: </label>
            <input type="text" class="middleName-form-control" name="c_middleName" value="<?php echo $row['c_middleName'];?>"required>
        </div>

        <div class="last-name-bg">
        <label class="last-name">Last Name: </label>
            <input type="text" class="lastName-form-control" name="c_lastName" value="<?php echo $row['c_lastName'];?>"required>
        </div>

        <div class="submit-section">
        <button input type="submit" class="submit-btn" name="submit">Save Changes</button>
        </div>

    </form>

    <?php
    if (isset($_POST['resetPassword'])) {
        include ("password-reset.php");
    }
    if (isset($_POST['submit'])) {
        $cusPassword = $_POST['cusPassword'];
        $c_firstName = $_POST['c_firstName'];
        $c_middleName = $_POST['c_middleName'];
        $c_lastName = $_POST['c_lastName'];

        $query = "UPDATE customer SET cusPassword = '$cusPassword', c_firstName = '$c_firstName', c_middleName = '$c_middleName', 
        c_lastName = '$c_lastName' WHERE customerID = '$customerID'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
        alert("Update Saved Successfully");
        window.location = "client_edit_profile.php";
        </script>
        <?php
    }

    ?>
    

</body>
</html>
