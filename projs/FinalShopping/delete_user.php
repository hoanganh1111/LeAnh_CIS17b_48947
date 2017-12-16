<!DOCTYPE html>
<html>
    <head>
        <title>Edit a User</title>
    </head>
    <body>
        
        <?php
        
        if(!isset($_COOKIE["adminEmail"])) {
            echo "<script type=\"text/javascript\"> alert('Admin Login Fail!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        // connect to the server
        include '../../connect_to_server.php';
        
        // sql to delete an user
        $sql = "DELETE FROM entity_shop_user WHERE id_shop_user=".$_GET["id_shop_user"]."";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script type=\"text/javascript\">
                alert('User deleted');
                location.assign('admin_view.php');
            </script>
            ";
        } else {
            $errorMsg = "Error deleting record: " . $conn->error;
            echo "
            <script type=\"text/javascript\">
                alert(\"".$errorMsg."\");
                location.assign('admin_view.php');
            </script>
            ";
        }
        
        ?>
        
    </body>
</html>