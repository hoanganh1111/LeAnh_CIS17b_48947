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
        
        $sql = "SELECT `user_entity`.`user_id`, `user_entity`.`first_name`, `user_entity`.`last_name`, `user_entity`.`email`, `user_entity`.`username`, `user_entity`.`password`, `user_char_xref`.`char_id` FROM `DnD_48947`.`user_char_xref` AS `user_char_xref`, `DnD_48947`.`user_entity` AS `user_entity`, `DnD_48947`.`char_entity` AS `char_entity` WHERE `user_char_xref`.`user_id` = `user_entity`.`user_id` AND `user_char_xref`.`char_id` = `char_entity`.`char_id`";
        
//        include 'connect_to_server_local.php';
//        $sql = "SELECT `first_name`, `last_name`, `email`, `username`, `password` FROM `DnD`.`user_entity` AS `user_entity`";
        
        $result = $conn->query($sql);
        
        $logedin = false;
        $turnSet = false;
        
        $user_id;
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if(strtolower($_POST["email"]) === strtolower($row["email"]) && $_POST["password"] === $row["password"]){
                    setcookie('user_id',$row["user_id"]);
                    setcookie('first', $row["first_name"]);
                    setcookie('last', $row["last_name"]);
                    setcookie('email',$row["email"]);
                    setcookie('username',$row["username"]);
                    setcookie('char_id',$row["char_id"]);
                    
                    $user_id = $row["user_id"];
                    
                    $logedin = true;
                    }
                }
            }else {
            echo "0 results";
        }
        
        if($logedin){
            $sql = "SELECT `char_id_1`, `char_id_2`, `char_id_3`, `char_id_4` FROM `DnD_48947`.`room_entity` AS `room_entity`";
            $result = $conn->query($sql);
            $roomLoc = "";
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row["char_id_1"] == "" || $row["char_id_1"] == 0){
                        $roomLoc = "char_id_1";
                        $turnSet = false;
                    }else if($row["char_id_2"] == "" || $row["char_id_2"] == 0){
                        $roomLoc = "char_id_2";
                        $turnSet = true;
                    }else if($row["char_id_3"] == "" || $row["char_id_3"] == 0){
                        $roomLoc = "char_id_3";
                        $turnSet = true;
                    }else if($row["char_id_4"] == "" || $row["char_id_4"] == 0){
                        $roomLoc = "char_id_4";
                        $turnSet = true;
                    }else{
                        echo '
                        <script type="text/javascript">
                            alert("Invalid username or password");
                            window.location.replace("logout.php");
                        </script>';
                    }
                }
            }else {
                $logedin = false;
                echo "0 results";
            }
            
            // runs if you are the first player
            if(!$turnSet){
                $sql = "UPDATE room_entity SET turn='".$user_id."' WHERE room_id='1'";
                if ($conn->query($sql) === TRUE) {
                    $turnSet = true;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
            if($logedin && $turnSet){
                setcookie('room_loc',$roomLoc);
                
                echo "<script type=\"text/javascript\"> window.location.replace('character_creation.html');</script>";
            }
        }
        
        if(!$logedin){
            echo "<script type=\"text/javascript\"> alert('Invalid username or password')</script>";
            echo '<script type="text/javascript" src="logout.js">logout()</script>';
        }
       
        $conn->close();
        ?>
    </body>
</html>
