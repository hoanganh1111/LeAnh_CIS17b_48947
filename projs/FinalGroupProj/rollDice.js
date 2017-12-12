function rollDice(faces) {
    var elem = document.getElementById("dice_button");
    var id = setInterval(frame, 100);
    var count = 0;
    var num = faces;
    function frame() {
        num = Math.floor((Math.random() * faces) + 1);
        elem.innerHTML = num;
        count++;
        if(count == 5){
            clearInterval(id);
        }
    }
    
    return num;
}