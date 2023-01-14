<?php

session_start();

if(!isset($_SESSION['auth']))
{
    $path = __DIR__ . '/../auth/login.php';

    header("Location: {$path}");
}