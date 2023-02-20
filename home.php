<?php

    $query_about = mysqli_query($con, "SELECT * FROM tb_about");
    $data_about = mysqli_fetch_array($query_about);


?>

<div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"  style="border-radius: 50px;">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="border-radius: 50px;margin-top:50px;">
                      <div class="carousel-item active" data-bs-interval="3000">
                        <img src="gambar1.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="gambar2.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>Some representative placeholder content for the second slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="gambar3.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>Some representative placeholder content for the third slide.</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
      </div>
<!--End Slide-->
      <div class="clearfix mt-3"></div>
<!-- About -->
<div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">About</h2>
                <center><hr size="5" width="5%" color="#000" class="rounded" style="background-color: #333; line-height: 0.5"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="gambar1.jpeg" class="img-responsive img-thumbnail" alt="Gambar Perusahaan" width="100%">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h1 class="py-4 text-primary"> PT. Himamal</h1>
                <p align="justify"><?php echo $data_about['description']; ?></p>
            </div>
        </div>
    </div>

    <div class="clearfix mt-5"></div>
<!-- End About -->    

<!--Products-->

    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="text-center">Product</h2>
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

    <div class="clearfix mt-5"></div>

    <div class="container-fluid" style="background-image: url('mail.jpg');width:100%; height:500px; background-size: cover;">
        <div class="row">
            <div class="col-12">
                <div style="margin:15% 0px 0px 40%">
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="Email" class="form-control form-control-lg" id="inputPassword2" placeholder="Email">
                        </div>
                        <div class="col-auto">
                         <button type="submit" class="btn btn-danger btn-lg mb-3">Subscribe</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>