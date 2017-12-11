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
        <link rel="stylesheet" href="cartStyle.css">
        <link rel="stylesheet" href="ulStyle.css">
        <link rel="stylesheet" href="adminStyle.css">
    </head>
    <body>
        <ul class='topnav'>
                <li><a href="admin_main.html">Admin Main Page</a></li>
                <li><a href="admin_view.php">Display Shopping User</a></li>
                <li><a href="addProduct.html">Add New Product</a></li>
                <li><a href="admin_main.html" onclick="delete_cookie()">Delete The User Cookies</a></li>
                <li style="float:right"><a class="active" onclick="delete_cookie_admin()" href="login.html">Log Out</a></li>
            </ul>
        <h1>----------------------THIS IS ONLY A TEMPLATE SHOPPING STOREFRONT----------------------</h1>
        <div id="content">
        <ul id="main">
        </ul>
        </div>
        
        <div id="popupBig">
            <div id="popupSmall">
                <div id="popupName"></div>
                <div id="popupClose"></div>
                <a id="popupDelete">Delete?</a>
            </div>
        </div>
        
        <?php
        include 'connect_to_server.php';
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
               var product'.$id.' = new Product("'.$id.'", "'.$name.'", "'.$description.'", "'.$price.'", "'.$picture.'"); product'.$id.'.displayTemp();
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
    function showpopup(id, name, price, des, picture){

        document.getElementById("popupBig").style.display = "block";
        document.getElementById("popupName").innerHTML = name;
        
        document.getElementById("popupDelete").href= "deleteProduct.php?id="+id;
        
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
