<!DOCTYPE html>

<head>
    
<meta charset="UTF-8">

</head>
<body>

<?php 

$data = json_decode(file_get_contents('https://ttt-fun.com/staff/?json=1'), true);

for ($i = 0; $i < count($data); $i++){
    echo($data[$i]["nick"] . "<br><b>Time</b>" . date("W/d/h/m", $data[$i]["onlinetime"]) . "<br><br>");
}
?>

</body>