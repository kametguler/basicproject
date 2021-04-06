<?php
ob_start();
include 'ayarlar/db.php';
include "ayarlar/sayfalar.php";
include "partials/header.php";


if (isset($_REQUEST['sayfa'])){
    $GelenSayfaSayisi = $_REQUEST['sayfa'];
}else{
    $GelenSayfaSayisi = "";
}


if ($GelenSayfaSayisi == "" or $GelenSayfaSayisi == 0){
    include "main.php";
}else{
    include $Sayfa[$GelenSayfaSayisi];
}



include "partials/footer.php";
ob_end_flush();
?>