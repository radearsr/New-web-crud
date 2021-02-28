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
	<script type="text/javascript">
	    $(document).ready(function(a){
	      // Variable Untuk Menambah Form
	      var html = '<p><div><tr><td style="display:none"><input type="hidden" name="alamat[]" value="<?php echo $_GET['dt'] ?>"></td><td style="display:none"><input type="hidden" name="level[]" value="<?php echo $user_data['level'] ?>"></td><td><input class="form-control" type="text" name="nama_barang[]" id="childnama_barang"></td><td><input class="btn btn-danger" type="button" id="remove_table" value="x"></td></tr></div></p>';

	      // Menambahkan Form Ke Bawah Form Yang Sudah Ada
	      $("#add_table").click(function(a){

	        $("#container_popup").append(html);

	      });
	      // Menghapus Form Yang Sudah Ada
	      $("#container_popup").on('click','#remove_table',function(a){
	        $(this).parent('div').remove();
	      });
	    });
	</script>	  
 </head>  
 <body>
    <center>
	 	<h1>Tambah Data (Bandung)</h1>
    </center>
	<br>
	<br>
	<input type="button" name="view" value="List Barang" data-toggle="modal" data-target="#display_data" class="btn btn-primary " /> 
	<input type="button" name="view" value="Tambah Barang" data-toggle="modal" data-target="#add_data_popup" class="btn btn-warning " />
	<br>
	<p></p>
<!-- 												Form Inline Untuk Input Data 									-->
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
								include "../../config.php";
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

	<!--								Tampilan Pop Up untuk  Manage Daftar Barang 							-->
<div id="display_data" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <!-- Bagian Header Pop Up -->
   <div class="modal-header">
   	 <h4 class="modal-title">List Nama Barang</h4>
     <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>    
   <!-- Bagian Body Pop up -->
   <div class="modal-body">
      <center>
		<div class="table-responsive">
			<table class="table table-striped jambo_table bulk_action">
				<thead>
					<tr>
						<th>Daftar Nama Barang</th>
						<th>Tindakan</th>
					</tr>
				</thead>		
				<tbody>
					
					<?php 
						include '../../config.php';
						$sql = mysqli_query($koneksi, "SELECT * FROM barang") or die(mysqli_error($koneksi));
						$alamat = $_GET['dt'];
						if(mysqli_num_rows($sql) > 0){
							while($data = mysqli_fetch_assoc($sql)){
								echo'<tr>
										<td style="display:none"><input type="hidden" name="alamat[]" value="'.$alamat.'"></td>
										<td>'.$data['nama_barang'].'</td>
										<td><a class="btn btn-danger" href="add_data/delete-barang.php?id='.$data['id_barang'].'&al='.$alamat.'">Delete</a></td>
									 </tr>
								';	
							}
						}else{
							echo '<td>Tidak Ada Data.</td>';
						}
					?>		
				</tbody>		
			</table>
		</div>
      </center> 
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
   </div>
  </div>
 </div>
</div>


<!--										Tampilan Pop Up untuk Tambah Data Barang 								-->
<div id="add_data_popup" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <!-- Bagian Header Pop Up -->
  <div class="modal-header">
  	<h4 class="modal-title">Tambah Data Untuk List Barang</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>    
   <!-- Bagian Body Pop up -->
   <div class="modal-body">
      <center>
        <form method="POST" action="../insert-data.php">
          <div class="form-inline" id="container_popup">
            <table>
              <tr>
                <td><label>Nama Barang</label></td>
              </tr>

              <tr>        
              	<td style="display:none">
              		<input type="hidden" name="alamat[]" value="<?php echo $_GET['dt'] ?>">
              	</td>
              	<td style="display:none">
					<input type="hidden" name="level[]" value="<?php echo $user_data['level'] ?>">
				</td>
                <td>
                	<input class="form-control" type="text" name="nama_barang[]" id="nama_barang" required="">
                </td>
                <td><input class="btn btn-success" type="button" id="add_table" value="+"></td>
              </tr>
            </table>
          </div>
          <br>
          <input type="submit" class="btn btn-dark" name="input_barang" value="SIMPAN">
        </form>
      </center> 
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
   </div>
  </div>
 </div>
</div>