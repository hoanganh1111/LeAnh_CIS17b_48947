<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cart View</title>
        <script src="Product.js"></script>
        <link rel="stylesheet" href="cartStyle.css">
        <link rel="stylesheet" href="navStyle.css">
    </head>
    <body>
        
         <div class="nav">
      <ul>
        <li class="home"><a href="main.php">Home</a></li>
        <li class="cart"><a href="viewCart.php">Cart</a></li>
        <li class="checkout"><a href="checkout.php">Checkout</a></li>
        <li class="logout"><a href="login.html">Log Out</a></li>
      </ul>
    </div>
        
        
        <div id="content">
        <ul id="main">
        </ul>
        </div>
        
        <div id="popupBig">
            <div id="popupSmall">
                <div id="popupName"></div>
                <div id="popupClose"></div>
                <a id="popupDelete">Delete Item?</a>
            </div>
        </div>
        
        <?php
        
        include 'connect_to_server.php';
        
        $sql = "SELECT `id_shop_user`, `id_product`, `item_name`, `description`, `price`, `img_loc` FROM `ale_48947`.`xref_shop_user_product` AS `xref_shop_user_product`";
        
        $result = $conn->query($sql);
        
        $total = 0;
        
        if ($result->num_rows > 0) {
            echo '<script type="text/javascript">';
            while($row = $result->fetch_assoc()) {
                    $user_id = $row["id_shop_user"];
                    $id = $row["id_product"];
                    $name = $row["item_name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $picture = $row["img_loc"];
                    $total += $row["price"];
                    
                    setcookie('total', $total);
            echo '
               var product'.$id.' = new Product("'.$id.'", "'.$name.'", "'.$description.'", "'.$price.'", "'.$picture.'"); product'.$id.'.displayCart();
               ';
            }
            echo "</script>";
        }
        
        ?>
          <script>
    function showpopup(id, name, price, des, picture){

        document.getElementById("popupBig").style.display = "block";
        document.getElementById("popupName").innerHTML = name;
        
        document.getElementById("popupDelete").href= "deleteCartItem.php?id="+id;
        
//        document.getElementById("popupDelete").href= "deleteCartItem.php?id="+id+"&userid="<?php echo $user_id ?>;
    }
    
    var modal = document.getElementById("popupBig");

            // When the user clicks anywhere outside of the popup, close it
            window.onclick = function(event){
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };
        </script>
    </body>
</html>
