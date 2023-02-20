<?php

    if(!empty($_GET['id'])){

        $id_login = $_GET['id'];

        $query_delete = mysqli_query($con, "DELETE FROM tb_news WHERE id_news = '$id_news'");

        if($query_delete){
            echo "<script>alert('Berhasil dihapus');window.location.href='?page=news'</script>";
        } else {
            echo "<script>alert('Gagal dihapus');window.location.href='?page=news'</script>";
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
                    <a href="?page=-tambah" class="btn btn-success btn-sm">Tambah Data</a>
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
                                            <th>Judul</th>
                                            <th>Permalink</th>
                                            <th>Tanggal</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Perintah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $query = mysqli_query($con, "SELECT a.*, b.* FROM tb_news a, tb_login b WHERE a.id_login = b.id_login ORDER BY a.id_news DESC");
                                            while ($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['permalink']; ?></td>
                                        <td><?php echo $data['created']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td>
                                            <a href="?page=news-edit&id=<?php echo $data['id_news'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
                                            <a href="?page=news&id=<?php echo $data['id_news'];?>"class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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