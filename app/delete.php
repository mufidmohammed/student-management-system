<?php

require_once('database.php');

$table = htmlspecialchars($_GET['table']);
$id = htmlspecialchars($_GET['id']);

// var_dump($table, $id);

// return;

$db = new Database();

$db->delete($table, $id);

$path = "../view/{$table}/index.php";
header("Location: {$path}");
