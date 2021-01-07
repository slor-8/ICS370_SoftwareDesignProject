<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="client-settings-style.css">
	<link rel="stylesheet" href="admin-home.css">

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
        <a href="CreateAccount.php">Create User Account</a>
    </div>
    <div class="manage-admins" style="float:left">
        <a href="admin_list_display.php">Admin Information</a>
    </div>	
    </nav>

    
    <div class="main-bg"> </div>
    <h1 class="heading"> Create Account </h1>
    </div>
    <div class="signupInfo">
    
    <form   class="signupInfo" method="POST" action="signupfunc.php">
     
     
      <div class="all_input"> 
   
     
        
      <div class="acct">
             <Label class="Account_Info">ID</Label>
         <input type="text" name="ID" value="" id="ID" require></input>
         </div>

        <div class="acct">
             <Label class="Account_Info">First Name </Label>
         <input type="text" name="firstName" value="" id="firstName" require></input>
         </div>
         
        
         <div class="acct">
         <Label class="Account_Info">Middle Name </Label>
         <input type="text" name="middleName" value=""id="middleName" require></input>
         </div>

         <div class="acct">
         <Label class="Account_Info">Last Name </Label>
         <input type="text" name="lastName" value=""id="lastName" require></input>
         </div>

         <div class="acct">
         <Label class="Account_Info">UserName </Label>
         <input type="text" name="username" value="" id="username" require></input>
         </div>

         <div class="acct">
         <Label class="Account_Info">PassWord </Label>
         <input type="text" name="PassWord" id="PassWord" placeholder="PassWord" maxlength="16" require></input>
         </div>

         <div class="acct">
      <Label class="Account_Info">Select Account Type:</Label>
         <select name="person_Type" id="person_Type">
            <option value="Admin">Admin</option>
            <option value="Customer">Customer</option>
            </select>
            </div>
            
        
         <div class="acct">
         <label class="Account_Info">Enable/Disable</label>
            <select name="enable_disable">
                <option value="1">Enable</option>
                <option value="0">Disable</option>
                </select>
            </div>
            <br>
            
         
         </div>
         <div class="acct">
            <input style="width:150px;height:25px;"type="submit" name="submit" id="createAccount" value="Create Account"></input>
            </div>

</form>
  
   
   </body>


</html>

