<?php 
session_start();

	include("config.php");
	include("functions.php");

	$user_data = check_login($koneksi);

?>
<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id 	 = $_GET['id'];
	$gateway = $_GET['tmp'];
	$level_gateway = $user_data['level'];	

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM hasiltembak WHERE id='$id'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM hasiltembak WHERE id='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '
			<script>alert("Berhasil menghapus data."); document.location="'.$level_gateway.'/index_data.php?page=tmp_rvs_'.$gateway.'&tmp='.$gateway.'";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="'.$level_gateway.'/index_data.php?page=tmp_rvs_'.$gateway.'&tmp='.$gateway.'";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="'.$level_gateway.'/index_data.php?page=tmp_rvs_'.$gateway.'&tmp='.$gateway.'";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="'.$level_gateway.'/index_data.php?page=tmp_rvs_'.$gateway.'&tmp='.$gateway.'";</script>';
}

?>
