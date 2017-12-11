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
    <h2>Thank You for Purchasing our Movies!</h2>
    <h2>Your item will be ship to you within 3-5 business day!</h2>
    <body>
        <?php
        include 'connect_to_server.php';
        $sql ="SELECT `addNum`, `street`, `state`, `zip` FROM `ale_48947`.`enum_paid` AS `enum_paid`";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                    
                    echo $addNum = $row["addNum"];
                    echo $street = $row["street"];
                    echo $state = $row["state"];
                    echo $zip = $row["zip"];
            }
        }
        ?>
    </body>
</html>
