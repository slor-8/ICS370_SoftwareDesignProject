<?php
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="../admin/reset-password-style.css">

</head>
<body>
    <div class="bg">
			<!-- password reset content -->
				<form action="password-reset.php" method="POST">
                <div class="current-password">Current Password
                    <div class="curr-password">
                        <input type="password" class="password-current" name="password-current" id="password-current" required>
                    </div>
                </div>

                <!-- new password input -->
                <div class="new-password">New Password
                    <div class="new-passw">
                        <input type="password" class="password-new" name="password-new" id="password-new" required>
                    </div>
                </div>

                <div class="confirm-new">Confirm New Password
                    <div class="confirm-password">
                        <input type="password" class="password-confirm" name="password-confirm" id="password-confirm" required>
                    </div>
                </div>

                <!-- forgot password btn -->
                <button class="password-btn" type="submit" name="save">Save Password</button>
                </form>
    </div>

    <?php    
    if (isset($_POST['save'])){
	
	// Assigning POST values to variables.
	$currentPassword = $_POST['password-current'];
    $newPassword = $_POST['password-new'];
    $confirmPassword = $_POST['password-confirm'];
	
	// CHECK FOR THE RECORD FROM TABLE
	$sql = "SELECT * FROM customer WHERE customerID = ' ".$_SESSION['sess_accountID']."'";
	 
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($result);

	$password = $row['cusPassword'];
	
        if ($currentPassword != $password)
        {   
            ?>
			<script type="text/javascript">
			alert("Current password is not correct!");
			</script>
            <?php
        }
        else 
        {
            if ($newPassword != $confirmPassword) {
                ?>
                <script type="text/javascript">
                alert("New password and Confirm new password don't match!");
                </script>
                <?php
            }

            else
            {
                $sql = "UPDATE customer SET cusPassword='$confirmPassword' WHERE customerID = ' ".$_SESSION['sess_accountID']."'";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                ?>
                <script type="text/javascript">
                alert("Password Saved Successfully!");
                window.location = "client_edit_profile.php";
                </script>
                <?php
            }
        }
    }

	?>
</body>
</html>