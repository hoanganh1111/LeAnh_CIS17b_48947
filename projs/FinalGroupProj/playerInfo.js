// for testing
var a = new Mage(1,3,1,1);
a.baseStat();

function printPlayerInfo(){
    document.getElementById("playerHp").innerHTML = "HP: " + a.HP;
    document.getElementById("playerMa").innerHTML = "MA: " + a.MA;

    document.getElementById("playerAtr").innerHTML = "Str: " + a.STR + "<br>Int: " + a.INT+
                                                     "<br>Dex: " + a.DEX+"<br>Con: " + a.CON+
                                                     "<br>Con: " + a.CON;

    document.getElementById("playerSta").innerHTML = "Atk: " + a.ATK+ "<br>Def: " + a.DEF+ 
                                                     "<br>MaAtk: " + a.MATK+"<br>Spd: " + a.SPD+
                                                     "<br>Sight: " + a.SIGHT;
}

function showInfo(){
    document.getElementById("icon").style.display = "block";
    document.getElementById("char_info").style.display = "none";
}

function hideInfo(){
    document.getElementById("icon").style.display = "none";
    document.getElementById("char_info").style.display = "block";
}