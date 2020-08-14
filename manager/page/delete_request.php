<?php
if (isset($_GET['no_ticket'])) {
    $no_ticket     = $_GET['no_ticket'];
    $sql    = "DELETE FROM tb_request WHERE no_ticket='".$no_ticket."'";
    $query  = mysqli_query($link,$sql);
    if($query){
		echo "<script>alert('Data Successfully Deleted');</script>";
		echo "<script>window.location='?p=history_request';</script>";
	}else{
		echo "<script>alert('Data Failed To Delete');</script>";
		echo "<script>window.location='?p=history_request';</script>";
	}
}
?>