<?php  
session_start();
require('dbh.php');

?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="client-settings-style.css">
	<link rel="stylesheet" href="admin-home.css">

</head>
<body>
	<!-- main client header/nav -->
	<?php
      include ("admin_header.php");
     
      

  ?>
  <?php
  $id = $_SESSION['sess_adminID'];
  $search = $_SESSION['updateInput'];
  $query = "SELECT * FROM customer, cusContact,cusAddress
  WHERE customer.adminID = '$id' and customer.c_firstName = '$search' ";
  
 
  $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
  $row = mysqli_fetch_array($result);
  
  
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
    <h1 class="heading"> User Accounts </h1>

    <!-- update client information -->


    
    <form method="post" action="#" >
    <div class="form-group">
        <label  class="username-bg" ">UserName: </label>
        <input type="text" class="num-form-control" name="customerID" value="<?php echo $row['customerID'];?>"required diabled">

        </div>
          <div class="form-group">
        <label  class="username-bg" ">UserName: </label>
        <input type="text" class="num-form-control" name="customerID" value="<?php echo $row['cusUsername'];?>"required diabled">

        </div>
    
        <div class="form-group" > 
        <label class="password">Password</label>
            <input type="text" class="num-form-control" name="password" value="<?php echo $row['cusPassword'];?>"required>
        </div>
        <div class="form-group" >
        <label class="first-name">First Name</label>
            <input type="text" class="num-form-control" name="first" value="<?php echo $row['c_firstName'];?>"required>
        </div>

        <div class="form-group" >
        <label class="middle-name">Middle Name</label>
            <input type="text" class="num-form-control" name="middle" value="<?php echo $row['c_middleName'];?>"required>
        </div>

        <div class="form-group" >
        <label class="last-name">Last Name</label>
            <input type="text" class="num-form-control" name="last" value="<?php echo $row['c_lastName'];?>"required>
        </div>

        <div class="form-group" >
        <label class="street-num">Street Number</label>
            <input type="text" class="num-form-control" name="streetNum" value="<?php echo $row['streetNum'];?>"required>
        </div>

        <div class="form-group" >
        <label class="street-name">Street Name</label>
            <input type="text" class="street-form-control" name="streetName" value="<?php echo $row['streetName'];?>"required>
        </div>
            
        <div class="form-group" >
        <label class="city-name">City</label>
            <input type="text" class="city-form-control" name="cityName" value="<?php echo $row['cityName'];?>"required>
        </div>

        <div class="form-group">
        <label class="state-name">State</label>
            <input type="text" class="state-form-control" name="stateName" value="<?php echo $row['stateName'];?>"required>
        </div>

        <div class="form-group" >
        <label class="zipcode">Zip Code</label>
            <input type="text" class="zipcode-form-control" name="zipcode" value="<?php echo $row['zipcode'];?>"required>
        </div>

        <div class="form-group">
        <label class="primary-num">Primary Number</label>
            <input type="text" class="primary-form-control" name="primaryNum" value="<?php echo $row['primaryNum'];?>"required>
        </div>

        <div class="form-group" >
        <label class="secondary-num">Secondary Number</label>
            <input type="text" class="seconday-form-control" name="secondaryNum" value="<?php echo $row['secondaryNum'];?>"required>
        </div>

        <div class="form-group">
            <label class="email">E-mail</label>
                <input type="text" class="email-form-control" name="email" value="<?php echo $row['email'];?>"required>
        </div>
        
        <div class="form-group">
        <label class="enable-disable">Enable/Disable</label>
            <select name="enable-disable-mode">
                <option value="1">Enable</option>
                <option value="0">Disable</option>
            </select>
        </div>

            <br>
            <br>
          <div class="form-group">
            <input type="submit" name="submit" id="reload_page" type="button" value="submit" style="width:20em; margin:0;"><br><br>
          </div>
        </form>
      </div>
      </body>
      </html>
      <?php
      if(isset($_POST['submit'])){
        
        $customerID = $_POST['customerID'];
        $password = $_POST['password'];
        $firstName = $_POST['first'];
        $middleName = $_POST['middle'];
        $lastName = $_POST['last'];
        $streetNum = $_POST['streetNum'];
        $streetName = $_POST['streetName'];
        $cityName = $_POST['cityName'];
        $stateName = $_POST['stateName'];
        $zipcode = $_POST['zipcode'];
        $primaryNum = $_POST["primaryNum"];
        $secondaryNum = $_POST["secondaryNum"];
        $email = $_POST["email"];
        $enable_disable = $_POST["enable-disable-mode"];

      $query = "UPDATE customer,systemAdmin,cusContact ,cusAddress
                            SET 
                            customer.cusPassword = '$password',customer.enable_disable = '$enable_disable',
                            customer.c_firstName = '$firstName', customer.c_middleName = '$middleName',
                            customer.c_lastName = '$lastName', 
                            cusAddress.streetNum = '$streetNum',
                            cusAddress.streetName = '$streetName', 
                            cusAddress.cityName = '$cityName', 
                            cusAddress.stateName = '$stateName',
                             cusAddress.zipcode = '$zipcode', 
                             cusContact.primaryNum = '$primaryNum', 
                             cusContact.secondaryNum = '$secondaryNum', 
                             cusContact.email = '$email'

                      WHERE customer.c_firstName = '$search'  and systemAdmin.adminID= '$id'";
           
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    
                    

        ?>            <script>
        window.location.href="admin_homepage.php";
</script>
        <?php
             }               
?>