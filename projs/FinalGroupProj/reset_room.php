<!DOCTYPE html>
<html>
    <body>

        <?php
        
        include '../connect_to_server.php';
        
        // update the turn
        $sql = "UPDATE room_entity SET char_id_1=0, char_id_2=0, char_id_3=0, char_id_4=0, turn=0 WHERE room_id=1";
        
        if ($conn->query($sql) === TRUE) {
            echo "Room-Reset: Done";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        $conn->close();
        ?> 

    </body>
</html>