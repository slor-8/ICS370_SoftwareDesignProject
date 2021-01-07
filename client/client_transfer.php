<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="client-transactions-style.css">
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
            <a href="client_transfer.php" style="color:red">Transfer</a>
        </div>
        <div class="settings-page" style="float:left">
            <a href="client_settings.php">Settings</a>
        </div>	
    </nav>

    <div class="main-bg"> </div>
    <h1 class="heading"> Transaction </h1>

    <div class="view-btn">
        <a href="view_transactions.php">View Transactions</a>
    </div>	

    <!-- update contact information -->
    <?php
        $customerID = $_SESSION['sess_accountID'];
        $query = mysqli_query($conn, "SELECT * FROM checkingAccount WHERE customerID=' ".$_SESSION['sess_accountID']."'") 
        or die (mysqli_error($conn));
        $rowQuery = mysqli_fetch_array($query);

        $sql = mysqli_query($conn, "SELECT * FROM savingsAccount WHERE customerID=' ".$_SESSION['sess_accountID']."'") 
        or die (mysqli_error($conn));
        $rowSql = mysqli_fetch_array($sql);
        

    ?>
    
    <form class="contact-form" method="post" action="client_transfer.php">

        <!-- warning message to customer -->
        <div class="warning-message"> Please make sure you have sufficient funds in your accounts before transferring. </div>
        <!-- to account -->
        <div class="form-group">
        <label class="to-account">To Account:</label>
            <select class="to-mode" name="to-mode">
                <option value="<?php echo $rowSql['accountID'];?>"> Savings Account: <?php echo $rowSql['accountID'];?> $<?php echo $rowSql['balance'];?> </option>
                <option value="<?php echo $rowQuery['accountID'];?>"> Checking Account: <?php echo $rowQuery['accountID'];?> $<?php echo $rowQuery['balance'];?>  </option>
            </select>
        </div>

        <!-- amount to transfer -->
        <div class="amount-bg">
        <label class="amount">Amount: </label>
            <span class="money-sign">$</span>
            <input type="text" class="amount-form-control" name="amount" required>
        </div>

        <!--- from account -->
        <div class="form-group">
        <label class="from-account">From Account:</label>
            <select class="from-mode" name="from-mode">
                <option value="<?php echo $rowSql['accountID'];?>"> Savings Account: <?php echo $rowSql['accountID'];?> $<?php echo $rowSql['balance'];?>  </option>
                <option value="<?php echo $rowQuery['accountID'];?>"> Checking Account: <?php echo $rowQuery['accountID'];?> $<?php echo $rowQuery['balance'];?> </option>
            </select>
        </div>


        <div class="submit-section">
        <button input type="submit" class="submit-btn" name="submit">Make Transaction</button>
        </div>

    </form>

    <?php

    //make sure funds are sufficient
    if (isset($_POST['submit'])) {
        $customerID = $_SESSION['sess_accountID'];
        $toAccount = $_POST['to-mode'];
        $fromAccount = $_POST['from-mode'];
        $amount = $_POST["amount"];
        $date = date("Y-m-d");

        $query = mysqli_query($conn, "SELECT * FROM checkingAccount WHERE customerID=' ".$_SESSION['sess_accountID']."'") 
        or die (mysqli_error($conn));
        $rowQuery = mysqli_fetch_array($query);

        $sql = mysqli_query($conn, "SELECT * FROM savingsAccount WHERE customerID=' ".$_SESSION['sess_accountID']."'") 
        or die (mysqli_error($conn));
        $rowSql = mysqli_fetch_array($sql);

        if ($fromAccount == $rowQuery['accountID']) {
            if ($amount > $rowQuery['balance']) {
                ?>
                <script type="text/javascript">
                alert("Insufficient funds in Checking Account.");
                window.location = "client_transfer.php";
                </script>
                <?php
            }
            else {
                $query = "INSERT INTO cusTransaction (customerID, accountTo, accountFrom, date, amount)
                VALUES ('$customerID', '$toAccount', '$fromAccount', '$date', '$amount')";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                /* do the math to update accounts */
                
                if ($fromAccount == $rowSql['accountID']) {
                    $balance1 = $rowSql['balance'];
                    $balance1 = $balance1 - $amount;
                    $update1 = "UPDATE savingsAccount SET balance = '$balance1' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update1) or die(mysqli_error($conn));

                    $balance2 = $rowQuery['balance'];
                    $balance2 = $balance2 + $amount;
                    $update2 = "UPDATE checkingAccount SET balance = '$balance2' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update2) or die(mysqli_error($conn));
                }
                if ($fromAccount == $rowQuery['accountID']) {
                    $balance1 = $rowQuery['balance'];
                    $balance1 = $balance1 - $amount;
                    $update1 = "UPDATE checkingAccount SET balance = '$balance1' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update1) or die(mysqli_error($conn));

                    $balance2 = $rowSql['balance'];
                    $balance2 = $balance2 + $amount;
                    $update2 = "UPDATE savingsAccount SET balance = '$balance2' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update2) or die(mysqli_error($conn));
                }

                ?>
                <script type="text/javascript">
                alert("Successful Transaction");
                window.location = "client_homepage.php";
                </script>
                <?php
            }
        }
        else {
            if ($amount > $rowSql['balance']) {
                ?>
                <script type="text/javascript">
                alert("Insufficient funds in Checking Account.");
                window.location = "client_transfer.php";
                </script>
                <?php
            }
            else {
                $query = "INSERT INTO cusTransaction (customerID, accountTo, accountFrom, date, amount)
                VALUES ('$customerID', '$toAccount', '$fromAccount', '$date', '$amount')";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
                /* do the math to update accounts */
                if ($fromAccount == $rowSql['accountID']) {
                    $balance1 = $rowSql['balance'];
                    $balance1 = $balance1 - $amount;
                    $update1 = "UPDATE savingsAccount SET balance = '$balance1' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update1) or die(mysqli_error($conn));

                    $balance2 = $rowQuery['balance'];
                    $balance2 = $balance2 + $amount;
                    $update2 = "UPDATE checkingAccount SET balance = '$balance2' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update2) or die(mysqli_error($conn));
                }
                if ($fromAccount == $rowQuery['accountID']) {
                    $balance1 = $rowQuery['balance'];
                    $balance1 = $balance1 - $amount;
                    $update1 = "UPDATE checkingAccount SET balance = '$balance1' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update1) or die(mysqli_error($conn));

                    $balance2 = $rowSql['balance'];
                    $balance2 = $balance2 + $amount;
                    $update2 = "UPDATE savingsAccount SET balance = '$balance2' WHERE customerID = '$customerID'";
                    $result = mysqli_query($conn, $update2) or die(mysqli_error($conn));
                }
        
                ?>
                <script type="text/javascript">
                alert("Successful Transaction");
                window.location = "client_homepage.php";
                </script>
                <?php
            }
        }
    }

    ?>
    

</body>
</html>