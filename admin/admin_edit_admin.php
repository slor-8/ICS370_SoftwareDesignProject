<?php  
session_start();
require('dbh.php');
$id = $_SESSION['sess_adminID'];
$search = $_SESSION['updateInput'];
$query = "SELECT * FROM systemAdmin
WHERE adminID = '$id' and a_firstName = '$search' ";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <link rel="stylesheet" href="admin-home.css">
    <link rel="stylesheet" href="edit-client-style.css">
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
    <h1 class="heading"> Admin Information </h1>

    <!-- update client information -->


    
    <form class="contact-form" method="post" action="">
      
        <div class="first-name-bg">
        <label class="password">Admin ID: </label>
            <input type="text" style="  font-size: 15px;   text-align:center;"class="password-form-control" name="adminID" value="<?php echo $row['adminID'];?>"required disabled>
        </div>
        <div class="first-name-bg">
        <label class="password">UserName: </label>
            <input type="text" style="  font-size: 15px;   text-align:center;"cclass="password-form-control" name="adminUsername" value="<?php echo $row['adminUsername'];?>"required disabled>
        </div>
        <div class="first-name-bg">
        <label class="password">Password: </label>
            <input type="text"style="  font-size: 15px;   text-align:center;"c class="password-form-control" name="adminPassword" value="<?php echo $row['adminPassword'];?>"required>
        </div>

        <div class="first-name-bg">
        <label class="first-name">First Name: </label>
            <input type="text"style="  font-size: 15px;   text-align:center;"c class="firstName-form-control" name="firstName" value="<?php echo $row['a_firstName'];?>"required>
        </div>

        <div class="middle-name-bg">
        <label class="middle-name">Middle Name: </label>
            <input type="text" style="  font-size: 15px;   text-align:center;"cclass="middleName-form-control" name="middleName" value="<?php echo $row['a_middleName'];?>"required>
        </div>

        <div class="last-name-bg">
        <label class="last-name">Last Name: </label>
            <input type="text" style="  font-size: 15px;   text-align:center;"cclass="lastName-form-control" name="lastName" value="<?php echo $row['a_lastName'];?>"required>
        </div>

        <div class="enable-disable-bg">
        <label class="enable-disable">Enable/Disable: </label>
            <select class="enable-disable-mode" name="enable_disable">
				<option value="1">Enable</option>
				<option value="0">Disable</option>
			</select>
        <br>
        <br>
        <button style="width=200px;height:30px; margin-left:10%;"input type="submit" class="submit-btn" name="submit">Save Changes</button>
        </div>

    </form>

    <?php
    if(isset($_POST['submit'])) {
        $firstName = $_POST["firstName"];
		$middleName = $_POST["middleName"];
		$lastName = $_POST["lastName"];
        $adminPassword = $_POST["adminPassword"];
        $enable_disable = $_POST["enable_disable"];


        $updateQuery = "UPDATE systemAdmin SET a_firstName = '$firstName', a_middleName = '$middleName', a_middleName = '$lastName',
        adminPassword = '$adminPassword', enable_disable = '$enable_disable' 
        WHERE systemAdmin.a_firstName = '$search'  and systemAdmin.adminID= '$id'";
        $result = mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
        alert("Update Saved Successfully");
        window.location = "admin_list_display.php";
        </script>
        <?php
    }

    ?>

</body>
</html>
