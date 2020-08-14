<?php
	include '../includes/conn.php';
	$dir = 'page/';
	if (isset($_GET['p'])) {
		$page = $_GET['p'];
		switch ($page) {
			case 'dashboard':
				include $dir.'dashboard.php';
				break;
			case 'problem':
				include $dir.'problem.php';
				break;
			case 'request':
				include $dir.'request.php';
				break;
			case 'history_request':
				include $dir.'history_request.php';
				break;
			case 'profile':
				include $dir.'profile.php';
				break;
			case 'report_problem':
				include $dir.'report_problem.php';
				break;
			case 'report_request':
				include $dir.'report_request.php';
				break;
			case 'history_problem':
				include $dir.'history_problem.php';
				break;
			default:
				include $dir.'blank.php';
				break;
		}
	} else {
		include $dir.'dashboard.php';
	}
?>