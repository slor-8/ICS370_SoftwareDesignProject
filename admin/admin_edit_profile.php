<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="admin-home.css">
    <link rel="stylesheet" href="edit-profile.css">
</head>
<body>
	<!-- main client header/nav -->
	<?php
		include ("admin_header.php");
	?>

	<!-- main navigation --> 
	<nav class="navbar1">
    <div class="manage-user" style="float:left">
        <a href="admin_homepage.php" style="color:red">User Information</a>
    </div>
    <div class="fixes-errors" style="float:left">
        <a href="CreateadminAccount.php">Create Admin Account</a>
    </div><div class="fixes-errors" style="float:left">
        <a href="CreateUserAccount.php">Create User Account</a>
    </div>
    <div class="manage-admins" style="float:left">
        <a href="admin_list_display.php">Admin Information</a>
    </div>	
    </nav>

    <div class="main-bg"> </div>
    <h1 class="heading"> Edit Profile </h1>

    <!-- update contact information -->
    <?php
        $adminID = $_SESSION['sess_adminID'];
        $query = mysqli_query($conn, "SELECT * FROM systemAdmin WHERE adminID =' ".$_SESSION['sess_adminID']."'") 
        or die (mysqli_error($conn));
        $row = mysqli_fetch_array($query);
        

    ?>
    
    <form class="contact-form" method="post" action="admin_edit_profile.php">
        <div class="username-bg">
        <label class="username-label">UserName: </label>
            <div class="username"><?php echo $row['adminUsername'];?></div>
        </div>

        <div class="password-bg">
        <label class="password">Password: </label>
            <input type="submit" class="password-link" name="resetPassword" value="Change Password"/>
        </div>

        <div class="first-name-bg">
        <label class="first-name">First Name: </label>
            <input type="text" class="firstName-form-control" name="a_firstName" value="<?php echo $row['a_firstName'];?>"required>
        </div>

        <div class="middle-name-bg">
        <label class="middle-name">Middle Name: </label>
            <input type="text" class="middleName-form-control" name="a_middleName" value="<?php echo $row['a_middleName'];?>"required>
        </div>

        <div class="last-name-bg">
        <label class="last-name">Last Name: </label>
            <input type="text" class="lastName-form-control" name="a_lastName" value="<?php echo $row['a_lastName'];?>"required>
        </div>

        <div class="submit-section">
        <button input type="submit" class="submit-btn" name="submit">Save Changes</button>
        </div>

    </form>

    <?php
    if (isset($_POST['resetPassword'])) {
        include ("password-reset.php");
    }

    if(isset($_POST['submit'])) {
        $a_firstName = $_POST["a_firstName"];
		$a_middleName = $_POST["a_middleName"];
		$a_lastName = $_POST["a_lastName"];
        $adminPassword = $_POST["adminPassword"];


        $updateQuery = "UPDATE systemAdmin SET a_firstName = '$a_firstName', a_middleName = '$a_middleName', a_lastName = '$a_lastName',
        adminPassword = '$adminPassword' WHERE adminID = '$adminID'";
        $result = mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
        alert("Update Saved Successfully");
        window.location = "admin_edit_profile.php";
        </script>
        <?php
    }

    ?>

    

</body>
</html>