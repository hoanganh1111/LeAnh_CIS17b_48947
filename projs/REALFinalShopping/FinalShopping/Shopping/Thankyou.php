<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Getting Paid!</title>
        <link rel="stylesheet" href="navStyle.css">
    </head>
    <body>
        <div class="nav">
      <ul>
        <li class="logout"><a href="login.html">Log Out</a></li>
      </ul>
    </div>
            <h2>Thank You for Purchasing our Movies!</h2>
            <h2>Your item will be ship to you within 3-5 business day!</h2>
            
        <?php
        include '../connect_to_server.php';
        $sql ="SELECT `addNum`, `street`, `state`, `zip` FROM `ale_48947`.`enum_paid` AS `enum_paid`";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                    //Return the address and informations to display it
                    echo $addNum = $row["addNum"];
                    echo $street = $row["street"];
                    echo $state = $row["state"];
                    echo $zip = $row["zip"];
            }
        }
        ?>
    </body>
</html>
