
<meta charset="UTF-8">
<?php 

$data = json_decode(file_get_contents('https://ttt-fun.com/staff/?json=1'), true);

//print_r ($data);

$id2time;
$id2player;
$id264;

//for ($i = 0; $i < count($data); $i++){
//    echo($data[$i]['nick'] . "<br><b>Time </b>" . date("W:H:m:s", $data[$i]["onlinetime"]) . "<br><br><br>");
//}

/*
    STEAMID TO PLAYTIME
*/
for ($i = 0; $i < count($data); $i++){
    $id2time[$data[$i]['steam']] = $data[$i]['onlinetime'];
}

/*
    STEAMID TO PLAYERID
*/
for ($i = 0; $i < count($data); $i++){
    $id2player[$data[$i]['steam']] = $data[$i]['nick'];
}

/*
    
*/
for ($i = 0; $i < count($data); $i++){
    $id2time[$data[$i]['steam']] = $data[$i]['onlinetime'];    
}

for ($i = 0; $i < count($data); $i++){
    $id2time[$data[$i]['steam']] = $data[$i]['onlinetime'];    
}


for ($i = 0; $i < count($data); $i++){
    list($e, $type, $id) = split(":", $data[$i]['steam']);
    $id264[$data[$i]['steam']] = ($id * 2) + 76561197960265728 + $type;
}


var_dump($id264);

?>

</body>