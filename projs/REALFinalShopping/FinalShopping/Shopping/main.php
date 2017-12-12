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
        <script src="Product.js"></script>
        <link rel="stylesheet" href="productStyle.css">
        <link rel="stylesheet" href="navStyle.css">
    </head>
    <style>
        body{
              background-image: url(Picture/background.jpg);
  background-repeat:   no-repeat;
  background-size: cover;
        }
    </style>
    
    <body>
        
        <div class="nav">
      <ul>
        <li class="home"><a href="main.php">Home</a></li>
        <li class="cart"><a href="viewCart.php">Cart</a></li>
        <li class="checkout"><a href="checkout.html">Checkout</a></li>
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
                <div id="popupClose"><a id="closeBtn" onclick="hideDes()">X</a></div>
                <div id="popupCont"></div>
                <div id="popupPrice"></div>
                <div id="popupDes"></div>
                <a id="popupAdd">Add to Cart</a>
            </div>
        </div>
        
        <?php
        include '../connect_to_server.php';
        $sql = "SELECT `id_product`, `item_name`, `description`, `price`, `img_loc` FROM `ale_48947`.`enum_product` AS `enum_product`";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<script type="text/javascript">';
            while($row = $result->fetch_assoc()) {
               $id = $row["id_product"];
               $name = $row["item_name"];
               $description = $row["description"];
               $price = $row["price"];
               $picture = $row["img_loc"];
               
               echo '
               var product'.$id.' = new Product("'.$id.'", "'.$name.'", "'.$description.'", "'.$price.'", "'.$picture.'"); product'.$id.'.displayProduct();
               ';
            }
            echo "</script>";
        }
        else {
            echo "0 results";
        }
        
        $conn->close();
        ?>
            
        <script>
            //Popup function when clicked on the picture
    function showpopup(id, name, price, des, picture){

        document.getElementById("popupBig").style.display = "block";
        document.getElementById("popupName").innerHTML = name;
        document.getElementById("popupCont").innerHTML = '<img src="'+picture+'" id="itemImg">';
        document.getElementById("popupPrice").innerHTML = price;
        document.getElementById("popupDes").innerHTML = des;
        
        document.getElementById("popupAdd").href= "addCartItem.php?id="+id;
    }
    
    function hideDes(){
                document.getElementById("popupBig").style.display = "none";
                document.getElementById("popUpName").innerHTML = "";
                document.getElementById("popUpCont").innerHTML = "";
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
