<?php

$host = "localhost";
$dbname = "isds";
$username = "root";
$password = "";

$link = mysqli_connect($host,$username,$password,$dbname);
	if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}