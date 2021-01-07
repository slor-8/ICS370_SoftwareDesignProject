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
<div style= 'margin-top:-3.5%;margin-left:40%'>
<form method="POST" action="">
<center>Type First Name of the Admin:
<br>
  <input type="text" name="update">
<input style= 'marign-right:20%;width=150px;height=50px;font-size:15px;' type="submit" name ="Edit" value="Edit">
</form>
</div>
 <?php 
	$sql = "SELECT * FROM systemAdmin";
	$res_data = mysqli_query($conn,$sql);
	
	$queryResult = mysqli_num_rows ($res_data);
	
	
if(isset($_POST['view'])){
$search = $_POST['search'];


$query="SELECT * FROM systemAdmin where enable_disable= '$search' or a_firstName='$search' ";
$sql = mysqli_query($conn,$query);
$queryResult = mysqli_num_rows ($sql);

if($queryResult>0){
    while($row = mysqli_fetch_assoc($sql)){
		$enable_disable = $row['enable_disable'];

echo "<div >
<table>
<tr>
<th>admin ID</th>
<th>admin Username</th>
<th> admin Password</th>
<th>Name<th>
<th>Enable_disable</th>
</tr>
<tr>
<td>". $row['adminID']."</td>&nbsp;&nbsp;&nbsp;
<td> ". $row['adminUsername']. "&nbsp; &nbsp; </td>&nbsp;&nbsp;&nbsp;
<td>". $row['adminPassword']."</td>&nbsp;&nbsp;&nbsp;
<td>". $row['a_firstName']." &nbsp;&nbsp;&nbsp;".$row['a_middleName']."&nbsp;&nbsp;&nbsp;". $row['a_lastName']."</td>&nbsp;&nbsp;&nbsp;";


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

header('location: admin_edit_.php');

}
else {
}



	?>
     

		
	<div>
</body>
</html>
