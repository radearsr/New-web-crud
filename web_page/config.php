<?php
//koneksi ke database mysql,

// db Local Xampp
$koneksi = mysqli_connect("localhost", "root", "", "mydata");

// db Hosting
// $koneksi = mysqli_connect("sql202.epizy.com", "epiz_27905230", "UQy0sos4tv", "epiz_27905230_mydatabase");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>
