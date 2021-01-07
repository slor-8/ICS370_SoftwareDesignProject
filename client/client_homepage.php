<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="client-home-style.css">
</head>
<body>
	<!-- main client header/nav -->
	<?php
		include ("client_header.php");
	?>

    <!-- main navigation --> 
    <nav class="navbar1">
    	<div class="main-account" style="float:left">
            <a href="client_homepage.php" style="color:red">My Accounts</a>
        </div>
        <div class="transfer-page" style="float:left">
            <a href="client_transfer.php">Transfer</a>
        </div>
        <div class="settings-page" style="float:left">
            <a href="client_settings.php">Settings</a>
        </div>	
    </nav>

	<!-- 2nd navigation -->
	<nav class="navbar2">
    	<div class="profile-header" style="float:left">
            <a href="client_homepage.php" style="color: white;">Overview</a>
        </div>
    </nav>

	<!-- client accounts -->
	<div class="accounts"> </div>
	<h1 class="deposit-accounts"> Deposite Accounts</h1>
		<!-- checking accounts -->
		<div class="checking-account">Checking Account</div>
		<?php
		$sql = "SELECT * FROM checkingAccount where customerID = ' ".$_SESSION['sess_accountID']."'";
		$res_data = mysqli_query($conn,$sql);
		if (!$res_data) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		else {
			while ($row = mysqli_fetch_array($res_data)){
			$checkingAccountID = $row["accountID"];
			$checkingBalance = $row["balance"];


			// checking account ID
			echo '<div class="checking-accountID">'." Checking Account ID: ".'</div>';
			echo '<div class="checking-accountID-input">'.$checkingAccountID.'</div>';
		
			// checking account balance
			echo '<div class="checking-balance">'." Available Balance: ".'</div>';
			echo '<div class="checking-balance-input">'."$".$checkingBalance.'</div>';
			}
		}
		?>

		<!-- savings-account -->
		<div class="savings-account">Savings Account</div>
		<?php
		$sql = "SELECT * FROM savingsAccount where customerID = ' ".$_SESSION['sess_accountID']."'";
		$res_data = mysqli_query($conn,$sql);
		if (!$res_data) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		else {
			while ($row = mysqli_fetch_array($res_data)){
			$savingsAccountID = $row["accountID"];
			$savingsBalance = $row["balance"];


			// checking account ID
			echo '<div class="checking-accountID">'." Savings Account ID: ".'</div>';
			echo '<div class="checking-accountID-input">'.$savingsAccountID.'</div>';
		
			// checking account balance
			echo '<div class="checking-balance">'." Available Balance: ".'</div>';
			echo '<div class="checking-balance-input">'."$".$savingsBalance.'</div>';
			}
		}
		?>
</body>
</html>