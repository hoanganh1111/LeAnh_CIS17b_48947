<!DOCTYPE html>
<html>
	<head>
		<title>D&D</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="mainStyle.css">
        <link rel="stylesheet" href="mapStyle.css">
        <link rel="stylesheet" href="playerInfo.css">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <script src="rollDice.js"></script>
        <script src="Mage.js"></script>
        <script src="playerInfo.js"></script>
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
<!--                <table id='mapTable'></table>-->
                <iframe id="mapIframe" class="iframe" style="display:block" scrolling="no"></iframe>
                <img class="border" src="other_img/frame.png">
            </div>
            
            <!--- side bar --->
            <div class="side_bar">
                <!-- player_info -->
                <div class="player_info">
                    <img class="border" src="other_img/frame.png">
                    <img class="char_icon" src="other_img/mageIcon.png" onmouseover="showInfo()" onmouseout="hideInfo()">
                    <div id="info_cont">
                        <div id="char_info">
                            <p id="playerHp"></p>
                            <p id="playerMa"></p>
                        </div>
                        <div id="icon">
                            <div id="char_atr">
                                <p id="playerAtr"></p>
                                </div>
                             <div id="char_stat">   
                                <p id="playerSta"></p>
                            </div>
                        </div>
                    </div>
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
        
        <!----------------------------------- javascript ----------------------------------->
        <script type="text/javascript">
            // php script
            
            
            // js script
            window.onload = function(){
                init();
            }
            
            function init(){
                setMapSrc();
                //printPlayerInfo();
                // Place character on the map
                //charLoc(charClass, charXLoc, charYLoc, charSight);
            }
            
            function setMapSrc() {
                var mapIframeWdith = document.getElementById("map").offsetWidth;
                var mapIframeHeight = document.getElementById("map").offsetHeight;

                document.getElementById('mapIframe').src = "map.php?width=" + mapIframeWdith + "&height=" + mapIframeHeight;
            } 
            
        </script>
        
	</body>
</html>