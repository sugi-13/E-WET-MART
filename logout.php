<?php 

session_start();
session_destroy();

header("Location: demo2.php");

?>