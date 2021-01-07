<?php


if (isset($_POST['submit'])) {
    include_once 'dbh.php';
   
$firstName =mysqli_real_escape_string($conn, $_POST['firstName']);
$middleName = mysqli_real_escape_string($conn,$_POST['middleName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
$User = mysqli_real_escape_string($conn,$_POST['username']);
$id = mysqli_real_escape_string($conn,$_POST['ID']);

$pass_Word = mysqli_real_escape_string($conn, $_POST['PassWord']);
$person_Type = mysqli_real_escape_string($conn, $_POST['person_Type']);
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
       
       
                    $sql = "SELECT * FROM customer WHERE customerID='$id' or cusUsername='$User'";
               
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    var_dump($result);
                    exit;
                    if ($resultCheck > 0) {
                        header("Location: CreateAccount.php?Signup=usertaken");
                        exit();
                    } else{
                    
                // Insert the user into the database
                $query = "INSERT INTO customer (customerID,c_firstName,c_middleName, c_lastName, cusUsername, cusPassword,enable_disable) 
                VALUES ('$id', '$firstName', '$middleName', '$lastName', '$User', '$pass_Word','$enable_disable')";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                echo '<script type="text/javascript">';
                echo ' alert("Create Customer Account Successful!")';  //not showing an alert box.
                echo '</script>';
                ?>
                <script type="text/javascript">
                alert("Admin Account Successful Create!");
                window.location = "admin_homepage.php?signup=success";
                </script>
               <?php
                exit();
                }
            }
            }
      
        }
    




?>