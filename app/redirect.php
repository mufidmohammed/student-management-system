<?php

if(!isset($_SESSION['auth']))
{
    header("Location: auth/login.php");
}