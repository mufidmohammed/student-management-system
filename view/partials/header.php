<?php 

require_once(dirname(__DIR__, 2) . '/app/redirect.php');

require_once(dirname(__DIR__, 2) . '/app/database.php');

$root = '/' . $_ENV['APP_ROOT'] . '/';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- DataTables css -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<!-- My CSS -->
	<link rel="stylesheet" href="<?=  $root . 'assets/css/style.css' ?>">

	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

	<title>Admin</title>
</head>
<body>