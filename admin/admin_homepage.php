<?php  
session_start();
require('dbh.php');
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="admin-home-style.css">
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
    <h1 class="heading"><center> User Accounts: </h1>
	<div  style='margin-right:4%;'>

<form method="POST" action="">
	<center>Search for Account Disable or Enable :
	
		<center> Diabled = 0 and Enabled =1:
		<br>
    <input type="text" name="search">
	<input style= 'width=100px;height=50px; font-size:15px;'type="submit" name ="view" value="Search">
	
</form>
<div >
<?php

?>

<div style= 'margin-top:-3.55%;margin-left:40%'>
<form method="POST" action="">
<center>Type First Name of the Customer:
<br>
  <input type="text" name="update">
<input style= 'marign-right:20%;width=150px;height=50px;font-size:15px;' type="submit" name ="Edit" value="Edit">
</form>
</div>
 <?php 
	$sql = "SELECT * FROM customer";
	$res_data = mysqli_query($conn,$sql);
	
	$queryResult = mysqli_num_rows ($res_data);
	
	
if(isset($_POST['view'])){
$search = $_POST['search'];


$query="SELECT * FROM customer where enable_disable= '$search' or c_firstName='$search' ";
$sql = mysqli_query($conn,$query);
$queryResult = mysqli_num_rows ($sql);

if($queryResult>0){
    while($row = mysqli_fetch_assoc($sql)){
		$enable_disable = $row['enable_disable'];

echo "<div ><table>
<tr>
<th>customerID</th>
<th>Name</th>
<th>cusUsername</th>
<th>cusPassword</th>
</tr>
<tr><td>". $row['customerID']."</td>&nbsp;&nbsp;&nbsp;
<td> ". $row['c_firstName']. "&nbsp; &nbsp; ".$row['c_lastName']."</td>&nbsp;&nbsp;&nbsp;
<td>". $row['cusUsername']."</td>&nbsp;&nbsp;&nbsp;
<td>". $row['cusPassword']."</td>&nbsp;&nbsp;&nbsp;";


if ($enable_disable == 1) {
	echo '<td> Enabled </td>';
}
else {
	echo '<td> Disabled </td>';
}
"</tr></table></div>";

	}

}
    
    else{
		echo "No Result Found  <br>";
		exit;
		
	}

 	
}

if(isset($_POST['Edit'])){
	$update =mysqli_real_escape_string($conn, $_POST['update']);
	$_SESSION['updateInput'] = $update; 

header('location: admin_edit_client.php');

}
else {
}



	?>
     

		
	<div>
</body>
</html>
