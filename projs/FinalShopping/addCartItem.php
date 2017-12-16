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
        $sql = "SELECT `id_product`, `item_name`, `description`, `price`, `img_loc` FROM `ale_48947`.`enum_product` AS `enum_product`";
        
        
        $result = $conn->query($sql);
        
        $user_id;
        
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
        
        //Access the xref Cart Table
        $sql="SELECT `id_shop_user`, `id_product`, `item_name`, `price`, `img_loc`, `quan` FROM `ale_48947`.`xref_shop_user_product` AS `xref_shop_user_product`";
        $result = $conn->query($sql);
        $quan = 1;
        
        //If the item exist in the cart already
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($_GET["id"] === $row["id_product"] && $user_id === $row["id_shop_user"]){
                    $quan = $row["quan"] + 1;
                }
            }
        }
        
        //If quanity is 1
        if($quan == 1){
            $sql = "INSERT INTO xref_shop_user_product(id_shop_user, id_product, item_name, description, price, img_loc, quan) "
                . "VALUES('".$user_id."', '".$product_id."', '".$name."', '".$description."', '".$price."', '".$picture."', '".$quan."')";
        }
        //If the item is not exsited in the cart
        else{
            $sql = "UPDATE xref_shop_user_product SET quan='".$quan."' WHERE id_product='".$product_id."'";
        }
        
        if ($conn->query($sql) === TRUE) {
            echo "Updated the cart";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        //Redirect to main
        echo "<script type=\"text/javascript\"> window.location.replace('main.php')</script>";
        
        $conn->close();
        ?>
    </body>
</html>
