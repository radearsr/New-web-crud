<?php
  include '../config.php';  
?>

<!DOCTYPE html>  
<html>  
 <head>  
  <script src="jquery.min.js"></script>  
  <script src="bootstrap.min.js"></script>  
 </head>  
 <body>  
 
  <div class="container"> 
   <h1 align="center">Data Semua User</h1>  
   <br />  
   <div class="table-responsive">
    <div align="right">
    <br />
    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="3%">Nama Pengguna</th>  
       <th width="2%">Lihat Detail</th>
      </tr>
      <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM `users` ORDER BY `nama_lengkap` ASC") or die(mysqli_error($koneksi));
        if (mysqli_num_rows($sql) > 0){
          $no = 1;
          while($data = mysqli_fetch_assoc($sql)){
            echo '
              <tr>
                <td>'.$data['nama_lengkap'].'</td>
                <td>
                  <input type="button" name="view" value="Lihat Detail" data-toggle="modal" data-target="#add_data_Modal'.$no.'" class="btn btn-dark btn-xs view_data" />  
                </td>        
              </tr>
            '; 
            $no++;
            }
        }      
      ?>
     </table>
    </div>
   </div>  
  </div>
 </body>  
</html>  

<!--Tampilan Pop Up untuk Lihat Detail -->
<?php
    $sql = mysqli_query($koneksi, "SELECT * FROM `users` ORDER BY `nama_lengkap` ASC") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($sql) > 0) {
      $no = 1;
      while($data = mysqli_fetch_assoc($sql)){
        echo '
          <form action="index_data.php?page=result_user" method="post">
            <input type="hidden" name="info"  value="'.$data['nama_lengkap'].'">
            <input type="hidden" name="num"  value="'.$no.'">
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
                    
                    <button type="submit" class="btn btn-success">Hasil Tembak</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        ';
        $no++;
      }

    }
?>
