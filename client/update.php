<!DOCTYPE html>
<html lang="en-US">
  <head>
  </head>
    <div class="main-bg"> </div>
    <h1 class="heading"> Contact Information </h1>
    
    <div class="client-name"><?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];?></div>
    <form class="contact-form" method="post" action="client-settings1.php">
        <div class="street-num-bg">
        <label class="street-num">Street Number</label>
            <input type="text" class="num-form-control" name="streetNum" value="'.<?php echo $row['streetNum'];?>.'"required>
        </div>

        <div class="street-name-bg">
        <label class="street-name">Street Name</label>
            <input type="text" class="street-form-control" name="streetName" value=".<?php echo $row['streetName'];?>.'"required>
        </div>
            
        <div class="city-name-bg">
        <label class="city-name">City</label>
            <input type="text" class="city-form-control" name="cityName" value=".<?php echo $row['city'];?>.''"required>
        </div>

        <div class="state-name-bg">
        <label class="state-name">State</label>
            <input type="text" class="state-form-control" name="stateName" value=".<?php echo $row['stateName'];?>.'"required>
        </div>

        <div class="zipcode-bg">
        <label class="zipcode">Zip Code</label>
            <input type="text" class="zipcode-form-control" name="zipcode" value=".<?php echo $row['zipcode'];?>.'"required>
        </div>

        <div class="submit-section">
        <button type="submit" class="submit-btn" name="submit">Save Changes</button>
        </div>

    </form>
      </html>
      <?php
      session_start();
      include 'connection.php';
if(isset($_POST['submit'])){
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $query=mysqli_query($db,"SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  $_SESSION["id"]=$row['user_id'];
if ($num_rows>0)
{
    ?>
    <script>
      alert('Successfully Log In');
      document.location='profile.php'
    </script>
    <?php
}
}
      ?>