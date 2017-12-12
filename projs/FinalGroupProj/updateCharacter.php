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
        //Coonect to database
        include '../connect_to_server.php';
        
        $sql = "SELECT `char_id` FROM `DnD_48947`.`char_entity` AS `char_entity`";
        $result = $conn->query($sql);
        $charExist = false;
        $waitForRoom = false;
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["char_id"] == $_COOKIE["user_id"]){
                    $charExist = true;
                    }
                }
            }else {
            echo "0 results";
        }
        
        if($charExist){
            // update user info
            $sql = "UPDATE char_entity SET class_id='".$_GET["class_id"]."', str='".$_GET["str"]."', con='".$_GET["con"]."', intel='".$_GET["int"]."',dex='".$_GET["dex"]."', hp='".$_GET["hp"]."', mp='".$_GET["ma"]."', defence='".$_GET["def"]."', attack='".$_GET["atk"]."', mattack='".$_GET["matk"]."', speed='".$_GET["spd"]."', sight='".$_GET["sight"]."', x_loc='".$_GET["x_loc"]."', y_loc='".$_GET["y_loc"]."', inventory='".$_GET["inventory"]."', level='".$_GET["level"]."', exp='".$_GET["exp"]."' WHERE char_id='".$_COOKIE["user_id"]."'";

            if ($conn->query($sql) === TRUE) {
                $waitForRoom = true;
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }else{
            $sql = "INSERT INTO char_entity (class_id, str, con, intel, dex, hp, mp, defence, attack, mattack, speed, sight, x_loc, y_loc, inventory, level, exp)
            VALUES ('".$_GET["class_id"].",'".$_GET["str"].", ".$_GET["con"].", ".$_GET["int"].", ".$_GET["dex"].", ".$_GET["hp"].", ".$_GET["mp"].", ".$_GET["defence"].", ".$_GET["attack"].", ".$_GET["mattack"].", ".$_GET["speed"].", ".$_GET["sight"].", ".$_GET["x_loc"].", ".$_GET["y_loc"].", ".$_GET["inventory"].", ".$_GET["level"].", ".$_GET["exp"]."')";
            
            
            if ($conn->multi_query($sql) === TRUE) {
                $waitForRoom = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        // login to the room
        $sql = "UPDATE room_entity SET ".$_COOKIE["room_loc"]."='".$_COOKIE["user_id"]."' WHERE room_id='1'";

        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // waiting for other players
        $sql = "SELECT `char_id_1`, `char_id_2`, `char_id_3`, `char_id_4` FROM `DnD_48947`.`room_entity` AS `room_entity`";
        while($waitForRoom){
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row["char_id_1"] == 0 || $row["char_id_2"] == 0){
                        //sleep for 2 seconds
                        sleep(2);
                    }else{
                        $waitForRoom = false;
                        echo '
                        <script type="text/javascript">
                            location.assign("main.php");
                        </script>
                        ';
                    }
                }
            }else {
            echo "0 results";
            }
        }
       
        $conn->close();
        ?>
    </body>
</html>
