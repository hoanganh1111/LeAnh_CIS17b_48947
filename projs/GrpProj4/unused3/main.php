<!DOCTYPE html>
<html>
	<head>
		<title>D&D</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="mainStyle.css">
        <link rel="stylesheet" href="mapStyle.css">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <script src="rollDice.js"></script>
	</head>
	<body>
        <!-------------- header bar --------------->
        <div class="header">
            <img src="other_img/logo.png" width="50%">
        </div>
        
        <!-------------- main/body --------------->
        <div class="main">
            <!-- map -->
            <div id="map">
                <table id='mapTable'></table>
                <img class="border" src="other_img/frame.png">
            </div>
            
            <!--- side bar --->
            <div class="side_bar">
                <!-- player_info -->
                <div class="player_info">
                    <img class="border" src="other_img/frame.png">
                </div>
                
                <!-- dice button -->
                <div class="dice">
                    <a id="dice_button" onclick="rollDice(12)">ROLL</a>
                </div>

                <!-- skip button -->
                <div class="skip">
                    <button id="skip_button">SKIP</button>
                </div>

                <!-- skill -->
                <div class="skill">
                    <img class="border" src="other_img/frame.png">
                </div>

                <!-- inventory -->
                <div class="inventory">
                    <img class="border" src="other_img/frame.png">
                </div>

                <!-- turns -->
                <div class="turns">
                    <img class="border" src="other_img/frame.png">
                </div>
            </div>
        </div>
        
        <!-------------- footer bar --------------->
        <div class="footer">
        
        </div>
        
        <?php

            include 'map.php';

            ?>
        
        <!----------------------------------- javascript ----------------------------------->
        <script type="text/javascript">
            // php script
            
            
            // js script
            window.onload = function(){
                init();
            }
            
            function init(){
                genMap(50);
            }
            
        </script>
        
	</body>
</html>