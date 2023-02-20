
<!--Slide-->
      <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 p-0 m-0">
                <div class="jumbotron bg-dark text-white p-5" style="background: #333" >
                    <h1 class="display-4">About Us</h1>
                  </div>
                </div>
            </div>
        </div>
    </div>


      <div class="clearfix mt-3"></div>

<!-- About -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">We Are The Journey</h2>
                <center><hr size="5" width="5%" color="#000" class="rounded" style="background-color: #333; line-height: 0.5"></center>
            </div>
        </div>
        <div class="row">
        <?php

            $query_about = mysqli_query($con, "SELECT * FROM tb_about");
            $data_about = mysqli_fetch_array($query_about);
        ?>
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
