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
        $sql = "SELECT `id_product`, `item_name`, `description`, `price`, `img_loc` FROM `ale_48947`.`enum_product` AS `enum_product`";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($_GET["id"] === $row["id_product"]){
                    $user_id = $_COOKIE['userId'];
                    $product_id = $row["id_product"];
                    $name = $row["item_name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $picture = $row["img_loc"];
                }
            }
        }
        
        $sql = "INSERT INTO xref_shop_user_product(id_shop_user, id_product, item_name, description, price, img_loc) "
                . "VALUES('".$user_id."', '".$product_id."', '".$name."', '".$description."', '".$price."', '".$picture."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Updated the cart";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        
        echo "<script type=\"text/javascript\"> window.location.replace('main.php')</script>";
        ?>
    </body>
</html>
