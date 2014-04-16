
<meta charset="UTF-8">
<?php 
include("methods.php");

if ($_GET["action"] == "save"){
    $data = json_decode(file_get_contents('https://ttt-fun.com/staff/?json=1'), true);
    
    for ($i = 0; $i < count($data); $i++){
        $id2time[id264($data[$i]['steam'])] = $data[$i]['onlinetime'];
    }   
    
    $fp = fopen("saves/".date('Y-m-d'). ".json", 'w');
    fwrite($fp, json_encode($id2time));
    fclose($fp);
}

if ($_GET["action"] == "load"){
    $date=$_GET["date"];
    echo( file_get_contents("http://pb-mc.net/a/saves/". $date . ".json"));
    
}
?>

</body>