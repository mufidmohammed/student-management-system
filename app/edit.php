<?php

require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $table = htmlspecialchars($_GET['table']);
    $row_id = htmlspecialchars($_GET['id']);

    // var_dump($table, $row_id);
    // return;

    $db = new Database();

    $db->update($table, $row_id, $_POST);

    $path = "../view/{$table}/index.php";
    header("Location: {$path}");
}