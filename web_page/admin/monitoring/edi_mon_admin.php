<?php include('../../config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM hasiltembak WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '	<div class="alert alert-danger">
  							ID tidak ada dalam database.
  							<a type="button" href="index_data.php?page=monitoring_user" class="close">x
  							</a>
						</div>';
				// echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$id 		= $_POST['id']; 
			$joki		= $_POST['joki'];
			$alamat		= $_POST['alamat'];
			$merchant	= $_POST['merchant'];
			$barang		= $_POST['barang'];
			$jumlah		= $_POST['jumlah']; 
			$harga		= $_POST['harga'];
			$fee		= $_POST['fee'];
			$resi		= $_POST['resi'];

			$sql = mysqli_query($koneksi, "UPDATE hasiltembak SET joki='$joki', nmalamat='$alamat', merchant='$merchant', barang='$barang', jumlah='$jumlah', harga='$harga', fee='$fee',resi='$resi' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<div class="alert alert-success" role="alert">
  							Berhasil Mengedit Data.
  							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">x</span>
							</button>
						</div>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index_data.php?page=edit_mntr&id=<?php echo $id; ?>" method="post">
			<!-- Menampilkan ID Tanpa Bisa diEdit -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
			<!-- Form 1 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Joki</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="joki" class="form-control" value="<?php echo $data['joki']; ?>" required>
				</div>
			</div>
			<!-- Form 2 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['nmalamat']; ?>" required>
				</div>
			</div>
			<!-- Form 3 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Merchant</label>
				<div class="col-md-6 col-sm-6">
					<select name="merchant" class="form-control" required>
						<option value="">Pilih Merchant</option>
						<option value="Lazada" <?php if($data['merchant'] == 'Lazada'){ echo 'selected'; } ?>>Lazada</option>

						<option value="Jd.id" <?php if($data['merchant'] == 'Jd.id'){ echo 'selected'; } ?>>Jd.id</option>

						<option value="Mi Store" <?php if($data['merchant'] == 'Mi Store'){ echo 'selected'; } ?>>Mi Store</option>
					</select>
				</div>
			</div>
			<!-- Form 4 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Barang</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="barang" class="form-control" value="<?php echo $data['barang']; ?>" required>
				</div>
			</div>
			<!-- Form 5 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" required>
				</div>
			</div>
			<!-- Form 6 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
				</div>
			</div>
			<!-- Form 7 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Fee</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="fee" class="form-control" value="<?php echo $data['fee']; ?>" required>
				</div>
			</div>
			<!-- Form 8 -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No.Resi</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="resi" class="form-control" value="<?php echo $data['resi']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index_data.php?page=monitoring_user" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
