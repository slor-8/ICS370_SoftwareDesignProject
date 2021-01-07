<?php  
session_start();
require('dbh.php');

if (isset($_POST['submit'])){
	
// Assigning POST values to variables.
$username = $_POST['username'];
$password = $_POST['password'];

// CHECK FOR THE RECORD FROM TABLE
$sql = "SELECT * FROM customer WHERE cusUsername='$username' and cusPassword='$password'";
 
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

if (!$count == 1)
{   
    $sql = "SELECT * FROM systemAdmin WHERE adminUsername='$username' and adminPassword='$password'";
 
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $enable_disable = $row['enable_disable'];
    if (!$count == 1)
    {
        header('location: error.php');
    }
    else 
    {
        if ($enable_disable != 1) {
            ?>
            <script type="text/javascript">
            alert("Account has been disabled. Please contact us for assistance.");
            window.location = "home_page.php";
            </script>
            <?php
        }
        else {
        $query = "SELECT * FROM systemAdmin WHERE adminUsername='$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['sess_user'] = $row['adminUsername'];
        $_SESSION['sess_adminID'] = $row['adminID'];
        $_SESSION['sess_name'] = $row['a_firstName'];
        header('location: admin/admin_success.php');
        }
    }
}

else
{
    $sql = "SELECT * FROM customer WHERE cusUsername='$username' and cusPassword='$password'";
 
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $enable_disable = $row['enable_disable'];

    if ($enable_disable != 1) {
        ?>
        <script type="text/javascript">
        alert("Account has been disabled. Please contact us for assistance.");
        window.location = "home_page.php";
        </script>
        <?php
    }
    else {
    $query = "SELECT * FROM customer WHERE cusUsername='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['sess_user'] = $row['cusUsername'];
    $_SESSION['sess_accountID'] = $row['customerID'];
    $_SESSION['sess_fName'] = $row['c_firstName'];
    header('location: client/client_success.php');
    }
}
}

