<?php

$VeriCekme = $DBConnection->prepare("SELECT * FROM contactform");
$VeriCekme->execute();
$VeriCekmeSayisi = $VeriCekme->rowCount();
$Veriler = $VeriCekme->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container-fluid mt-5">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Company</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($VeriCekmeSayisi > 0){
            foreach ($Veriler as $Veri) {

                ?>
                <tr>
                    <td><?=$Veri['fullname']?></td>
                    <td><?=$Veri['email']?></td>
                    <td><?=$Veri['phone']?></td>
                    <td><?=$Veri['companyname']?></td>
                    <td><?=$Veri['subject']?></td>
                    <td><?=$Veri['message']?></td>
                    <td>
                        <a class="btn btn-warning" href="index.php?sayfa=2&id=<?=$Veri['id']?>">UPDATE</a>
                        <a class="btn btn-danger" href="index.php?sayfa=3&id=<?=$Veri['id']?>">DELETE</a>
                    </td>
                </tr>
        <?php
            }
        }else{
            echo '<div class="alert alert-info">There is no data!</div>';
        }
        ?>

        </tbody>
    </table>
</div>