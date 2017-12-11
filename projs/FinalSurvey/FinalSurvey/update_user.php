<!DOCTYPE html>
<html>
    <head>
        <title>Edit a User</title>
    </head>
    <body>
        
        <?php
        
        // connect to the server
        include '../connect_to_server.php';
        
        // update user info
        $sql = "UPDATE entity_survey_user SET first_name='".$_POST["first_name"]."', last_Name='".$_POST["last_name"]."', email='".$_POST["email"]."', password='".$_POST["password"]."' WHERE id_survey_user='".$_POST["id_survey_user"]."'";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script type=\"text/javascript\">
                location.assign('admin_view.php');
            </script>
            ";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        ?>
        
    </body>
</html>