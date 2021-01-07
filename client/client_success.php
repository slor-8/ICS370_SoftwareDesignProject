<?php
session_start();
echo "<br><br><br><br><br><br>";
echo "<p align='center'><font color=green size='8pt'>You've logged in successfully!</font><p>";


header("Refresh:2; url=client_homepage.php");
?>
