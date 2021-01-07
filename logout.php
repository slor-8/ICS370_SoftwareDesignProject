<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "<br><br><br><br><br><br>";
echo "<p align='center'><font color=blue size='8pt'>You've logged out successfully!</font><p>";


header("Refresh:2; url=home_page.php");
?>
