<?php
    $id = $_GET['id'];

    $query_tampil = mysqli_query($con,"SELECT * FROM tb_product WHERE id_product = '$id'");
    $data_tampil  = mysqli_fetch_array($query_tampil);

    if(isset($_POST['simpan'])){

        
        $name_product  = $_POST['name_product'];
        $deskripsi     = $_POST['deskripsi'];
        $price         = $_POST['price'];

        $nama_photo      = $_FILES['photo']['name'];
        $tmp_photo       = $_FILES['photo']['tmp_name'];
        $tipe_file       = $_FILES['photo']['type'];
        $ukuran_file     = $_FILES['photo']['size'];

        $folder     = 'product/';

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

            

                $qt = mysqli_query($con,"UPDATE tb_product SET product_name = '$name_product', description = '$deskripsi', price = '$price', gambar = '$nama_file', updated = now() WHERE id_product='$id'");

            }
        } else{
            $qt = mysqli_query($con,"UPDATE tb_product SET product_name = '$name_product',description = '$deskripsi', price = '$price', updated = now() WHERE id_product='$id'");
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
                    <strong>Edit Data Product</strong>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body card-block">
                        <div class="has-success form-group"><label class=" form-control-label">Nama Produk</label><input type="text" name="name_product" class="is-valid form-control-succes form-control" value="<?php echo $data_tampil['product_name'];?>"></div>
                        <div class="has-success form-group"><label class=" form-control-label">Harga</label><input type="text" name="price" class="is-valid form-control-succes form-control" value="<?php echo $data_tampil['price'];?>"></div>
                        <div class="has-warning form-group">
                            <label class=" form-control-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="is-invalid form-control"><?php echo $data_tampil['description'];?></textarea>
                        </div>

                        <div class="has-warning form-group">
                            <label class=" form-control-label">File Upload</label>
                            <input type="file" name="photo" class="is-invalid form-control">
                        </div>

                        <div class="form-actions form-group">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            <a href="?page=product"><button type="button" class="btn btn-secondary">Kembali</button></a>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div><!-- .animated -->
