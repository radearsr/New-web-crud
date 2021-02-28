<html>  
 <head> 
  <script src="../assets/jquery/dist/jquery.min.js"></script>  
	<script type="text/javascript">
		$(document).ready(function(e){
			// Variable Untuk Menambah Form
			var html = '<p/><div class="form-inline"><tr><td><input type="hidden" name="alamat[]" value="<?php echo $_GET['dt'] ?>"></td><td><input type="hidden" name="joki[]" value="<?php echo $user_data['nama_lengkap']; ?>"></td><td style="display:none"><input type="hidden" name="level[]" value="<?php echo $user_data['level'] ?>"></td><td><select class="form-control" name="merchant[]" id="childmerchant"><option value="Pilih">Pilih</option><option value="Lazada">Lazada</option><option value="Mi Store">Mi Store</option><option value="Jd.Id">Jd.Id</option></select></td><td><select class="form-control" name="barang[]" id="barang"><option value="Pilih">Pilih Barang</option><?php 
								$konek_data = mysqli_connect("localhost", "root", "", "mydata");

								$sql = mysqli_query($konek_data, "SELECT * FROM `barang`") or die(mysqli_error($konek_data));
								if(mysqli_num_rows($sql) > 0){
									while($data = mysqli_fetch_assoc($sql)){
										echo'<option value="'.$data['nama_barang'].'">'.$data['nama_barang'].'</option>';	
									}
								}else{
									echo '<option value="Not Found" disabled="true"></option>';
								}
							?>
				</select></td><td><select class="form-control" type="text" name="jumlah[]" id="jumlah"><option value="1"> 1 .</option><option value="2"> 2 .</option><option value="3"> 3 .</option><option value="4"> 4 .</option><option value="5"> 5 .</option></select></td><td><input class="form-control" type="text" name="harga[]" id="chlidharga"/></td><td><input class="form-control" type="text" name="resi[]" id="childresi"/></td><td><input class="btn btn-danger" type="button" id="remove" value="x"></td></tr></div><p/>';

			// Menambahkan Form Ke Bawah Form Yang Sudah Ada
			$("#add").click(function(e){

				$("#container").append(html);

			});
			// Menghapus Form Yang Sudah Ada
			$("#container").on('click','#remove',function(e){
				$(this).parent('div').remove();
			});
		});
	</script>  
 </head>  
 <body>
    <center>
	 	<h1>Tambah Data (Demak)</h1>
    </center>
	<br>
	<br>
	<br>
<form method="POST" action="../insert-data.php">
	<div class="form-inline" id="container">
			<table>
				<tr>
					<td><b>Merchant</b></td>
					<td><b>Barang</b></td>
					<td><b>Jumlah</b></td>
					<td><b>Harga</b></td>
					<td><b>No.Resi</b></td>
				</tr>
			
				<tr>
					<td style="display:none">
						<input type="hidden" name="alamat[]" value="<?php echo $_GET['dt'] ?>">
					</td>
					<td style="display:none">
						<input type="text" name="joki[]" value="<?php echo $user_data['nama_lengkap']; ?>">
					</td>
					<td style="display:none">
						<input type="hidden" name="level[]" value="<?php echo $user_data['level'] ?>">
					</td>
					<td>
						<select class="form-control" name="merchant[]" id="merchant" required="">
							<option value="Pilih">Pilih</option>
							<option value="Lazada">Lazada</option>
							<option value="Mi Store">Mi Store</option>
							<option value="Jd.id">Jd.id</option>
						</select>
					</td><p></p>

					<td>
						<select class="form-control" name="barang[]" id="barang" required="">
							<option value="Pilih">Pilih Barang</option>
							<?php 
								include '../../config.php';
								$sql = mysqli_query($koneksi, "SELECT * FROM `barang`") or die(mysqli_error($koneksi));
								if(mysqli_num_rows($sql) > 0){
									while($data = mysqli_fetch_assoc($sql)){
										echo'<option value="'.$data['nama_barang'].'">'.$data['nama_barang'].'</option>';	
									}
								}else{
									echo '<option value="Not Found" disabled="true"></option>';
								}
							?>
						</select>
					</td>
					<td>
						<select class="form-control" type="text" name="jumlah[]" id="jumlah" required="">
							<option value="1"> 1 .</option>
							<option value="2"> 2 .</option>
							<option value="3"> 3 .</option>
							<option value="4"> 4 .</option>
							<option value="5"> 5 .</option>
						</select>
					</td>
					<td><input class="form-control" type="text" name="harga[]" id="harga"/ required=""></td>
					<td><input class="form-control" type="text" name="resi[]" id="resi"/ required=""></td>
					<td><input class="btn btn-success" type="button" id="add" value="+" required=""></td>
				</tr>
			</table>
	</div>
	<br>	
	<input class="btn btn-dark" type="submit" name="submit" value="Simpan">	
</form>
 </body>  
</html>  
