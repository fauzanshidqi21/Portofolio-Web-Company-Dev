

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 p-0 m-0">
                <div class="jumbotron bg-dark text-white p-5" style="background: #333" >
                    <h1 class="display-4">News</h1>
                </div>
            </div>
        </div>
    </div>

<!--End Slide-->
      <div class="clearfix mt-3"></div>
    

<!--News-->
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="text-center">Lates News</h2>
            <center><hr size="5" width="5%" color="#000" class="rounded" style="background-color: #333; line-height: 0.5"></center>
            </div>

        </div>
        <div class="row">
        <?php

            $query_news = mysqli_query($con, "SELECT a.*, b.* FROM tb_news a, tb_login b WHERE a.id_login = b.id_login ORDER BY a.id_news DESC");
            while($data_news = mysqli_fetch_array($query_news)){
        ?>
            <div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <img src="server/news/<?php echo $data_news['gambar'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data_news['judul']?></h5>
                        <p style="font-size: 12px">
                            <i class="fa fa-user"></i><?php echo $data_news['username']?> &nbsp;&nbsp;
                            <i class="fa fa-calendar"></i> <?php echo $data_news['created']?> &nbsp;&nbsp;
                        </p>
                        <p class="card-text"><?php echo $data_news['description']?></p>
                        <a href="#" class="btn btn-primary">More Detail</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<!--End Product -->
    
        <div class="row">
            <div class="col-12 mt-5">
                <center><button class="btn btn-outline-primary"> View more <i class="fa fa-chevron-circle-right"></i></button></center>
            </div>
        </div>    
    </div>

    <div class="clearfix mt-5"></div>

