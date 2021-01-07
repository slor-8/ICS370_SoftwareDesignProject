<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="client-settings-style.css">
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
            <a href="client_settings.php" style="color:red">Settings</a>
        </div>	
    </nav>

	<!-- 2nd navigation -->
	<nav class="navbar2">
    	<div class="profile-header" style="float:left">
            <a href="#" style="color:white;">Profile</a>
        </div>
        <div class="account-header" style="float:left">
            <a href="home_page.php">Account</a>
        </div>
    </nav>

    <div class="main-bg"> </div>
    <h1 class="heading"> Contact Information </h1>

    <!-- update contact information -->
    <?php
        $customerID = $_SESSION['sess_accountID'];
        $query = mysqli_query($conn, "SELECT * FROM cusAddress, cusContact WHERE cusAddress.customerID = cusContact.customerID
        AND cusAddress.customerID=' ".$_SESSION['sess_accountID']."'") 
        or die (mysqli_error($conn));
        $row = mysqli_fetch_array($query);
        

    ?>
    
    <form class="contact-form" method="post" action="client_settings.php">
        <div class="street-num-bg">
        <label class="street-num">Street Number</label>
            <input type="text" class="num-form-control" name="streetNum" value="<?php echo $row['streetNum'];?>"required>
        </div>

        <div class="street-name-bg">
        <label class="street-name">Street Name</label>
            <input type="text" class="street-form-control" name="streetName" value="<?php echo $row['streetName'];?>"required>
        </div>
            
        <div class="city-name-bg">
        <label class="city-name">City</label>
            <input type="text" class="city-form-control" name="cityName" value="<?php echo $row['cityName'];?>"required>
        </div>

        <div class="state-name-bg">
        <label class="state-name">State</label>
            <input type="text" class="state-form-control" name="stateName" value="<?php echo $row['stateName'];?>"required>
        </div>

        <div class="zipcode-bg">
        <label class="zipcode">Zip Code</label>
            <input type="text" class="zipcode-form-control" name="zipcode" value="<?php echo $row['zipcode'];?>"required>
        </div>

        <div class="primary-num-bg">
        <label class="primary-num">Primary Number</label>
            <input type="text" class="primary-form-control" name="primaryNum" value="<?php echo $row['primaryNum'];?>"required>
        </div>

        <div class="secondary-num-bg">
        <label class="secondary-num">Secondary Number</label>
            <input type="text" class="seconday-form-control" name="secondaryNum" value="<?php echo $row['secondaryNum'];?>"required>
        </div>

        <div class="email-bg">
            <label class="email">E-mail</label>
                <input type="text" class="email-form-control" name="email" value="<?php echo $row['email'];?>"required>
        </div>

        <div class="submit-section">
        <button input type="submit" class="submit-btn" name="submit">Save Changes</button>
        </div>

    </form>

    <?php
    if (isset($_POST['submit'])) {
        $streetNum = $_POST['streetNum'];
        $streetName = $_POST['streetName'];
        $cityName = $_POST['cityName'];
        $stateName = $_POST['stateName'];
        $zipcode = $_POST['zipcode'];
        $primaryNum = $_POST["primaryNum"];
        $secondaryNum = $_POST["secondaryNum"];
        $email = $_POST["email"];

        $query = "UPDATE cusAddress, cusContact SET streetNum = '$streetNum', streetName = '$streetName', cityName = '$cityName', 
        stateName = '$stateName', zipcode = '$zipcode', primaryNum = '$primaryNum', secondaryNum = '$secondaryNum', email = '$email'
        WHERE cusAddress.customerID = cusContact.customerID AND cusAddress.customerID = '$customerID'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
        alert("Update Saved Successfully");
        window.location = "client_settings.php";
        </script>
        <?php
    }

    ?>
    

</body>
</html>