<?php
    $id = $_GET['id'];

    $query_tampil = mysqli_query($con,"SELECT * FROM tb_login WHERE id_login = '$id'");
    $data_tampil = mysqli_fetch_array($query_tampil);

    if(isset($_POST['simpan'])){
        $nama_lengkap   = $_POST['nama_lengkap'];
        $email          = $_POST['email'];
        $no_hp          = $_POST['no_hp'];
        $jenis_kelamin  = $_POST['kelamin'];
        $alamat         = $_POST['alamat'];
        $username       = $_POST['username'];
        $password       = md5($_POST['password']);
        $status         = $_POST['status'];

        $nama_photo      = $_FILES['photo']['name'];
        $tmp_photo       = $_FILES['photo']['tmp_name'];
        $tipe_file       = $_FILES['photo']['type'];
        $ukuran_file     = $_FILES['photo']['size'];

        $folder     = 'upload/';

        $tipe_array         = array('png','PNG','jpg','JPG','jpeg','JPEG');
        $nama_photo_replace = str_replace(" ","_", $nama_photo);

        $explode  = explode(".", $nama_photo_replace);
        $ekstensi = $explode[count($explode)-1];
        

        $nama_file =$nama_photo_replace.'.'.$ekstensi;

        if(empty($nama_photo)){

            if($_POST['password']==''){
                $qt = mysqli_query($con,"UPDATE tb_login SET nama_lengkap = '$nama_lengkap', email = '$email', no_hp = '$no_hp', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat',username = '$username',status = '$status' WHERE id_login= '$id'");

            } else {

                $qt = mysqli_query($con,"UPDATE tb_login SET nama_lengkap = '$nama_lengkap', email = '$email', no_hp = '$no_hp', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat',username = '$username', password = 'password',status = '$status' WHERE id_login= '$id'");
            }

        } else {

            if(!in_array($ekstensi, $tipe_array)){
            
                echo "Tipe File tidak Mendukung";
            
            }else{
                
                move_uploaded_file($tmp_photo, $folder.$nama_file);

                if($_POST['password']==''){
                    $qt = mysqli_query($con,"UPDATE tb_login SET nama_lengkap = '$nama_lengkap', email = '$email', no_hp = '$no_hp', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat',username = '$username',photo = '$nama_file',status = '$status' WHERE id_login= '$id'");

                } else {

                    $qt = mysqli_query($con,"UPDATE tb_login SET nama_lengkap = '$nama_lengkap', email = '$email', no_hp = '$no_hp', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat',username = '$username', password = 'password', photo = '$nama_file',status = '$status' WHERE id_login= '$id'");
                }
            }
        } 

        if($qt){
            echo '<script> alert("Berhasil Disimpan");</script>';
        }else{
            echo '<script> alert("Gagal Disimpan");</script>';
        }

    }
?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Data Users</strong>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body card-block">
                    <div class="has-success form-group"><label class=" form-control-label">Nama Lengkap</label><input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="is-valid form-control-succes form-control" value="<?php echo $data_tampil['nama_lengkap'];?>"></div>
                    <div class="has-warning form-group"><label class=" form-control-label">Email</label><input type="text" name="email" placeholder="Email" class="is-invalid form-control" value="<?php echo $data_tampil['email'];?>"></div>
                    <div class="has-warning form-group"><label class=" form-control-label">No Hp</label><input type="text" name="no_hp" placeholder="No Hp" class="is-invalid form-control" value="<?php echo $data_tampil['no_hp'];?>"></div>
                    <div class="has-warning form-group"><label class=" form-control-label">Jenis Kelamin</label>
                    <?php
                        if($data_tampil['jenis_kelamin']=='Pria'){
                            echo '<input type="radio" name="kelamin" value="Pria" checked>Pria
                            <input type="radio" name="kelamin" value="Wanita"> Wanita';
                        } else {
                            echo '<input type="radio" name="kelamin" value="Pria"> Pria
                            <input type="radio" name="kelamin" value="Wanita" checked> Wanita';
                        }
                    ?>    
                    <div class="has-warning form-group"><label class=" form-control-label">Alamat</label><input type="text" name="alamat" placeholder="Alamat" class="is-invalid form-control" value="<?php echo $data_tampil['alamat']; ?>"></div>
                    <div class="has-warning form-group"><label class=" form-control-label">Username</label><input type="text" name="username" placeholder="Username"class="is-invalid form-control" value="<?php echo $data_tampil['username']; ?>"></div>
                    <div class="has-warning form-group"><label class=" form-control-label">Password</label><input type="password" name="password" placeholder="Password"class="is-invalid form-control">*Jika password tidak diubah kosongkan saja</div>
                    <div class="has-warning form-group"><label class=" form-control-label">Photo</label><input type="file" name="photo" class="is-invalid form-control"></div>
                    <div class="has-warning form-group"><label class=" form-control-label">Status</label>
                    <select name="status" class="is-invalid form-control"></div>
                        <option value="<?php echo $data_tampil['status'];?>"><?php echo $data_tampil['status'];?></option>
                        <option value="">-- Piilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    </div>
                    <div class="form-actions form-group">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <a href="?page=users"><button type="button" class="btn btn-secondary">Kembali</button></a>
                    </div>
                </div>
            </form>
        </div>
</div>
