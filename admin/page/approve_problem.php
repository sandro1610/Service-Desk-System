<?php if (isset($_GET['v_key'])){
	$v_key = $_GET['v_key'];
	$sql = mysqli_query($link,"SELECT * FROM `tb_problem` WHERE v_key = '$v_key'");
	$result = mysqli_fetch_array($sql);
	$approve = $result['status'];

	if ($approve < 1) {
		$query = mysqli_query($link,"UPDATE tb_problem SET status = '1' WHERE v_key = '$v_key'");
		if ($query) {
			echo "<script>alert('Problem Successfully Send');</script>";
			echo "<script>window.location='?p=history_problem';</script>";
		}
	}elseif ($approve == 1) {
		$query = mysqli_query($link,"UPDATE tb_problem SET status = '2' WHERE v_key = '$v_key'");
		if ($query) {
			echo "<script>alert('Problem Approved');</script>";
			echo "<script>window.location='?p=history_problem';</script>";
		}
	}elseif ($approve == 2) {
		$query = mysqli_query($link,"UPDATE tb_problem SET status = '3' WHERE v_key = '$v_key'");
		if ($query) {
			echo "<script>alert('Problem Proccessing');</script>";
			echo "<script>window.location='?p=history_problem';</script>";
		}
	}elseif ($approve == 3) {
		$query = mysqli_query($link,"UPDATE tb_problem SET status = '4' WHERE v_key = '$v_key'");
		if ($query) {
			echo "<script>alert('Problem Finished');</script>";
			echo "<script>window.location='?p=history_problem';</script>";
		}
	}

} ?>