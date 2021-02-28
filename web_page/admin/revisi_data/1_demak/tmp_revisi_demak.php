<?php
//memasukkan file config.php
include('../../config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Hasil Tembak(Demak)</font></center>
		<hr>
		<a href="index_data.php?page=tmbh_dt_Demak&dt=Demak"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th style="display: none;">Nama Joki</th>
					<th>Merchant</th>
					<th>Barang</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Fee</th>
					<th>No.Resi</th>					
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$data_tampil = $_GET['tmp'];
				$sql = mysqli_query($koneksi, "SELECT * FROM hasiltembak WHERE nmalamat='$data_tampil' ") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td style="display: none;">'.$data['joki'].'</td>
							<td>'.$data['merchant'].'</td>
							<td>'.$data['barang'].'</td>
							<td>'.$data['jumlah'].'</td>
							<td>'.$data['harga'].'</td>
							<td>'.$data['fee'].'</td>
							<td>'.$data['resi'].'</td>					
							<td>
								<a href="index_data.php?page=rvs_data&id='.$data['id'].'&edi='.$data_tampil.'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="../delete.php?id='.$data['id'].'&tmp='.$data_tampil.'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="7">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>

