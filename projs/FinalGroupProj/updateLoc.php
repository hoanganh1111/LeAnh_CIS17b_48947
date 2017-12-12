<!DOCTYPE html>
<html>
    <body>

        <?php
        
        include '../connect_to_server.php';
        
        $charID = $_GET['charID'];
        $charXLoc = $_GET['charXLoc'];
        $charYLoc = $_GET['charYLoc'];
        $waitForRoom = false;
        
        // update character location
        $sql = "UPDATE char_entity SET x_loc='".$charXLoc."', y_loc='".$charYLoc."' WHERE char_id=".$charID;
        
        if ($conn->query($sql) === TRUE) {
            $waitForRoom = true;
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        // update the turn
        $sql = "UPDATE room_entity SET turn='".$_COOKIE["user_id"]."' WHERE room_id=1";
        
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        // waiting for your turn
        $sql = "SELECT `turn` FROM `DnD_48947`.`room_entity` AS `room_entity`";
        while($waitForRoom){
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row["turn"] == $_COOKIE["user_id"]){
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