<?php

    if(!empty($_GET['id'])){

        $id_product = $_GET['id'];

        $query_delete = mysqli_query($con, "DELETE FROM tb_product WHERE id_product = '$id_product'");

        if($query_delete){
            echo "<script>alert('Berhasil dihapus');window.location.href='?page=product'</script>";
        } else {
            echo "<script>alert('Gagal dihapus');window.location.href='?page=product'</script>";
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
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
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

                    <div class="col-md-12">
                    <a href="?page=product-tambah" class="btn btn-success btn-sm">Tambah Data</a>
                    <br><br>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Product</th>
                                            <th>Harga</th>
                                            <th>Tgl Buat</th>
                                            <th>Tgl Ubah</th>
                                            <th>Perintah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $query = mysqli_query($con, "SELECT * FROM tb_product ORDER BY id_product DESC");
                                            while ($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['product_name']; ?></td>
                                        <td><?php echo $data['price']; ?></td>
                                        <td><?php echo $data['created']; ?></td>
                                        <td><?php echo $data['updated']; ?></td>
                                        <td>
                                            <a href="?page=product-edit&id=<?php echo $data['id_product'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
                                            <a href="?page=product&id=<?php echo $data['id_product'];?>"class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->