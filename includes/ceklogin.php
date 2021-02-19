<?php 
require 'conn.php';
if (isset($_POST["submit"]) ){ 
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$email' ");
	if (mysqli_num_rows($query) == 1) {
		if ($result = mysqli_fetch_assoc($query)) {
			if (password_verify($password, $result["password"])) {
				session_start();
					$_SESSION['id_user'] = $result["id_user"];
					$_SESSION['email'] = $result["email"];
	                $_SESSION['password'] = $result["password"];
	                $_SESSION['id_section'] = $result['id_section'];
	                $_SESSION['level'] = strtolower($result['level']);
                if ($result['level'] == 'admin') {
                	echo "<script>window.location='../admin/index.php';</script>";
                }elseif ($result['level'] == 'manager') {
                	echo "<script>window.location='../manager/index.php';</script>";
                }elseif ($result['level'] == 'staff') {
                	echo "<script>window.location='../staff/index.php';</script>";
                }elseif ($result['level'] == 'engineer') {
                	echo "<script>window.location='../engineer/index.php';</script>"; 
                }elseif ($result['level'] == 'petugas') {
                	echo "<script>window.location='../petugas/index.php';</script>";         
                }else{
	                echo "<script>alert('Login Failed');</scrixpt>";
	                echo "<script>window.location='../index.php';</script>";	
            	}
			}else{
				echo "<script>alert('Wrong Password');</script>";
                echo "<script>window.location='../index.php';</script>";
			}
		}
	}else{
		echo "<script>alert('User 0');</script>";
		echo "<script>window.location='../index.php';</script>";
	}
}
 ?>