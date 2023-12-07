<?php
session_start();
if(isset($_SESSION['login'])){
if((session_unset())&&(session_destroy()))
	{header('location:index.php');}
} else {header('location:index.php');}

?>