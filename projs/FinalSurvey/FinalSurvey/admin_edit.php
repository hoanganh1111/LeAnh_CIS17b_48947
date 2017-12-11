<!DOCTYPE html>
<html>
    <head>
        <title>Edit User</title>
        <link rel="stylesheet" href="ulStyle.css">
    </head>
    <body>
        <div>Edit a User</div>
        <?php
        // connect to the server
        include '../connect_to_server.php';
        // get the number of user
        $sql = "SELECT `id_survey_user`, `first_name`, `last_name`, `email`, `password` FROM `ale_48947`.`entity_survey_user` AS `entity_survey_user`";
        // access the database
        $result = $conn->query($sql);
        
        // Check for a valid user name
        $idx = $_GET['id_survey_user'];
        if ($idx<=0) {
            echo "
            <script type=\"text/javascript\">
                alert('This page has been accessed in error');
                location.assign('admin_view.php');
            </script>
            ";
        }
        
        // Create the form:
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($idx == $row["id_survey_user"]){
                    $str='<form action="update_user.php" method="post">';
                    $str.='<br>User ID:<br><input type="text" name="id_shop_user" value="'.$row['id_survey_user'].'" readonly/></p>';
                    $str.='First Name:<br><input type="text" name="first_name" value="'.$row['first_name'].'" required/></p>';
                    $str.='Last Name:<br><input type="text" name="last_name" value="'.$row['last_name'].'" required/></p>';
                    $str.='Email:<br><input type="text" name="email_address" value="'.$row['email'].'" required/></p>';
                    $str.='Password:<br><input type="text" name="password" pattern="[a-zA-Z0-9]{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="'.$row['password'].'" required/></p>';
                    $str.='<p><input type="submit" value="Edit"/></form></p>';
                    
                    echo "
                    <script type=\"text/javascript\">
                        document.write('".$str."');
                        document.write('<a href=\"admin_view.php\">back</a>');
                    </script>
                    ";
                }
            }
        } else {
            echo "0 results";
        }
        
        ?>
        
    </body>
</html>
