<!DOCTYPE html>
<html>
    <body>

        <?php
        
        include 'connect_to_server.php';
        
        $charID = $_GET['charID'];
        $charXLoc = $_GET['charXLoc'];
        $charYLoc = $_GET['charYLoc'];
        
        $sql = "UPDATE char_entity SET x_loc='".$charXLoc."', y_loc='".$charYLoc."' WHERE char_id=".$charID;
        
        if ($conn->query($sql) === TRUE) {
            echo "
            <script type=\"text/javascript\">
                window.location.replace('map.php?width=".$_GET['width']."&height=".$_GET['height']."');
            </script>
            ";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        ?> 

    </body>
</html>