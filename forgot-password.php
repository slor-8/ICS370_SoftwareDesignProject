<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="forgot-style.css">
</head>
<body>

	<!-- header -->
	<?php
        include ("mini_header.php");
    ?>
	
	<!-- forgot container -->
	<div class="forgot">
		<div class="title" style="font-weight: bold; font-size: 20px;">Forgot Password</div>

		<div class="forgot-memo">Enter your email to get a temporary password</div>
			<!-- forgot password content -->
				<form class="forgot-form" action="forgot-password.php" method="POST">

                <!-- email input -->
				<div class="email-bg">
					<label class="email-label">Email </label> <span class="required">*</span>
					<br>
					<input type="email" class="email" name="email" required="required">
				</div>

                <!-- forgot password btn -->
                <button class="forgot-btn" type="submit" name="submit">Forgot Password</button>
                </form>
	</div>

	<!-- php form after submission -->
	<?php
	
	if (isset($_POST['submit'])){
	
	// Assigning POST values to variables.
	$email = $_POST['email'];
	
	// CHECK FOR THE RECORD FROM TABLE
	$sql = "SELECT * FROM cusContact WHERE email='$email'";
	 
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
		// if there are no records of email in database
		if (!$count == 1)
		{   
			?>
			<script type="text/javascript">
			alert("Email does not exist!");
			</script>
			<?php
		}
		//if there are records of email in database
		else 
		{
			// random generate a temporary password which will be used to sign back in
			$password = openssl_random_pseudo_bytes(16);
			$password = bin2hex($password);

			// temporary password is updated into the database
			$update = "UPDATE customer, cusContact SET cusPassword = '$password' WHERE customer.customerID = cusContact.customerID AND email = '$email'";
				
			$result = mysqli_query($conn, $update) or die(mysqli_error($conn));

			/*send an email */
			$to = $email;
			$subject = "Password";
            $txt = "Your temporary password is : $password";
            $headers = "From: customersupport@openseasbank.com" . "\r\n" .
            	"CC: somebodyelse@example.com";
            mail($to,$subject,$txt,$headers);
			?>
			<script type="text/javascript">
			alert("A Temporary Password Has Been Emailed To You!");
			window.location = "home_page.php"; //redirect to homepage
			</script>
			<?php
		}
	}
	?>


	<?php
        include ("footer.php");
    ?>

</body>
</html>