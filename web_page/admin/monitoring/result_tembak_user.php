<html>
  <head>
  </head>
  <div class="container" style="margin-top:20px">
      <center><font size="6">Hasil Tembak(<?php echo $_POST['info']?>)</font></center>
      <hr>
      <button class="btn btn-warning right" data-toggle="modal" data-target="#add_data_Modal<?php echo $_POST['num']?>">Rincian Profile</button>
      <a href="index_data.php?page=monitoring_user"><button class="btn btn-primary right">Kembali Ke Daftar</button></a>
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
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "config.php";
          $nama1 = $_POST['info'];
          //query ke database SELECT tabel hasil Tembak urut berdasarkan id yang paling besar
          $sql = mysqli_query($koneksi, "SELECT * FROM `hasiltembak` WHERE joki='$nama1' OR joki='$nama2'") or die(mysqli_error($koneksi));
          //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
          if(mysqli_num_rows($sql) > 0){
            
            //membuat variabel $no untuk menyimpan nomor urut
            $no = 1;
            //melakukan perulangan while dengan dari dari query $sql
            while($data = mysqli_fetch_assoc($sql)){
              //menampilkan data perulangan
              echo '
              <tr>
                <td>'.$data['merchant'].'</td>
                <td>'.$data['barang'].'</td>
                <td>'.$data['jumlah'].'</td>
                <td>'.$data['harga'].'</td>
                <td>'.$data['fee'].'</td>							
                <td>'.$data['resi'].'</td>
                <td>
                  <a href="index_data.php?page=edit_mntr&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
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
</html>

<!--Tampilan Pop Up untuk Lihat Detail -->
<?php
    $sql = mysqli_query($koneksi, "SELECT * FROM `users` ORDER BY `nama_lengkap` ASC") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($sql) > 0) {
      $no = 1;
      while($data = mysqli_fetch_assoc($sql)){
        echo '
          <input type="hidden" name="info"  value="'.$data['nama_lengkap'].'">
          <div id="add_data_Modal'.$no.'" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">  
                  <h4 class="modal-title">Info Profile</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <div class="modal-body">
                  <table class="table table-bordered">
                    <tr>
                      <td width="30%"><label>TGL DAFTAR</label></td>  
                      <td width="70%">'.$data['date'].'</td>
                    </tr>                        
                    <tr>
                      <td width="30%"><label>NAMA LENGKAP</label></td>  
                      <td width="70%">'.$data['nama_lengkap'].'</td>
                    </tr>
                    <tr>
                      <td width="30%"><label>EMAIL</label></td>  
                      <td width="70%">'.$data['email'].'</td>
                    </tr>  
                    <tr>
                      <td width="30%"><label>BANK</label></td>  
                      <td width="70%">('.$data['bank'].')'.$data['no_akun'].'</td>
                    </tr>  
                    <tr>
                      <td width="30%"><label>NAMA AKUN</label></td>  
                      <td width="70%">'.$data['nm_akun'].'</td>
                    </tr>   
                    <tr>
                      <td width="30%"><label>OVO</label></td>  
                      <td width="70%">'.$data['ovo'].'</td>
                    </tr>
                    <tr>
                      <td width="30%"><label>GOPAY</label></td>  
                      <td width="70%">'.$data['gopay'].'</td>
                    </tr>
                    <tr>
                      <td width="30%"><label>DANA</label></td>  
                      <td width="70%">'.$data['dana'].'</td>
                    </tr>            
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        ';
        $no++;
      }

    }
?>