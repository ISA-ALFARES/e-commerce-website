<?php

session_start(); //The  session start...
session_unset(); //Unset the session..
session_destroy();//Destroy the session...
header('Location: index.php');//Transfer it to the indx.php page
exit(); // log

?>