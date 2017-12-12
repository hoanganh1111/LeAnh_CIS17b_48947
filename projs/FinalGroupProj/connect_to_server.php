<!DOCTYPE html>
<html>
    <body>

        <?php
        $servername = "209.129.8.7";
        $username = "DnD";
        $password = "dndforthewin";
        $dbname = "DnD_48947";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?> 

    </body>
</html>