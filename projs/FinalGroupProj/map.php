<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="mainStyle.css">
        <link rel="stylesheet" href="mapStyle.css">
    </head>
    
    <body>
        <table id='mapTable'></table>
        
        <!-------------------------- PHP -------------------------->
        <?php
        include '../connect_to_server.php';
        
        // your data
        $charID = $_COOKIE["user_id"];
        $charClass;
        $charXLoc;
        $charYLoc;
        $charSight;
        
        // Player2 data
        $char2ID;
        $char2Class;
        $char2XLoc;
        $char2YLoc;
        $char2Sight;
        
        $sql = "SELECT `char_id_1`, `char_id_2`, `char_id_3`, `char_id_4`, `turn` FROM `DnD_48947`.`room_entity` AS `room_entity`";
        $result = $conn->query($sql);
        
        // retreat character data
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["char_id_1"] == $charID){
                    $char2ID = $row["char_id_2"];
                }else{
                    $char2ID = $row["char_id_1"];
                }
                
                if($row[turn] == $charID){
                    echo '
                    <script type="text/javascript">
                        document.getElementById("waitingBigCont").style.display = "block";
                        document.getElementById("waitingCont").innerHTML = "Please wait for your turn...";
                    </script>
                    ';
                }
            }
        } else {
            echo "0 results";
        }
        
        $sql = "SELECT `char_entity`.`char_id`, `class_enum`.`class`, `char_entity`.`x_loc`, `char_entity`.`y_loc`, `char_entity`.`sight` FROM `DnD_48947`.`class_enum` AS `class_enum`, `DnD_48947`.`char_entity` AS `char_entity` WHERE `class_enum`.`class_id` = `char_entity`.`class_id`";
        $result = $conn->query($sql);
        
        // retreat character data
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["char_id"] == $charID){
                    $charClass = $row["class"];
                    $charXLoc = $row["x_loc"];
                    $charYLoc = $row["y_loc"];
                    $charSight = $row["sight"];
                }else if($row["char_id"] == $char2ID){
                    $char2Class = $row["class"];
                    $char2XLoc = $row["x_loc"];
                    $char2YLoc = $row["y_loc"];
                    $char2Sight = $row["sight"];
                }
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
        
        <!-------------------------- Javascript -------------------------->
        <script type="text/javascript">
            /*------------------------------------ char data ------------------------------------------------*/
            // your data
            var charClass = "<?php echo $charClass ?>";
            var charXLoc = <?php echo $charXLoc ?>;
            var charYLoc = <?php echo $charYLoc ?>;
            var charSight = <?php echo $charSight ?>;
            
            //second player's data
            var char2Class = "<?php echo $char2Class ?>";
            var char2XLoc = <?php echo $char2XLoc ?>;
            var char2YLoc = <?php echo $char2YLoc ?>;
            var char2Sight = <?php echo $char2Sight ?>;
            
            /*----------------------------------- generating the map -----------------------------------------------*/
            function genMap(){
                // map setup values
                var size = 50;
                var numOfRow = 3;
                /* 
                [x_pos, y_pos, obst_shape, obst_size]
                1 = 'T' shape
                2 = 'L' shape
                3 = '-' shape
                4 = '|' shape
                5 = 'C' shape
                default = '-' shape
                */
                var obstLoc = [
                    [5,5,1,10],
                    [4,11,2,12],
                    [20,14,3,12],
                    [20,11,3,12],
                    [20,6,3,12],
                    [20,3,3,12],
                    [25,25,4,18],
                    [30,20,4,10],
                    [37,3,1,8],
                    [5,29,5,10],
                    [37,28,1,10],
                    [29,36,2,9],
                    [8,42,3,7],
                    [20,15,4,11],
                    [34,13,5,11],
                    [40,39,5,5],
                    [40,46,3,7],
                    [3,46,3,7],
                    [9,26,1,6],
                ];
                // [x_pos, y_pos]
                var doorLoc = [
                    [17,15],
                    [34,3],
                    [37,17],
                    [34,28],
                    [17,30],
                    [3,34],
                    [48,34],
                    [34,40]
                ];

                var table = document.getElementById("mapTable");

                /**************************** generate the rooms and the walls ***********************************/
                for(var i = 0; i < size; i++){
                    // size/#, where # is the number of the room
                    // roomRow=17
                    var roomRow= Math.round(size/numOfRow);

                    // new row for table
                    var newRow = table.insertRow(i);

                    // insert size for # of cells
                    for(var j = 0; j < size; j++){
                        // new cell
                        var newCell = newRow.insertCell(j);
                        newCell.innerHTML = "<a id='x" +j+ "y" + i 
                            + "' class='fog' onclick='mapClicked(" + j + "," + i 
                            + ")'>&nbsp;</a>";

                        /******************************** generate the wall *************************************/
                        // wall surrounding the entire map
                        if(i==0 || i==size-1 || j==0 || j==size-1){
                            newCell.classList.add('wall');
                            newCell.innerHTML = "<a id='x" +j+ "y" + i + "' class='fog' disabled><a>";
                        }
                        // horzontial and vertial walls
                        else if(i==roomRow || i==2*(roomRow) || j==roomRow || j==2*(roomRow)){
                            newCell.classList.add('wall');
                            newCell.innerHTML = "<a id='x" +j+ "y" + i + "' class='fog' disabled><a>";
                        }
                        // floor and damaging obstacle
                        else{
                            newCell.classList.add("floor");
                        }
                    }
                }

                /**************************************** generate doors ********************************************/
                for(var i=0; i<doorLoc.length;i++){
                    doorXLoc = doorLoc[i][0];
                    doorYLoc = doorLoc[i][1];

                    var doorCell = document.getElementById("mapTable").rows[doorYLoc].cells[doorXLoc];
                    // remove the exisiting object
                    doorCell.classList.remove("wall");
                    // make the cell a door
                    doorCell.classList.add("door");
                    doorCell.innerHTML = "<a id='x" + doorXLoc + "y" + doorYLoc
                                + "' class='fog' onclick='mapClicked(" + doorXLoc + "," + doorYLoc 
                                + ")'>&nbsp;</a>";
                }
                
                /**************************************** generate obsticles ********************************************/
                for(var i=0; i<obstLoc.length; i++){
                    obstXLoc = obstLoc[i][0];
                    obstYLoc = obstLoc[i][1];
                    obstType = obstLoc[i][2];
                    obstSize = obstLoc[i][3];
                    
                    
                    switch(obstType){
                        case 1:{    // 'T' shape
                            for(var j = 0; j < obstSize; j++){
                                addObst(obstXLoc+j, obstYLoc);
                                addObst(obstXLoc+(obstSize/2), obstYLoc+j);
                            }
                            
                            break;
                        }
                            
                        case 2:{    // 'L' shape
                            for(var j = 0; j < obstSize; j++){
                                addObst(obstXLoc, obstYLoc+j);
                                addObst(obstXLoc+j, obstYLoc+obstSize);
                            }
                            
                            break;
                        }
                            
                        case 3:{    // '-' shape
                            for(var j = 0; j < obstSize; j++){
                                addObst(obstXLoc+j, obstYLoc);
                            }
                            
                            break;
                        }
                            
                        case 4:{    // '|' shape
                            for(var j = 0; j < obstSize; j++){
                                addObst(obstXLoc, obstYLoc+j);
                            }
                            
                            break;
                        }
                            
                        case 5:{    // 'C' shape
                            for(var j = 0; j < obstSize; j++){
                                addObst(obstXLoc+j, obstYLoc);
                                addObst(obstXLoc, obstYLoc+j);
                                addObst(obstXLoc+j, obstYLoc+obstSize);
                            }
                            
                            break;
                        }
                            
                        default:{   // '.' shape
                            addObst(obstXLoc, obstYLoc);
                            
                            break;
                        }
                    }
                }
                
                // display your character
                charLoc(charClass, charXLoc, charYLoc, charSight, true);
                // display the second character
                charLoc(char2Class, char2XLoc, char2YLoc, char2Sight, false);
            }

            /*------------------------------------ function for map ------------------------------------------------*/
            // adding obsticle tile
            function addObst(obstXLoc, obstYLoc){
                var obstCell = document.getElementById("mapTable").rows[obstYLoc].cells[obstXLoc];
                if((!obstCell.classList.contains("wall")) && (!obstCell.classList.contains("wall"))){
                    // remove the exisiting object
                    obstCell.classList.remove("floor");
                    // make the cell a door
                    obstCell.classList.add("wall");
                    obstCell.innerHTML = "<a id='x" + obstXLoc + "y" + obstYLoc + "' class='fog' disabled>&nbsp;</a>";
                }
            }

            //when clicked on the tile of the map
            function mapClicked(x, y){
                charLoc(charClass, x, y, charSight, true);
                charLoc(char2Class, char2XLoc, char2YLoc, char2Sight, false);
                
                waitingPop();
                window.location.href="updateLoc.php?charID="+<?php echo $charID ?>
                    +"&charXLoc="+x
                    +"&charYLoc="+y;

                // clear the hightlight
                clearSelection();
            }
            
            // waiting popup
            function waitingPop(){
                document.getElementById("waitingBigCont").style.display = "block";
                document.getElementById("waitingCont").innerHTML = "Please wait for your turn...";
            }
            
            /*------------------------------------ set character location -----------------------------------------*/
            var prevXLoc = 1;
            var prevYLoc = 1;

            function charLoc(cClass, x, y, charSight, mainChar){
                /******************************** center the map ***************************************************/
                if(mainChar){
                    //get the width and height of the mpa
                    var mapWidth = document.getElementById("map").offsetWidth/2;
                    var mapHeight = document.getElementById("map").offsetHeight/2;

                    // set the character location to the center of the map div 
                    var xLoc = -((x) * 50) + mapWidth;
                    var yLoc = -((y) * 50) + mapHeight;

                    // center the map div to have character in the center of the screen
                    document.getElementById("mapTable").style.left = xLoc + "px";
                    document.getElementById("mapTable").style.top = yLoc + "px";

                    /********************** remove character image, add fog ********************************************/
                    if (document.getElementById("x" + x + "y" + y).hasChildNodes()) {
                        /************************* remove previous character image ************************************/
                        var prevTableCell = document.getElementById("mapTable").rows[prevYLoc].cells[prevXLoc];
                        var prevLoc = document.getElementById("x" + prevXLoc + "y" + prevYLoc);
                        prevLoc.parentNode.removeChild(prevLoc);
                        prevTableCell.innerHTML = "<a id='x" + prevXLoc + "y" + prevYLoc 
                            + "' class='fog' onclick='mapClicked(" + prevXLoc + "," + prevYLoc 
                            + ")'>&nbsp;</a>";

                        /************************************** add fog ************************************************/
                        var prevXBeg = prevXLoc - charSight;
                        if(prevXBeg < 0) prevXBeg = 0;
                        var prevXEnd = prevXLoc + charSight;
                        if(prevXEnd > 49) prevXEnd = 49;

                        var prevYBeg = prevYLoc - charSight;
                        if(prevYBeg < 0) prevYBeg = 0;
                        var prevYEnd = prevYLoc + charSight;
                        if(prevYEnd > 49) prevYEnd = 49;

                        for(var i = prevXBeg; i <= prevXEnd; i++){
                            for(var j = prevYBeg; j <=prevYEnd; j++){
                                var XYLoc = document.getElementById("x" + i + "y" + j);
                                if(XYLoc.classList.contains("active", "char<?php echo $charID?>")){
                                    addFogAt(XYLoc);
                                }
                            }
                        }

                        // save the previous location
                        prevXLoc = x;
                        prevYLoc = y;
                    }
                }

                /************************************** add class image ********************************************/
                var classImg = document.createElement("IMG");
                classImg.setAttribute("src", "class_img/" + cClass + "_sprite.jpg");
                classImg.setAttribute("style", "display: block;");
                classImg.setAttribute("style", "float: left;");
                classImg.setAttribute("style", "height: 100%;");
                classImg.setAttribute("style", "width: 100%;");
                classImg.setAttribute("style", "position: absolute;object-fit: contain; max-width:45px; max-height:45px;");
                document.getElementById("x" + x + "y" + y).appendChild(classImg);
                if(!mainChar){
                    document.getElementById("x" + x + "y" + y).classList.add("notYou");
                }

                /****************************************** remove  fogs *******************************************/
                var fogLoc;

                // remove fog - top half, scan left to right
                // also includes center
                for(var i = 0; i <= charSight; i++){
                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x+j) + "y" + (y-i));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x-j) + "y" + (y-i));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    fogLoc = document.getElementById("x" + x + "y" + (y-i));
                    removeFogAt(fogLoc, mainChar);

                    if(fogLoc.parentNode.classList.contains("wall")){
                        i = charSight;
                    }
                }

                // remove fog - right half, scan top to bottom
                for(var i = 1; i <= charSight; i++){
                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x+i) + "y" + (y+j));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x+i) + "y" + (y-j));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    fogLoc = document.getElementById("x" + (x+i) + "y" + y);
                    removeFogAt(fogLoc, mainChar);

                    if(fogLoc.parentNode.classList.contains("wall")){
                        i = charSight;
                    }
                }

                // remove fog - bottom half, scan left to right
                for(var i = 1; i <= charSight; i++){
                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x+j) + "y" + (y+i));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x-j) + "y" + (y+i));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    fogLoc = document.getElementById("x" + x + "y" + (y+i));
                    removeFogAt(fogLoc, mainChar);

                    if(fogLoc.parentNode.classList.contains("wall")){
                        i = charSight;
                    }
                }

                // remove fog - left half, scan top to bottom
                for(var i = 1; i <= charSight; i++){
                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x-i) + "y" + (y+j));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    for(var j = 1; j <= charSight-i; j++){
                        fogLoc = document.getElementById("x" + (x-i) + "y" + (y-j));
                        removeFogAt(fogLoc, mainChar);

                        if(fogLoc.parentNode.classList.contains("wall")){
                            j = charSight-i;
                        }
                    }

                    fogLoc = document.getElementById("x" + (x-i) + "y" + y);
                    removeFogAt(fogLoc, mainChar);

                    if(fogLoc.parentNode.classList.contains("wall")){
                        i = charSight;
                    }
                }
            }

            /*------------------------------------ function for fog ------------------------------------------------*/
            // add fog at specific location
            function addFogAt(loc){
                loc.classList.remove("active", "char<?php echo $charID?>", "notYou");
                loc.classList.add("fog");
            }

            // remove fog at specific location
            function removeFogAt(loc, mainChar){
                loc.classList.remove("fog");
                if(!mainChar){
                    if(!loc.classList.contains("active")){
                        loc.classList.add("notYou");
                    }
                }else{
                    loc.classList.add("active", "char<?php echo $charID?>");
                }
            }

            function clearSelection() {
                if(document.selection && document.selection.empty) {
                    document.selection.empty();
                } else if(window.getSelection) {
                    var sel = window.getSelection();
                    sel.removeAllRanges();
                }
            }
        </script>
    </body>
</html>