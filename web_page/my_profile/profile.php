<?php include ("../config.php");?>

<?php

if(isset($user_data['user_id'])){
    // Membuat variabel $id untuk menyimpan data user id yang sedang aktif
    $id = $user_data['user_id'];
    // query ke database SELECT tabel users berdasrkan id SESSION yang sedang aktif
    $select = mysqli_query($koneksi, "SELECT * FROM users WHERE user_id = '$id' ") or die(mysqli_error($koneksi));

    // jika hasil query == 0 maka error akan mucul
    if(mysqli_num_rows($select) == 0){
        echo '<script>alert("ID tidak ditemukan di database."); document.location="../index_data.php?page=my_profile";</script>';
    // jika hasil query > 0
    }else{
        // Membuat variable $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
    }
}
?>

<?php
if (isset($_POST['submit'])) {
    $id           = $user_data['user_id'];
    $nama_lengkap = $_POST['name'];
    $bank         = $_POST['bankname'];
    $no_akun      = $_POST['accountnumber'];
    $nm_akun      = $_POST['accountname'];
    $ovo          = $_POST['ovo'];
    $gopay        = $_POST['gopay'];
    $dana         = $_POST['dana'];
    
    $sql = mysqli_query($koneksi, "UPDATE users SET nama_lengkap='$nama_lengkap', bank='$bank', no_akun='$no_akun', nm_akun='$nm_akun', ovo='$ovo', gopay='$gopay', dana='$dana' WHERE user_id='$id'");

    if ($sql) {
        echo '<div class="alert alert-success" role="alert">
                Berhasil Mengedit Profile.
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
              </div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
                Gagal Mengedit Profile.
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
              </div>';
    }

}
?>

<?php
if (isset($_POST['change-passwd'])){
    if ($_POST['newpassword'] == $_POST['newpassword2']) {
        $id = $user_data['user_id'];
        $oldpasswd = $_POST['oldpassword'];
        $newpasswd = $_POST['newpassword'];

        $sql = mysqli_query($koneksi, "UPDATE users SET password='$newpasswd' WHERE user_id='$id'");

        if ($sql) {
            echo '<div class="alert alert-warning" role="alert">
                    Berhasil Mengubah Password.
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">x</span>
                    </button>
                  </div>';
            
        }else {
            echo '<div class="alert alert-success" role="alert">
                    Gagal Merubah Password.
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">x</span>
                    </button>
                  </div>';
            
        }

    }else {
        echo '<script>alert(" Gagal(PASTIKAN ISI KOLOM PASSWORD DAN KONFIRMASI SAMA)."); document.location="index_data.php?page=my_profile";</script>';        
    }

}
?>


<!-- <div class="row"> -->
    <!-- Form Untuk Ubah data -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-5">Akun</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $user_data['nama_lengkap'];?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" disabled id="email" class="form-control" value="<?php echo $user_data['email'];?>">
                            </div>

                            <div class="form-group">
                                <label for="example-email mb-3">Bank</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select id="bankname" name="bankname" class="form-control">
                                            <option value='Pilih Bank' selected disabled>Pilih Bank</option>
                                            <option value='Mandiri' <?php if($user_data['bank'] == 'Mandiri'){echo 'selected';}?>>Mandiri</option>
                                            <option value='BCA' <?php if($user_data['bank'] == 'BCA'){echo 'selected';}?>>BCA</option>
                                            <option value='BRI' <?php if($user_data['bank'] == 'BRI'){echo 'selected';}?>>BRI</option>
                                            <option value='BNI' <?php if($user_data['bank'] == 'BNI'){echo 'selected';}?>>BNI</option>                                         
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="accountnumber" class="form-control" placeholder="Account Number" value="<?php echo $user_data['no_akun'];?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="accountname" class="form-control" placeholder="Account Name" value="<?php echo $user_data['nm_akun'];?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Form Untuk Kolom Ovo -->
                            <div class="form-group">
                                <label for="ovo">OVO</label>
                                <input type="text" name="ovo" id="ovo" class="form-control" value="<?php echo $user_data['ovo'];?>">
                            </div>
                            <div class="form-group">
                                <label for="gopay">Gopay</label>
                                <input type="text" id="gopay" name="gopay" class="form-control" value="<?php echo $user_data['gopay'];?>">
                            </div>
                            <div class="form-group">
                                <label for="dana">Dana</label>
                                <input type="text" id="dana" name="dana" class="form-control" value="<?php echo $user_data['dana'];?>">
                            </div>
                            <button name="submit" class="btn btn-dark">Ubah</button>
                        </form>
                    </div>
                </div>

            </div> 
        </div> 
    </div>
    <!-- form Ganti Password -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-5">Ganti Password</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post">

                            <div class="form-group">
                                <label for="simpleinput">Password Lama</label>
                                <input type="password" name="oldpassword" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="newpassword">Password Baru</label>
                                <input type="password" class="form-control" name="newpassword">
                            </div>

                            <div class="form-group">
                                <label for="retypenewpassword">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" name="newpassword2">
                            </div>
                            <button name='change-passwd' class="btn btn-dark">Ganti Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- </div> -->
