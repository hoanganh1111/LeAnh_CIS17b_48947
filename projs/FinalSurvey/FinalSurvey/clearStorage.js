/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function clearStorage(){
    if(confirm("Press 'OK' to confirm")){
        window.localStorage.clear();
        window.location.reload();
    }
}