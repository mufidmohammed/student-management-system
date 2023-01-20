<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $table = htmlspecialchars($_GET['table']);
    
    // echo "<pre>";
    // var_dump($table, $_POST);
    // echo "</pre>";
    // return;

    require_once('database.php');

    $db = new Database();
    $db->insert($table, $_POST);

    $path = "../view/{$table}/index.php";
    header("Location: {$path}");
}