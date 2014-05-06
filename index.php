<?php 
//major dependency
include("methods.php");

<<<<<<< HEAD
//AccessIP defines the IP(s) that are allowed to access alterior scrips, like saving.
$accessIP = ["208.146.35.21"];
=======
$accessIP = ["208.146.35.21"];
#	Save function, will run every 24 hours or every hour depending on crontab status. impliments IP security	#

 if (in_array ($_SERVER['REMOTE_ADDR'], $accessIP)) {
>>>>>>> c1ca423e92c5e7910bca84e3a04f36b915fe8ad3

//check if IP address(s) in $accessIP are the incoming connectionw
if (in_array ($_SERVER['REMOTE_ADDR'], $accessIP)) 
{
	if ($_GET["action"] == "save")
		
		/*
			Save function. Runs hourly from a crontabs curl function running hourly.
		*/
		
	{
		echo("\nSave started at " . date('i:s'));
    
<<<<<<< HEAD
		//load staff data from TTT-Fun
    	$data = json_decode(file_get_contents('https://ttt-fun.com/staff/?json=1'), true);

		//loop through the TTT-Fun data and add it to a Dictionary array
    	for ($i = 0; $i < count($data); $i++)
		{
        	$savef[$i]["steamID"] = steamID_steam64($data[$i]['steam']);
	    	$savef[$i]["time"] = $data[$i]['onlinetime'];
    	}   
    
		//save formatted dictionary array to save file
		save("saves/v2", date('Y-m-d@H'), json_encode($savef), ".json", "w");
    
    	echo("\nSave finished at ". date('i:s') . "\n");
    }

	elseif($_GET["action"] == "log")

	/*
		IP logging system. Displays IP addresses and counts the times they have connected.
	*/
	
	{
		//get data from current access file (contains IP address history)
		$data = file_get_contents("./access.txt");
		
		//explode every IP address
		$data = explode(" ", $data, -1);
		$finished;

		//Loop through every address and count them
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

		//echo the counted IPs
		foreach($finished as $ip => $times)
		{
			echo($ip . " : " . $times . "\n");
		}

}
	if ($_GET['action'] == "cache")
		
		/*
			Cache Function
		*/
		
	{
		cache();
	}
}
else{ ?>
<!DOCTYPE html>
<html>

<head>
    <title>PixelByte | StaffTracker</title>
    <!-- Written by Pips - pips@pixelbyte.net-->
    <!-- Animations from animate.css-->
    <link rel="stylesheet" href="http://pixelbyte.net/public/style_master.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="http://pixelbyte.net/public/animate.css" type="text/css" charset="utf-8">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<style>
table,th,td
{
border:3px solid white;
border-collapse:collapse;
	text-align: center
}
</style>
	<meta charset="utf-8">
</head>
<body>
    <div id='header'>
    <?php
    //header
    include('./header.php');
    ?>
    </div>
    
    
    <div id='page'>
        <div id='pageTitle'>
            <h1 class="animated fadeInDown">
                <center>
                    StaffTracker
                </center>
            </h1>
			<h3 class="animated fadeIn">
				<center>
					Updated display and added multiple user functionality<br><a href="https://github.com/PixelByte/staffTracker">Project's Github</a>
					
				</center>
			</h2>
        </div>
        
        
        <div id='pageContent'>
			<?php
	if ( isset( $_REQUEST['id'] ) ) 
	{
		
		//load name cache
		$nameCache = json_decode(file_get_contents("./cache.json"), true);

		//expand requested steamID to an array
		$search = explode(",", $_REQUEST['id']);

		//Get data to compare the first day
		$data1 = json_decode(file_get_contents("./saves/v2/2014-04-16@16.json"), true);
		
		//Loop through the data and create a dictionary
		for($i = 0; $i < count($data1); $i++)
		{
			$day1[$data1[$i]["steamID"]] = $data1[$i]["time"];
		}

		$data2 = json_decode(file_get_contents("./saves/v2/" . date('Y-m-d@H') . ".json"), true);

	for($i = 0; $i < count($data2); $i++)
	{
			$day2[$data2[$i]["steamID"]] = $data2[$i]["time"];
		}


	for($i = 0; $i < count($search); $i++){

	$time[$i] = $day2[$search[$i]] - $day1[$search[$i]];

		echo ("
			<center>
			<table style='width:400px'>
		<h1 class='animated fadeInDown'>". $nameCache[$search[$i]]  ." (".$search[$i].")</h1>
		</table>
		
		<table style='width:600px' class='animated fadeIn'>
		<tr>
			<td>time at 2014-04-16@16</td>
			<td><b>". time_elapsed_A($day1[$search[$i]]) ."</b></td>
		</tr><tr>
			<td>time at ".date('Y-m-d@H')."</td>
			<td><b>". time_elapsed_A($day2[$search[$i]]) ."</b></td>
		</tr>
		<tr>
			<td>difference</td>
			<td><b>" .time_elapsed_A($time[$i]) . "</b></td>
		</tr>
		</table>
		</table>
		<br>");
        }
// Displays when site is loaded or form isn't filled
} else {
	
		// Display the form
		echo <<<HTML
		<form method="post" action="" class="animated fadeInDown">
		<p><label><center><input autofocus type="text" class="text" name="id" value="" /></center></label></p>
		</form>	
HTML;

}

			?>
        </div>
    </div>
	
	<br>
	
    <?php
//footer
    /*
                            IMPORTANT

=======
	/* accessIP contains IP addresses that are allowed to access the save function */
    
		
		 echo("\nSave started at " . date('i:s'));
    
    $data = json_decode(file_get_contents('https://ttt-fun.com/staff/?json=1'), true);
    
		/* If the site doesn't respond properly, you wait for 5 minutes and try again */
		
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
	
}if ($_GET['action'] == "cache")

        {
		
		sleep(60);
		
        $data = json_decode(file_get_contents("./saves/v2/" . date("Y-m-d@H") . ".json"), true);
        
            $steamQuery;
            
        for($i = 0; $i < count($data); $i++)
        {
            $steamID[$data[$i]["steamID"]] = null;
        }
        
        foreach($steamID as $id => $x){
        
        $steamQuery .= $id. ",";
        
        }
        
        
        $idData = steam64_json($steamQuery);

        for($i = 0; $i < count($idData); $i++)
        {
                   $steamID[(string)$idData[$i]["steamid"]] = $idData[$i]["personaname"];
        }
        
        echo("cache started at " . date("H:m") . "<br>\n");
        save(".", "cache", json_encode($steamID), ".json", "w");
        echo("finished cache at ". date("H:m") . "<br>\n cahched " . count($steamID) . " names");
    }
 }
else{ ?>
<!DOCTYPE html>
<html>

<head>
    <title>PixelByte | StaffTracker</title>
    <!-- Written by Pips - pips@pixelbyte.net-->
    <!-- Animations from animate.css-->
    <link rel="stylesheet" href="http://pixelbyte.net/public/style_master.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="http://pixelbyte.net/public/animate.css" type="text/css" charset="utf-8">
	<meta charset="utf-8">
</head>
<body>
    <div id='header'>
    <?php
    //header
    /*
                            IMPORTANT

    Make sure to fix BOLTH includes before loading the page up.
    */
    include('./header.php');
    ?>
    </div>
    
    
    <div id='page'>
        <div id='pageTitle'>
            <h1 class="animated fadeInDown">
                <center>
                    StaffTracker
                </center>
            </h1>
			<h3 class="animated fadeInDown">
				<center>
					Caching system is now complete. Page loads 10x faster.<br>If a staff member has been removed, it takes 1 hour for the name cache to update.<br><a href="https://github.com/PixelByte/staffTracker">Project's Github</a>
					
				</center>
			</h2>
        </div>
        
        
        <div id='pageContent'>
            <br>
			<br>
			<?php
			
				echo( "Saves: ". ((int)count(scandir("saves/v2")) - 2) .
					 "<br><br>First: " . substr(scandir("saves/v2")[2], 0, 13) .
					 "<br>Fast: " . date("Y-m-d@H") . " (most recent)<br>"
	);
	
	?>
			<?php
	if(isset($_GET['id'])){
	
            $nameCache = json_decode(file_get_contents("./cache.json"), true);
			$day1;
			$day2;
		
			$date1 = "2014-04-16@16";
			$date2 = date('Y-m-d@H');
		
			$search = [$_GET['id']];
		
			foreach($search as $id){
				if ($id === null){
					//exit;
				}else
				echo("<br>SteamID: ".$id . ", ");
			}
		
			$data1 = json_decode(file_get_contents("./saves/v2/" . $date1 . ".json"), true);
			for($i = 0; $i < count($data1); $i++){
				$day1[$data1[$i]["steamID"]] = $data1[$i]["time"];
			}
		
			$data2 = json_decode(file_get_contents("./saves/v2/" . $date2 . ".json"), true);
		
		for($i = 0; $i < count($data2); $i++){
				$day2[$data2[$i]["steamID"]] = $data2[$i]["time"];
			}
		
		for($i = 0; $i < count($search); $i++){
			
		$time[$i] = $day2[$search[$i]] - $day1[$search[$i]];
			
			echo "<br><br>Staff member <b>".$nameCache[$search[$i]]."</b> has played <b>". time_elapsed_A($time[$i]) . "</b> between <b>2014-04-16@16</b> and <b>" .  date('Y-m-d@H') . "</b>";
		}
	}
			?>
        </div>
    </div>
	
	<br>
	
    <?php
//footer
    /*
                            IMPORTANT

>>>>>>> c1ca423e92c5e7910bca84e3a04f36b915fe8ad3
    Make sure to fix BOLTH includes before loading the page up.
    */
    include('./footer.php'); 
    ?>
    
</body>

</html>	

<?php } ?>