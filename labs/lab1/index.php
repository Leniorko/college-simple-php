<?php

require 'massive.php';
require_once 'func.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$page = $_GET['parent'] ?? $_GET['page'];

	// if (!isset($page)) {
	// 	header("Location: " . $_SERVER["PHP_SCRIPT"] . "?page=main");
	// 	die();
	// }

	if (
		!array_key_exists($page, $menu) ||
		(isset($_GET['parent']) && !array_key_exists($_GET['page'], $menu[$page]['sub']))
	) {
		header("Location: " . $_SERVER['PHP_SELF'] . '?page=main');
		die();
	}
}
?>

<link href="styles.css" rel="stylesheet" type="text/css">

<div class="wrapper">

	<div class="g-menu">
		<?= menu($menu); ?>
	</div>

	<div class="v-menu">
		<?= isset($menu[$page]['sub']) ? menu($menu[$page]['sub'], true, $page) : '' ?>
	</div>

	<?
	if (isset($_GET['parent'])) {
		$fileName = $menu[$_GET['parent']]['sub'][$_GET['page']]['html'];
	} else {
		$fileName = $menu[$page]['html'];
	}
	if (file_exists(FILE_PATH_HTML . $fileName)) {
		include FILE_PATH_HTML . $fileName;
	}

	?>

</div>