<!DOCTYPE html>
<html>
    <body>

        <?php
        include '../connect_to_server.php';

        
        setcookie("user_id", "", time() - 3600);
        setcookie("first", "", time() - 3600);
        setcookie("last", "", time() - 3600);
        setcookie("email", "", time() - 3600);
        setcookie("char_id", "", time() - 3600);
        
        $sql = "UPDATE room_entity SET ".$_COOKIE["room_loc"]."='' WHERE room_id=1";
        
        if ($conn->query($sql) === TRUE) {
            echo "
            <script type=\"text/javascript\">
                window.location.replace('Login.php');
            </script>
            ";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        $conn->close();
        ?> 

    </body>
</html>