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
        include 'connect_to_server.php';
        $sql = "INSERT INTO enum_product(item_name, description, price, img_loc) "
                . "VALUES('".$_GET["name"]."', '".$_GET["description"]."', '".$_GET["price"]."', '".$_GET["img"]."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Product has been added";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        echo "<script type=\"text/javascript\"> window.location.replace('addProduct.html')</script>";
        
        $conn->close();
        ?> 
    </body>
</html>
