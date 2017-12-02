/*------------------------------------ for testing ------------------------------------------------*/

var charClass = "Mage";
var charXLoc = 1;
var charYLoc = 1;
var charSight = 3;

/*------------------------------------ generate the map ------------------------------------------------*/
var table = document.getElementById("mapTable");

function genMap(size){
    var numOfRow = 3;
    
    for(var i = 0; i < size; i++){
        // size/#, where # is the number of the room
        var roomRow= Math.round(size/numOfRow)

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
                newCell.classList.add(randTile());
            }
        }
        
    }
    
    /**************************************** generate doors ********************************************/
    // door for the verticle walls
    for(var i = 1; i < numOfRow; i++){
        // randomly choices a location for the door
        var doorXLoc = roomRow * i;
        
        for(var j = 0; j < numOfRow; j++){
            // make sure the door isn't in between two walls
            // or on the wall surrounding the whole map
            var run = true;
            while(run){
                var doorYLoc = Math.floor(Math.random() * roomRow) + (j * roomRow);
                if((doorYLoc != (roomRow * j)) && doorYLoc != 0 && doorYLoc != 49){
                    run = false;
                }
            }
            
            var doorCell = document.getElementById("mapTable").rows[doorYLoc].cells[doorXLoc];
            // remove the exisiting classes
            doorCell.classList.remove("wall");
            // make the cell a door
            doorCell.classList.add("door");
            doorCell.innerHTML = "<a id='x" + doorXLoc + "y" + doorYLoc
                        + "' class='fog' onclick='mapClicked(" + doorXLoc + "," + doorYLoc 
                        + ")'>&nbsp;</a>";
        }
    }
    
    //door for the horizontal walls
    for(var i = 1; i < numOfRow; i++){
        // randomly choices a location for the door
        var doorYLoc = roomRow * i;
        
        for(var j = 0; j < numOfRow; j++){
            // make sure the door isn't in between two walls
            // or on the wall surrounding the whole map
            var run = true;
            while(run){
                var doorXLoc = Math.floor(Math.random() * roomRow) + (j * roomRow);
                if((doorXLoc != (roomRow * j)) && doorXLoc != 0 && doorXLoc != 49){
                    run = false;
                }
            }
            
            var doorCell = document.getElementById("mapTable").rows[doorYLoc].cells[doorXLoc];
            // remove the exisiting classes
            doorCell.classList.remove("wall");
            // make the cell a door
            doorCell.classList.add("door");
            doorCell.innerHTML = "<a id='x" + doorXLoc + "y" + doorYLoc
                        + "' class='fog' onclick='mapClicked(" + doorXLoc + "," + doorYLoc 
                        + ")'>&nbsp;</a>";
        }
    }
    
    // Place character on the map
    charLoc(charClass, charXLoc, charYLoc, charSight);
}

/*------------------------------------ function for map ------------------------------------------------*/
// rand a tile to be floor or lava
function randTile() {
    var num = Math.floor(Math.random() * 20);
    if(num>=3){
        return "floor";
    }else if(num>=0){
        return "lava";
    }
}

// when clicked on the tile of the map
function mapClicked(x, y){
    if(document.getElementById("x" + x + "y" + y).classList.contains("active")){
        charLoc(charClass, x, y, charSight);
    }
    
    // clear the hightlight
    clearSelection();
}

 /*------------------------------------ set character location -----------------------------------------*/
var prevXLoc = 1;
var prevYLoc = 1;

function charLoc(cClass, x, y, charSight){
    /******************************** center the map ***************************************************/
    // get the width and height of the mpa
    var mapWidth = (document.getElementById("map").offsetWidth)/2;
    var mapHeight = (document.getElementById("map").offsetHeight)/2;

    // set the character location to the center of the map div 
    var xLoc = -((x) * 50) + mapWidth - 4*x -29;
    var yLoc = -((y) * 50) + mapHeight - 4*y - 29;

    // center the mpa div to have character in the center of the screen
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
                if(XYLoc.classList.contains("active")){
                    addFogAt(XYLoc);
                }
            }
        }

        // save the previous location
        prevXLoc = x;
        prevYLoc = y;
    }

    /************************************** add class image ********************************************/
    var classImg = document.createElement("IMG");
    classImg.setAttribute("src", "class_img/" + cClass + "_sprite.jpg");
    classImg.setAttribute("style", "height: 100%;");
    classImg.setAttribute("style", "width: 100%;");
    classImg.setAttribute("style", "object-fit: contain;");
    document.getElementById("x" + x + "y" + y).appendChild(classImg);

    /****************************************** remove  fogs *******************************************/
    var fogLoc;
    
    // remove fog - top half, scan left to right
    // also includes center
    for(var i = 0; i <= charSight; i++){
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x+j) + "y" + (y-i));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x-j) + "y" + (y-i));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        fogLoc = document.getElementById("x" + x + "y" + (y-i));
        removeFogAt(fogLoc);
        
        if(fogLoc.parentNode.classList.contains("wall")){
            i = charSight;
        }
    }
    
    // remove fog - right half, scan top to bottom
    for(var i = 1; i <= charSight; i++){
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x+i) + "y" + (y+j));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x+i) + "y" + (y-j));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        fogLoc = document.getElementById("x" + (x+i) + "y" + y);
        removeFogAt(fogLoc);
        
        if(fogLoc.parentNode.classList.contains("wall")){
            i = charSight;
        }
    }
    
    // remove fog - bottom half, scan left to right
    for(var i = 1; i <= charSight; i++){
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x+j) + "y" + (y+i));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x-j) + "y" + (y+i));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        fogLoc = document.getElementById("x" + x + "y" + (y+i));
        removeFogAt(fogLoc);
        
        if(fogLoc.parentNode.classList.contains("wall")){
            i = charSight;
        }
    }
    
    // remove fog - left half, scan top to bottom
    for(var i = 1; i <= charSight; i++){
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x-i) + "y" + (y+j));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        for(var j = 1; j <= charSight-i; j++){
            fogLoc = document.getElementById("x" + (x-i) + "y" + (y-j));
            removeFogAt(fogLoc);
            
            if(fogLoc.parentNode.classList.contains("wall")){
                j = charSight-i;
            }
        }
        
        fogLoc = document.getElementById("x" + (x-i) + "y" + y);
        removeFogAt(fogLoc);
        
        if(fogLoc.parentNode.classList.contains("wall")){
            i = charSight;
        }
    }
}

/*------------------------------------ function for fog ------------------------------------------------*/
// add fog at specific location
function addFogAt(loc){
    loc.classList.remove("active");
    loc.classList.add("fog");
}

// remove fog at specific location
function removeFogAt(loc){
    loc.classList.remove("fog");
    loc.classList.add("active");
}

function clearSelection() {
    if(document.selection && document.selection.empty) {
        document.selection.empty();
    } else if(window.getSelection) {
        var sel = window.getSelection();
        sel.removeAllRanges();
    }
}