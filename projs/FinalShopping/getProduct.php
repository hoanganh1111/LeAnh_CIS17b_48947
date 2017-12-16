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
        
        if(!isset($_COOKIE["adminEmail"])) {
            echo "<script type=\"text/javascript\"> alert('Admin Login Fail!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        include '../../connect_to_server.php';
        
        //Inserting the info from addProduct.html URL to the enum_product table
        $sql = "INSERT INTO enum_product(item_name, description, price, img_loc) "
                . "VALUES('".$_GET["name"]."', '".$_GET["description"]."', '".$_GET["price"]."', '".$_GET["img"]."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script type=\"text/javascript\"> alert('Product has been added!')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        //Redirect to addProduct.html
        echo "<script type=\"text/javascript\"> window.location.replace('addProduct.php')</script>";
        
        $conn->close();
        ?> 
    </body>
</html>
