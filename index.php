<?php 
header('Content-Type: charset="utf-8"');
//major dependency
include("methods.php");

#	Save function, will run every 24 hours or every hour depending on crontab status. impliments IP security	#

if ($_GET["action"] == "save"){
    
    $accessIP = ["208.146.35.21"];
    
    if (in_array ($_SERVER['REMOTE_ADDR'], $accessIP)) {
		
		 echo("\nSave started at " . date('i:s'));
    
    $data = json_decode(file_get_contents('https://ttt-fun.com/staff/?json=1'), true);
    
		if ($data == null){
				echo("Save error! null data at " . date('i:s'));
			    sleep(300);
                shell_exec("curl http://pb-mc.net/?action=save");
                exit;
		}
		
    for ($i = 0; $i < count($data); $i++){
        $savef[$i]["steamID"] = steamID_steam64($data[$i]['steam']);
	    $savef[$i]["time"] = $data[$i]['onlinetime'];
    }   
    
		save("saves/v2", date('Y-m-d@H'), json_encode($savef), ".json", "w");
    
    echo("\nSave finished at ". date('i:s') . "\n");
    }else{
		
        $access = "Bad request at ". date("Y-m-d h:i:s A"). " with IP " . $_SERVER['REMOTE_ADDR'] . "\n";
        
        echo($access . "Your IP has been logged.");
		save(".", "access", $_SERVER['REMOTE_ADDR'] . " ", ".txt", "a");
	}
}
    elseif($_GET["action"] == "log"){

$data = file_get_contents("./access.txt");
$data = explode(" ", $data, -1);
$finished;

for($i = 0; $i < count($data); $i++)
{
    if(isset($finished[$data[$i]]))
    {
        $finished[$data[$i]]++;
    }
    else
    {
        $finished[$data[$i]] = 1;
    }
}

foreach($finished as $ip => $times){
    echo($ip . " : " . $times . "\n");
}
	
}else{
		
		echo((int)count(scandir("saves/v2")) - 2 . " save files starting at ". substr(scandir("saves/v2")[2], 0, 13) . " and ending at " . date("Y-m-d@H"));
		
} ?>