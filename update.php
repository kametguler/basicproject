<?php


if ($_GET){
    $GelenIdDegeri = $_GET['id'];

    if ($GelenIdDegeri != ""){

        $VeriCek = $DBConnection->prepare("select * from contactform WHERE id = ?");
        $VeriCek->execute([$GelenIdDegeri]);
        $VeriCekCount = $VeriCek->rowCount();
        $Veriler = $VeriCek->fetch(PDO::FETCH_ASSOC);

    }else{
        echo '<div class="alert alert-danger">There is a problem</div>';
        header("refresh:2, url=index.php?sayfa=1");
    }


}else{
    echo '<div class="alert alert-danger">There is no id parameter</div>';
    header("refresh:2, url=index.php?sayfa=1");
}


if ($_POST){
    $Fullname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Company = $_POST['company'];
    $Subject = $_POST['subject'];
    $Message= $_POST['message'];


    if ($Fullname != "" and $Email != "" and $Phone != "" and $Company != "" and $Subject != "" and $Message != ""){

        $UpdateQ = $DBConnection->prepare("UPDATE contactform SET fullname = ?, email = ?, phone = ?, companyname = ?,subject=?,message=? WHERE id = ?");
        $UpdateQ->execute([$Fullname,$Email,$Phone,$Company,$Subject,$Message,$GelenIdDegeri]);
        $UpdateQCount = $UpdateQ->rowCount();

        if ($UpdateQCount > 0){

            echo '<div class="alert alert-success">Congrats! Your data has been updated!</div>';
            header("refresh:2, url=index.php?sayfa=1");

        }else{
            echo '<div class="alert alert-danger">There is a problem while updating</div>';
            header("refresh:2, url=index.php?sayfa=1");
        }


    }else{
        echo '<div class="alert alert-danger">Please dont leave blank input</div>';
        header("refresh:2, url=index.php?sayfa=1");
    }
}


?>

<h3>Update Form</h3>

<div class="container mt-5">
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" name="fullname" value="<?=$Veriler['fullname']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" name="email" value="<?=$Veriler['email']?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" name="phone" value="<?=$Veriler['phone']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <input type="text" name="company" value="<?=$Veriler['companyname']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <input type="text" name="subject" value="<?=$Veriler['subject']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Message</label>
            <textarea class="form-control" name="message" id="" cols="30" rows="10"><?=$Veriler['message']?></textarea>
        </div>
        <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>
</div>
