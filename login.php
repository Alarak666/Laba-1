<?php
require_once("config.php");
if (!empty($_SESSION['user_id']))
{
    header("location: /login.php");
}
?>