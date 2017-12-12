function logout(){
    var conf = confirm("Are you sure you want to log out?");
    if(conf){
        location.replace("logout.php");
    }
}