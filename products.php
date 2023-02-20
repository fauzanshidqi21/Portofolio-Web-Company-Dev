
<!--Slider-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 p-0 m-0">
                <div class="jumbotron bg-dark text-white p-5" style="background: #333" >
                    <h1 class="display-4">Products</h1>
                </div>
            </div>
        </div>
    </div>

<!--End Slide-->
      <div class="clearfix mt-3"></div>
    

<!--Products-->
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="text-center">Products</h2>
            <center><hr size="5" width="5%" color="#000" class="rounded" style="background-color: #333; line-height: 0.5"></center>
            </div>

        </div>
        <div class="row">
        <?php

            $query_product = mysqli_query($con, "SELECT * FROM tb_product ORDER BY id_product DESC");
            while($data_product = mysqli_fetch_array($query_product)){
        ?>
            <div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <img src="server/product/<?php echo $data_product['gambar'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data_product['product_name']?></h5>
                        <p class="card-text"><?php echo $data_product['description']?></p>
                        <a href="#" class="btn btn-primary">Rp. <?php echo $data_product['price']?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
<!--End Product -->
    
        <div class="row">
            <div class="col-12 mt-5">
                <center><button class="btn btn-outline-primary"> View more <i class="fa fa-chevron-circle-right"></i></button></center>
            </div>
        </div>    
    </div>

    <div class="clearfix mt-5"</div>

