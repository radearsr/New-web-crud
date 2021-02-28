<!-- Code Untuk Tambah Data -->
<?php 
include ('config.php');

if(isset($_POST["submit"])){

	$level 	  = $_POST["level"];
	$joki	  = $_POST["joki"];
	$alamat	  = $_POST["alamat"];
	$merchant = $_POST["merchant"];
	$barang   = $_POST["barang"];
	$jumlah   = $_POST["jumlah"];
	$harga    = $_POST["harga"];
	$resi 	  = $_POST["resi"];
	$bulan = array(
	'01' => 'Jan', 
	'02' => 'Feb',
	'03' => 'Mar',
	'04' => 'Apr',
	'05' => 'Mei',
	'06' => 'Jun',
	'07' => 'Jul',
	'08' => 'Agu',
	'09' => 'Sep',
	'10' => 'Okt',
	'11' => 'Nov',
	'12' => 'Des',
	);
	$date = date('d').' '.($bulan[date('m')]).' '.date('Y');

	$query = '';
	for ($count=0; $count < count($joki); $count++) {
		$level_clean	= mysqli_escape_string($koneksi, $level[$count]);
		$joki_clean		= mysqli_escape_string($koneksi, $joki[$count]);
		$alamat_clean 	= mysqli_escape_string($koneksi, $alamat[$count]);
		$merchant_clean = mysqli_escape_string($koneksi, $merchant[$count]);
		$barang_clean   = mysqli_escape_string($koneksi, $barang[$count]);
		$jumlah_clean 	= mysqli_escape_string($koneksi, $jumlah[$count]);
		$harga_clean 	= mysqli_escape_string($koneksi, $harga[$count]);
		$resi_clean 	= mysqli_escape_string($koneksi, $resi[$count]);


		if($merchant_clean != '' && $barang_clean != '' && $jumlah_clean != ''){

			$query .= '
			INSERT INTO hasiltembak(joki,nmalamat,merchant,barang,jumlah,harga,fee,resi,date_input) 
			VALUES("'.$joki_clean.'","'.$alamat_clean.'","'.$merchant_clean.'", "'.$barang_clean.'", "'.$jumlah_clean.'", "'.$harga_clean.'","0" ,"'.$resi_clean.'","'.$date.'");
			';
		}
	}
	if($query != ''){
		if(mysqli_multi_query($koneksi, $query)){
			echo '
			<script>alert("Data Berhasil Masuk."); document.location="'.$level_clean.'/index_data.php?page=tmbh_dt_'.$alamat_clean.'&dt='.$alamat_clean.'";</script>
			';
			
		}else{
			echo "Error";
		}

	}else{
		echo "All Fields are Required";
	}
}

 ?>


<!-- Code Untuk Tambah Data -->
<?php 
include ('config.php');

if(isset($_POST["input_barang"])){

	$barang   = $_POST["nama_barang"];
	$level 	  = $_POST["level"];
	$alamat   = $_POST["alamat"];

	$query = '';
	for ($count=0; $count < count($barang); $count++) {
		$barang_clean   = mysqli_escape_string($koneksi, $barang[$count]);
		$alamat_clean   = mysqli_escape_string($koneksi, $alamat[$count]);
		$level_clean	= mysqli_escape_string($koneksi, $level[$count]);
		
		if($barang_clean != ''){

			$query .= '
			INSERT INTO barang(nama_barang) 
			VALUES("'.$barang_clean.'");
			';
		}
	}
	if($query != ''){
		if(mysqli_multi_query($koneksi, $query)){
			echo '
			<script>alert("Data Berhasil Masuk."); document.location="'.$level_clean.'/index_data.php?page=tmbh_dt_'.$alamat_clean.'&dt='.$alamat_clean.'";</script>
			';
			
		}else{
			echo "Error";
		}

	}else{
		echo "All Fields are Required";
	}
}

 ?>