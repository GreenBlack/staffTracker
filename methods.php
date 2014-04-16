<?php
/*
    Converts $steamID into steam64 and returns it
*/
function steamID_steam64($steamID){
    
     list($e, $type, $id) = split(":", $steamID);
    return ($id * 2) + 76561197960265728 + $type;
    
}

/*
    Gets player.json from valve with $steam64 then returns it decoded
*/
function steam64_json($steam64){
    return json_decode(file_get_contents('https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CA7B8780E22D27C381BD47BF41565B27&steamids='. strval($steam64)), true);
    
}

