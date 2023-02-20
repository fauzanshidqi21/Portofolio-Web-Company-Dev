<?php
   
    include "koneksi.php";
    
    include "header.php";

            
    if(isset($_GET['page'])) {
        $halaman = $_GET['page'];
    } else {
        $halaman = "";
    }

    if($halaman == ""){
        include "home.php";
    } else{
        include "$halaman.php";
    }

    include "footer.php";

?>