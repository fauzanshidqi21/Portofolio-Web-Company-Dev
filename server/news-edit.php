<?php

    $id = $_GET['id'];

    $query_tampil = mysqli_query($con,"SELECT * FROM tb_news WHERE id_news = '$id'");
    $data_tampil  = mysqli_fetch_array($query_tampil);

    if(isset($_POST['simpan'])){

        
        $judul         = $_POST['judul'];
        $deskripsi     = $_POST['deskripsi'];
        
        $permalink     = str_replace(" ","-",$judul);
        $users         = $_SESSION['id_login'];

        $nama_photo      = $_FILES['photo']['name'];
        $tmp_photo       = $_FILES['photo']['tmp_name'];
        $tipe_file       = $_FILES['photo']['type'];
        $ukuran_file     = $_FILES['photo']['size'];

        $folder     = 'news/';

        $tipe_array         = array('png','PNG','jpg','JPG','jpeg','JPEG');
        $nama_photo_replace = str_replace(" ","_", $nama_photo);

        $explode  = explode(".", $nama_photo_replace);
        $ekstensi = $explode[count($explode)-1];
        

        $nama_file =$nama_photo_replace.'.'.$ekstensi;
        if(!empty($nama_photo)){
            if(!in_array($ekstensi, $tipe_array)){
                echo "Tipe File tidak Mendukung";
            }else{
                

                move_uploaded_file($tmp_photo, $folder.$nama_file);

            

                $qt = mysqli_query($con,"UPDATE tb_news SET judul = '$judul',description = '$deskripsi',permalink = '$permalink',gambar = '$nama_file', id_login = '$users' WHERE id_news = '$id'");

            }
        } else{
            $qt = mysqli_query($con,"UPDATE tb_news SET judul = '$judul',description = '$deskripsi',permalink = '$permalink',gambar = '$nama_file', id_login = '$users' WHERE id_news = '$id'");
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
                    <strong>Tambah Data Users</strong>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body card-block">
                        <div class="has-success form-group"><label class=" form-control-label">Judul</label><input type="text" name="judul" class="is-valid form-control-succes form-control" value="<?php echo $data_tampil['judul'];?>"></div>
                        <div class="has-warning form-group">
                            <label class=" form-control-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="is-invalid form-control"><?php echo $data_tampil['judul'];?></textarea>
                        </div>

                        <div class="has-warning form-group">
                            <label class=" form-control-label">File Upload</label>
                            <input type="file" name="photo" class="is-invalid form-control">
                        </div>

                        <div class="form-actions form-group">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            <a href="?page=news"><button type="button" class="btn btn-secondary">Kembali</button></a>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div><!-- .animated -->
