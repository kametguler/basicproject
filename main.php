<?php

    if ($_POST){
        $Fullname = $_POST['fullname'];
        $Email = $_POST['email'];
        $Phone = $_POST['phone'];
        $Company = $_POST['company'];
        $Subject = $_POST['subject'];
        $Message= $_POST['message'];


        if ($Fullname != "" and $Email != "" and $Phone != "" and $Company != "" and $Subject != "" and $Message != ""){

            $FormEklemeSorgusu = $DBConnection->prepare("INSERT INTO contactform (fullname, email, phone, companyname, subject, message) VALUES (?,?,?,?,?,?) ");
            $FormEklemeSorgusu->execute([$Fullname,$Email,$Phone,$Company,$Subject,$Message]);
            $FormEklemeSorgusuSayisi = $FormEklemeSorgusu->rowCount();

            if ($FormEklemeSorgusuSayisi > 0){
                echo '<div class="alert alert-success">Congrats, Your data has been succesfully saved!</div>';
                header('refresh:2, url=index.php?sayfa=1');
            }else{
                echo '<div class="alert alert-warning">Opps, There had a problem try again later!</div>';
                header('refresh:2, url=index.php?sayfa=1');
            }

        }else{
            ?>
            <div class="alert alert-danger">Please dont leave blank input!</div>
            <?php header("refresh:2, url=index.php"); ?>
<?php
        }

    }

?>




<div class="container mt-5">
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <input type="text" name="company" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Message</label>
            <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>
</div>