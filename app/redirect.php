<?php

session_start();

$path = '/student-management-system' . '/auth/login.php';

if(!isset($_SESSION['auth']))
{
    header("Location: {$path}");
}
