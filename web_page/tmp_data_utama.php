<div class="container" style="margin-top:20px">
	<center><font size="6">Data Hasil Tembak</font></center>
	<hr>
	<!-- <a href="index_data.php?page=tambah_data"><button class="btn btn-dark right">Tambah Data</button></a> -->
	<div class="table-responsive">
	<table class="table table-striped jambo_table bulk_action">
		<thead>
			<tr>
				<th>Merchant</th>
				<th>Barang</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Fee</th>
				<th>No.Resi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			//query ke database SELECT tabel hasil Tembak urut berdasarkan id yang paling besar
			$sql = mysqli_query($koneksi, "SELECT * FROM `hasiltembak` ORDER BY `hasiltembak`.`nmalamat` ASC") or die(mysqli_error($koneksi));

			//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
			if(mysqli_num_rows($sql) > 0){
				//melakukan perulangan while dengan dari dari query $sql
				while($data = mysqli_fetch_assoc($sql)){
					//menampilkan data perulangan
					echo '
					<tr>
						<td>'.$data['merchant'].'</td>
						<td>'.$data['barang'].' ['.$data['date_input'].']</td>
						<td>'.$data['jumlah'].'</td>
						<td>'.$data['harga'].'</td>
						<td>'.$data['fee'].'</td>							
						<td>'.$data['resi'].'</td>
					</tr>
					';
				}
			//jika query menghasilkan nilai 0
			}else{
				echo '
				<tr>
					<td colspan="6">Tidak ada data.</td>
				</tr>
				';
			}
			?>
		<tbody>
	</table>
</div>
</div>
