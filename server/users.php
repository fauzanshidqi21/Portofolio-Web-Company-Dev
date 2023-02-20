<?php

    if(!empty($_GET['id'])){

        $id_login = $_GET['id'];

        $query_delete = mysqli_query($con, "DELETE FROM tb_login WHERE id_login = '$id_login'");

        if($query_delete){
            echo "<script>alert('Berhasil dihapus');window.location.href='?page=users'</script>";
        } else {
            echo "<script>alert('Gagal dihapus');window.location.href='?page=users'</script>";
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
                    <a href="?page=users-tambah" class="btn btn-success btn-sm">Tambah Data</a>
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
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Telpon</th>
                                            <th>Jeni Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Photo</th>
                                            <th>Perintah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $query = mysqli_query($con, "SELECT * FROM tb_login ORDER BY id_login DESC");
                                            while ($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['no_hp']; ?></td>
                                        <td><?php echo $data['jenis_kelamin']; ?></td>
                                        <td><?php echo $data['alamat']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><img src="upload/<?php echo $data['photo']; ?>" alt="Gambar" whidth="50" height="50"></td>
                                        <td>
                                            <a href="?page=users-edit&id=<?php echo $data['id_login'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
                                            <a href="?page=users&id=<?php echo $data['id_login'];?>"class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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