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
        
        if(!isset($_COOKIE["userEmail"])) {
            echo "<script type=\"text/javascript\"> alert('User Login Fail!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        include '../../connect_to_server.php';
        
        //Deleting the Item from the Cart base from the id
        $sql ="DELETE FROM xref_shop_user_product WHERE id_product='".$_GET['id']."' AND id_shop_user='".$_COOKIE['userId']."' ";
        
        if ($conn->query($sql) === TRUE) {
            echo "Item removed from cart!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        //Redirect to the Cart
        echo "<script type=\"text/javascript\"> window.location.replace('viewCart.php')</script>";
        
        $conn->close();
        ?>
    </body>
</html>
