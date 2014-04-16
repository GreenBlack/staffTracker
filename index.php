
<meta charset="UTF-8">
<?php 
include("methods.php");

/*
    Save function, will run every 24 hours or every hour depending on crontab status
*/

if ($_GET["action"] == "save"){
    echo("Save started at " . date('i:s'));
    
    $data = json_decode(file_get_contents('https://ttt-fun.com/staff/?json=1'), true);
    
    for ($i = 0; $i < count($data); $i++){
        $id2time[id264($data[$i]['steam'])] = $data[$i]['onlinetime'];
    }   
    
    $fp = fopen("saves/".date('Y-m-d@H'). ".json", 'w');
    fwrite($fp, json_encode($id2time));
    fclose($fp);
    echo("<br>Save finished at ". date('i:s'));
}

if ($_GET["action"] == "load"){
    $date=$_GET["date"];
    echo( file_get_contents("http://pb-mc.net/a/saves/". $date . ".json"));
    
}

?>

</body>