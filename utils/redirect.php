<?php
session_start();
if (!isset($_SESSION['u_name']))
{
    header("Location: http://localhost:8080/Matcha/index.php");
}
?>