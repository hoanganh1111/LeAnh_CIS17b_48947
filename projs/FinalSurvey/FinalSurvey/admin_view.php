<!DOCTYPE html>
<html>
    <head>
        <title>User Table</title>
        <script type="text/javascript" src="clearStorage.js"></script>
         <link rel="stylesheet" href="ulStyle.css">
    </head>
    <body>
        <ul class="topnav">
            <li><a href="admin_main.html">Admin Main Page</a></li>
            <li><a href="addQuestion.html">Add Question</a></li>
            <li><a href="getResult.html">Display Result</a></li>
            <li><a href="TempSurvey.html">Display Template Survey</a></li>
            <li><a href="admin_view.php" onclick="clearStorage()" class="right" >Delete the Survey</a></li>
            <li><a href="admin_view.php" onclick="delete_cookie()">Delete The User Cookies</a></li>
            <li style="float:right"><a class="active" onclick="delete_cookie_admin()" href="login.html">Log Out</a></li>
        </ul>
        <h1>Display the User Table</h1> 
        
        <?php
        
        if(!isset($_COOKIE["adminEmail"])) {
            echo "<script type=\"text/javascript\"> alert('Admin Login Fail!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        include '../connect_to_server.php';
        
        $display = 5;
        $pages=0;
        $start=0;

        // get the number of user
        $sql = "SELECT `id_survey_user` FROM `ale_48947`.`entity_survey_user` AS `entity_survey_user`";
        
        // access the database
        $result = $conn->query($sql);
        
        // Determine how many pages there are...
        if(isset($_GET['p'])){
            $pages = $_GET['p'];
        }else {
            $records = $result->num_rows;
            // Calculate the number of pages...
            if ($records > $display) { // More than 1 page.
                    $pages = ceil ($records/$display);
            } else {
                    $pages = 1;
            }
        }
        
        // Determine where in the database to start returning results...
        if(isset($_GET['s'])){
            if (intval($_GET['s'], 10)>0){
                $start = $_GET['s'];
            } else {
                $start = 0;
            }
        }

        // Determine the sort...
        $sort = "last_name";
        if(isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        
        // Determine the sorting order:
        switch ($sort) {
                case 'first_name':
                        $sort = 'first_name';
                        break;
                case 'last_name':
                        $sort = 'last_name';
                        break;
                case 'email':
                        $sort = 'email';
                        break;
                case 'password':
                        $sort = 'password';
                        break;
                default:
                        $sort = 'last_name';
                        break;
        }
        
        // Define the query:
        $sql = "SELECT  `id_survey_user`, `first_name`, `last_name`, `email`, `password` FROM `ale_48947`.`entity_survey_user` AS `entity_survey_user` ORDER BY `".$sort."` LIMIT ".$start.", ".$display."";
        
        // access the database
        $result = $conn->query($sql);
        
        // Table header
        $strTab='<table align="center" cellspacing="0" cellpadding="5" width="75%">';
        $strTab.='<tr>';
        $strTab.='<td align="left"><b>Edit</b></td>';
        $strTab.='<td align="left"><b>Delete</b></td>';
        $strTab.='<td align="left"><b><a href="admin_view.php?sort=first_name">First Name</a></b></td>';
        $strTab.='<td align="left"><b><a href="admin_view.php?sort=last_name">Last Name</a></b></td>';
        $strTab.='<td align="left"><b><a href="admin_view.php?sort=email">Email</a></b></td>';
        $strTab.='<td align="left"><b><a href="admin_view.php?sort=password">Password</a></b></td>';
        $strTab.='</tr>';
        
        // create the table
        echo "
        <script type=\"text/javascript\">
            document.write('".$strTab."');
        </script>
        ";
        
        // Fetch and print all the records....
        $end = $result->num_rows;
        if($end-$start>$display){
            $end=1*$start+$display;
        }
        $bg = '#eeeeee';
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
                $strRow= '<tr bgcolor="'.$bg.'">';
                $strRow.=('<td align="left"><a href="admin_edit.php?id_survey_user='.$row["id_survey_user"].'">Edit</a></td>');
                $strRow.=('<td align="left"><a onclick="deleteUser('.$row['id_survey_user'].')" style="cursor:pointer">Delete</a></td>');
                $strRow.=('<td align="left">'.$row['first_name'].'</td>');
                $strRow.=('<td align="left">'.$row['last_name'].'</td>');
                $strRow.=('<td align="left">'.$row['email'].'</td>');
                $strRow.=('<td align="left">'.$row['password'].'</td>');
                $strRow.='</tr>';
                
                echo "
                <script type=\"text/javascript\">
                    document.write('".$strRow."');
                </script>
                ";
            }
        } else {
            echo "0 results";
        }
        
        echo "
        <script type=\"text/javascript\">
            document.write('</table>');
        </script>
        ";
        
        // Make the links to other pages, if necessary.
        if ($pages > 1) {
            echo "
            <script type=\"text/javascript\">
                document.write('<br /><p>');
            </script>
            ";
            $current_page = floor($start/$display) + 1;

            // If it's not the first page, make a Previous button:
            if ($current_page != 1) {
                $pageStart = $start - $display;
                $url = "admin_view.php?s=".$pageStart."&p=".$pages."&sort=".$sort."";
                echo "
                <script type=\"text/javascript\">
                    document.write('<a href=".$url.">Previous</a> ');
                </script>
                ";
            }

            // Make all the numbered pages:
            for ($i = 1; $i <= $pages; $i++) {
                    if ($i != $current_page) {
                        $pageDisplay = $display * ($i - 1);
                        $url = "admin_view.php?s=".$pageDisplay."&p=".$pages."&sort=".$sort."";
                        echo "
                        <script type=\"text/javascript\">
                            document.write(\"<a href='".$url."'>".$i."</a>\");
                        </script>
                        ";
                    } else {
                        echo "
                        <script type=\"text/javascript\">
                            document.write(".$i.");
                        </script>
                        ";
                    }
            } // End of FOR loop.

            // If it's not the last page, make a Next button:
            if ($current_page != $pages) {
                $StartPDisplay = 1*$start + $display;
                $url = "admin_view.php?s=".$StartPDisplay."&p=".$pages."&sort=".$sort."";
                echo "
                <script type=\"text/javascript\">
                    document.write(\"<a href='".$url."'>Next</a>\");
                </script>
                ";
            }

            echo "
            <script type=\"text/javascript\">
                document.write('</p>'); // Close the paragraph.
            </script>
            ";

        }
        
        $conn->close();
        ?>
        
        <script type="text/javascript">
            function deleteUser(userLoc){
                var conf = confirm("You sure you want to delete this user?");
                
                if(conf == true){
                    location.assign("delete_user.php?id_survey_user='"+userLoc+"'");
                }
            }
            
            function delete_cookie() {
                document.cookie = "userEmail=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../";
                document.cookie = "userFirst=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../";
                document.cookie = "userLast=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../";

                alert("The user cookies has been deleted!");
            }
            
            function delete_cookie_admin() {
                document.cookie = "adminEmail=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../";
                document.cookie = "adminFirst=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../";
                document.cookie = "adminLast=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../";

                alert("Goodbye Admin!");
            }
        </script>
        
    </body>
</html>