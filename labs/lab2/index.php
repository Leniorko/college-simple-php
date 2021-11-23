<?php

require 'massive.php';
require_once 'func.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$page = $_GET['parent'] ?? $_GET['page'];

	if (
		!array_key_exists($page, $menu) ||
		(isset($_GET['parent']) && !array_key_exists($_GET['page'], $menu[$page]['sub']))
	) {
		header("Location: " . $_SERVER['PHP_SELF'] . '?page=main');
		die();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu page</title>
</head>

<body>


	<link href="styles.css" rel="stylesheet" type="text/css">

	<div class="wrapper">

		<div class="g-menu">
			<?= menu($menu); ?>
		</div>

		<div class="v-menu">
			<?= isset($menu[$page]['sub']) ? menu($menu[$page]['sub'], true, $page) : '' ?>
		</div>

		<?php
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

</body>

</html>