<?php

/*
    Cacheing function for faster name loading
*/

function cache()
{
	
	//sleep for one minute to eliminate the possibility of un-finished saves.
	sleep(60);

	//load most current file. Because the cache ans save file are run at the same second, that's why we wait to make sure the file exists before loading it.
	$data = json_decode(file_get_contents("./saves/v2/" . date("Y-m-d@H") . ".json"), true);

		$steamQuery;

	//define assosiative array (dictonary) and set the values to null to be replaced.
	for($i = 0; $i < count($data); $i++)
	{
		$steamID[$data[$i]["steamID"]] = null;
	}

	//loop through every assosiative array key and append them to a string.
	foreach($steamID as $id => $x)
	{
		$steamQuery .= $id. ",";
	}

	//send that string to steam and get profile/playerdata back (method included in this class).
	$idData = steam64_json($steamQuery);

	//loop through the data that steam returned and append it to an assosiative array in the form of key = 64bitID => value = steam name at time of request.
	for($i = 0; $i < count($idData); $i++)
	{
			   $steamID[(string)$idData[$i]["steamid"]] = $idData[$i]["personaname"];
	}

	echo("cache started at " . date("H:m") . "<br>\n");
	
	//encode and save the data
	save(".", "cache", json_encode($steamID), ".json", "w");
	
	echo("finished cache at ". date("H:m") . "<br>\n cahched " . count($steamID) . " names");
    }

/*
	Converts a STEAM_0: ID to a 64bit ID
*/

function steamID_steam64($steamID)
{
    
	//split the data into 3 types, 2 of them we actually need ($type, $id)
     list($e, $type, $id) = split(":", $steamID);
	
	//some math to figure out and return the 64 bit ID
    return ($id * 2) + 76561197960265728 + $type;
    
}

/*
	Steam data
*/
<<<<<<< HEAD

function steam64_json($steam64)
{
	
	//returns the json data from steam. Can have multiple steam IDs sent if appended in the $steam64 (must be appended with a "," and no breaks)
	$x = json_decode(file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CA7B8780E22D27C381BD47BF41565B27&steamids='. strval($steam64)), true);
    return $x["response"]["players"];
}

/*
	Save function. Easier than copying and pasting multiple lines.
*/

function save($location, $filename, $data, $extention, $action){
	
	//example: save("saves", "test", null, ".txt", "w")
	$fp = fopen( $location . "/" . $filename .  $extention, $action);
	fwrite($fp, $data);
    fclose($fp);
}

/*
	Takes seconds, converts them into years, weeks, days, hours, minutes
*/

function time_elapsed_A($secs){
	
	if($secs == null){ return false; }
	
=======
function steam64_json($steam64){
    $x = json_decode(file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=CA7B8780E22D27C381BD47BF41565B27&steamids='. strval($steam64)), true);
    return $x["response"]["players"];
}

function save($location, $filename, $data, $extention, $action){
#	save("saves", "test", null, ".txt", "w")	#
	$fp = fopen( $location . "/" . $filename .  $extention, $action);
	fwrite($fp, $data);
    fclose($fp);
}

function time_elapsed_A($secs){
>>>>>>> c1ca423e92c5e7910bca84e3a04f36b915fe8ad3
    $bit = array(
        'y' => $secs / 31556926 % 12,
        'w' => $secs / 604800 % 52,
        'd' => $secs / 86400 % 7,
        'h' => $secs / 3600 % 24,
        'm' => $secs / 60 % 60,
        's' => $secs % 60
        );
        
    foreach($bit as $k => $v)
        if($v > 0)$ret[] = $v . $k;
        
    return join(' ', $ret);
    }
    