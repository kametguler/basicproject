<?php

if ($_GET){
    $GelenIdDegeri = $_GET['id'];

    if ($GelenIdDegeri != ""){

        $DeleteQ = $DBConnection->prepare("DELETE FROM contactform WHERE id = ?");
        $DeleteQ->execute([$GelenIdDegeri]);
        $DeleteQCount = $DeleteQ->rowCount();
        if ($DeleteQCount > 0){
            echo '<div class="alert alert-success">Congrats, Your data has been deleted</div>';
            header("refresh:2, url=index.php?sayfa=1");
        }else{
            echo '<div class="alert alert-warning">There had a problem, Try again later!</div>';
            header("refresh:2, url=index.php?sayfa=1");
        }

    }else{
        echo '<div class="alert alert-danger">There is no id parameter</div>';
        header("refresh:2, url=index.php?sayfa=1");
        exit();
    }
}