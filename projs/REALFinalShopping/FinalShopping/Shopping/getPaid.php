<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../connect_to_server.php';
        $sql = "INSERT INTO enum_paid(first, last, addNum, street, state, zip, cardNum, exp, cvg) "
                . "VALUES('".$_GET['first']."', '".$_GET['last']."', '".$_GET['addNum']."', '".$_GET['street']."', '".$_GET['state']."', '".$_GET['zip']."', '".$_GET['cardNum']."', '".$_GET['exp']."', '".$_GET['cvg']."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Updated the cart";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        echo "<script type=\"text/javascript\"> window.location.replace('Thankyou.php')</script>";
        
        $conn->close();
        ?>
    </body>
</html>
