<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="view-transactions-style.css">
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
    <h1 class="heading"> View Transactions </h1>

    <!-- update contact information -->
    <?php
        $customerID = $_SESSION['sess_accountID'];
        $query = mysqli_query($conn, "SELECT * FROM cusTransaction WHERE customerID=' ".$_SESSION['sess_accountID']."'") 
        or die (mysqli_error($conn));
        $queryResult = mysqli_num_rows ($query);
        $row = mysqli_fetch_array($query);
        

        if($queryResult>0){
            while($row = mysqli_fetch_assoc($query)){
        echo "<div ><table>
        <tr>
        <th>To</th>
        <th>From</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Transaction Status</th>
        </tr>
        <tr><td>". $row['accountTo']."</td>&nbsp;&nbsp;&nbsp;
        <td> ". $row['accountFrom']. "&nbsp; &nbsp;
        <td>". $row['amount']."</td>&nbsp;&nbsp;&nbsp;
        <td>". $row['date']."</td>&nbsp;&nbsp;&nbsp;
        <td>". $row['transactionStatus']."</td>&nbsp;&nbsp;&nbsp;";
            }
        }
    ?>
    

</body>
</html>