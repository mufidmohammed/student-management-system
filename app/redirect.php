<?php

session_start();

$path = dirname(__DIR__) . '/auth/login.php';

if(!isset($_SESSION['auth']))
{
    header("Location: " . $path);
}
