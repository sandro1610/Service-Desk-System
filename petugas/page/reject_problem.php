<?php 
if (isset($_GET['v_key'])){
	$v_key = $_GET['v_key'];
	$sql = mysqli_query($link,"SELECT * FROM `tb_problem` WHERE v_key = '$v_key'");
	$result = mysqli_fetch_array($sql);
	$approve = $result['status'];
	if ($sql) {
		$query = mysqli_query($link,"UPDATE tb_problem SET status = '9' WHERE v_key = '$v_key'");
		if ($query) {
			echo "<script>alert('Problem Rejected');</script>";
			echo "<script>window.location='?p=history_problem';</script>";
		}
	}
}

?>