<?php


    $query_tampil = mysqli_query($con,"SELECT * FROM tb_about");
    $data_tampil  = mysqli_fetch_array($query_tampil);

    if(isset($_POST['simpan'])){

       
        $deskripsi     = $_POST['deskripsi'];
        

        $qt = mysqli_query($con,"UPDATE tb_news SET ,description = '$deskripsi'");
        
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
                        <div class="has-warning form-group">
                            <label class=" form-control-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="is-invalid form-control"><?php echo $data_tampil['description'];?></textarea>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            <a href="?page=about"><button type="button" class="btn btn-secondary">Kembali</button></a>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div><!-- .animated -->
