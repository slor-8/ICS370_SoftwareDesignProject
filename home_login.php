<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="login-home.css">
	<style>
		.registerBtn {
			background-color: black;
			border: black;
			border-radius: 10px;
			color: white;
			font-size: 15px;
			width: 90%;
			height: 30px;
			margin-top: 2%;
			margin-left: 5%;
			cursor: pointer;
		}

		body {font-family: Arial, Helvetica, sans-serif;}

		/* The Modal (background) */
		.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		background-color: #fefefe;
		color: #000000;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 30%;
		}

		/* The Close Button */
		.close {
		color: #000000;
		float: right;
		font-size: 28px;
		font-weight: bold;
		}

		.close:hover,
		.close:focus {
		color: #000000;
		text-decoration: none;
		cursor: pointer;
		}
		</style>
</head>
<body>

	<div class="login-register">
	<!-- usename input -->
	<form action="login.php" method="POST">
	<div class="user">Username
		<div class="username">
			<input type="username" class="userID" name="username" id="username" placeholder="Username" required>
		</div>
	</div>

	<!-- forgot username -->
	<div class="forgot-user" style="float:left">
        <a class="forgotUsername" href="forgot-username.php">Forgot Username?</a>
    </div>

	<!-- password input -->
	<div class="userPassword">Password
		<div class="userPass">
			<input type="password" class="password" name="password" id="password" placeholder="Password" required>
		</div>
	</div>

	<!-- forgot password -->
	<div class="forgot-password" style="float:left">
        <a class="forgotPassword" href="forgot-password.php">Forgot Password?</a>
    </div>
	

	<!-- login btn -->
	<button class="login-btn" type="submit" name="submit">Login</button>
	</form>

	<!-- new user - register account -->
	<div class="register" style="float:left">New User?

			<!-- Trigger/Open The Modal -->
			<button id="registerBtn">Register</button>

			<!-- The Modal -->
			<div id="registerModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<h2>Register</h2>
				<p>Open Seas Bank cares about the privacy and security of their customer. 
				Registration via online is unavailable at the moment. Please visit one of our branches
				and ask our team members to help register you for an online account.</p>
				<p>Thanks for understanding and your continued support.</p>
			</div>

			</div>

			<script>
			// Get the modal
			var modal = document.getElementById("registerModal");

			// Get the button that opens the modal
			var btn = document.getElementById("registerBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
			}
			</script>

    </div>

	</div>
</body>
</html>