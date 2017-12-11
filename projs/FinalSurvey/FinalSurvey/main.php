<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="Survey.js"></script>
        <script type="text/javascript" src="Question.js"></script>
        <script type="text/javascript" src="clearStorage.js"></script>
        <link rel="stylesheet" href="surveyStyle.css">
        <title>The Survey</title>
    </head>
    <body>
        <ul id="topnav">
        </ul>
        
        <div id="main">
            <div id="createSurvey">
            </div>
            
            <h1 id="survey_name"></h1>
            <p id="description"></p> 
        </div>
        
        <?php
            if(!isset($_COOKIE["userEmail"])) {
               echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
            }
        ?>
        
        <script type="text/javascript">     
            
            //Check if survey object exist in local storage
            if('survey' in localStorage){
                var node = document.getElementById('createSurvey');
                while (node.hasChildNodes()) {
                    node.removeChild(node.firstChild);
                }
                
                //Reconstruct the survey object from local storage
                var newSurvey = new Survey();
                newSurvey.reconstSurvey();
                // Display the survey
                newSurvey.displaySurvey();    
            }
        </script>
    </body>
</html>
