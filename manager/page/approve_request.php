<?php if (isset($_GET['v_key'])){
	$v_key = $_GET['v_key'];
	$sql = mysqli_query($link,"SELECT * FROM `tb_request` WHERE v_key = '$v_key'");
	$result = mysqli_fetch_array($sql);
	$approve = $result['status'];

	if ($approve < 1) {
		$query = mysqli_query($link,"UPDATE tb_request SET status = '1' WHERE v_key = '$v_key'");
		if ($query) {
			echo "<script>alert('Request Successfully Send');</script>";
			echo "<script>window.location='?p=history_request';</script>";
		}
	}
} ?>