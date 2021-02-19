<?php
if (isset($_GET['id_user'])) {
    $id_user     = $_GET['id_user'];
    $sql    = "DELETE FROM tb_user WHERE id_user='$id_user'";
    $query  = mysqli_query($link,$sql);
    if($query){
		echo "<script>alert('Data Successfully Deleted');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}else{
		echo "<script>alert('Data Failed To Delete');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}
}elseif (isset($_GET['id_item'])) {
    $id_item     = $_GET['id_item'];
    $sql    = "DELETE FROM tb_item WHERE id_item='$id_item'";
    $query  = mysqli_query($link,$sql);
    if($query){
		echo "<script>alert('Data Successfully Deleted');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}else{
		echo "<script>alert('Data Failed To Delete');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}
}elseif (isset($_GET['id_service'])) {
    $id_service     = $_GET['id_service'];
    $sql    = "DELETE FROM tb_service WHERE id_service='$id_service'";
    $query  = mysqli_query($link,$sql);
    if($query){
		echo "<script>alert('Data Successfully Deleted');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}else{
		echo "<script>alert('Data Failed To Delete');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}
}elseif (isset($_GET['id_section'])) {
    $id_section     = $_GET['id_section'];
    $sql    = "DELETE FROM tb_section WHERE id_section='$id_section'";
    $query  = mysqli_query($link,$sql);
    if($query){
		echo "<script>alert('Data Successfully Deleted');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}else{
		echo "<script>alert('Data Failed To Delete');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}
}elseif (isset($_GET['id_request'])) {
    $id_request     = $_GET['id_request'];
    $sql    = "DELETE FROM tb_kind_req WHERE id_request='$id_request'";
    $query  = mysqli_query($link,$sql);
    if($query){
		echo "<script>alert('Data Successfully Deleted');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}else{
		echo "<script>alert('Data Failed To Delete');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}
}
?>