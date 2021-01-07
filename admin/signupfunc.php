<?php


if (isset($_POST['submit'])) {
    include_once 'dbh.php';
   
$firstName =mysqli_real_escape_string($conn, $_POST['firstName']);
$middleName = mysqli_real_escape_string($conn,$_POST['middleName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
$User = mysqli_real_escape_string($conn,$_POST['username']);
$id = mysqli_real_escape_string($conn,$_POST['ID']);

$pass_Word = mysqli_real_escape_string($conn, $_POST['PassWord']);
$enable_disable = mysqli_real_escape_string($conn, $_POST['enable_disable']);



if (empty($firstName) || empty($lastName) || empty($User)|| empty($pass_Word)) {
    header("Location: CreateAccount.php?signup=empty");
    exit();
}else {
    // Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $firstName)|| !preg_match("/^[a-zA-Z]*$/", $lastName)|| !preg_match("/^[a-zA-Z]*$/", $middleName)) {
            header("Location: CreateAccount.php?signup=invalid");
        exit();
    } else {
       
        
            $sql = "SELECT * FROM systemAdmin WHERE adminID='$id' or adminUsername='$User'";
       
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
           
            if ($resultCheck > 0) {
                header("Location: CreateAccount.php?Signup=usertaken");
                exit();
            } else{
                $query = "INSERT INTO systemAdmin (adminID, adminUsername, adminPassword, a_firstName, a_middleName, a_lastName,enable_disable ) 
                VALUES ('$id', '$User', '$pass_Word', '$firstName', '$middleName', '$lastName','$enable_disable')";
                
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                echo '<script type="text/javascript">';
                echo ' alert("Create Admin Account Successful!")';  //not showing an alert box.
                echo '</script>';
                header("Location: admin_homepage.php?signup=success");
                exit();
              
            }
           
      
        }
    }
}



?>