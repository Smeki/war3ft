<?php
// Visit war3ft.net for more information
// Configuration options for MySQL are defined in config.php
	$race = "All";
	$number = 50;
	if(!empty($_POST)){
		$race = $HTTP_POST_VARS['Race'];
		$number = $HTTP_POST_VARS['Number'];
	}

	require('./config.php');
 ?>
<html>
<head><title>Warcraft 3 Frozen Throne Stats</title></head>
<link href="layout.css" rel="stylesheet" type="text/css">
<body style="background-image: url('crestbackground.jpg')" bgproperties="fixed"><BR><center>Warcraft 3 Frozen Throne stats brought to you by Geesu/Pimp Daddy<br>
&nbsp;
<form name="duh" method = "POST" action = "index.php">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
  <tr>
    <td width="33%">
    <p align="center">Number:&nbsp;&nbsp;&nbsp;&nbsp;
      <select size="1" name="Number" onchange="this.form.submit();">
      <?php
	  $selected = "";
      if($number==50)
      		$selected = "selected";
      else
      		$selected = "";	
			
      echo "<option " . $selected . ">50</option>";
      if ($number == 100)
      		$selected = "selected";
      else
      		$selected = "";      	
       
      echo "<option " . $selected . ">100</option>";
      if ($number == 150)
      		$selected = "selected";
      else
      		$selected = "";      	
      
      echo "<option " . $selected . ">150</option>";
      if ($number == 200)
      		$selected = "selected";
      else
      		$selected = "";      	
      
      echo "<option " . $selected . ">200</option>";
      if ($number == 300)
      		$selected = "selected";
      else
      		$selected = "";      	
      
      echo "<option " . $selected . ">300</option>";
      if ($number == 400)
      		$selected = "selected";
      else
      		$selected = "";      	
      
      echo "<option " . $selected . ">400</option>";
      if ($number == 500)
      		$selected = "selected";
      else
      		$selected = "";      	
      
      echo "<option " . $selected . ">500</option>";
      ?>
    </select></td>
    <td width="33%">
    <p align="center">Race:&nbsp;  <select size="1" name="Race" onchange="this.form.submit();">
	<?php
	If ($race == "All")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">All</option>";
	If ($race == "Undead Scourge")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Undead Scourge</option>";
	If ($race == "Human Alliance")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Human Alliance</option>";
	If ($race == "Orcish Horde")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Orcish Horde</option>";
	If ($race == "Night Elf")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Night Elf</option>";
	If ($race == "Blood Mage")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Blood Mage</option>";
	If ($race == "Shadow Hunter")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Shadow Hunter</option>";
	If ($race == "Warden")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Warden</option>";
	If ($race == "Crypt Lord")
		$selected = "selected";
	Else
		$selected = "";      		
    
	echo "<option " . $selected . ">Crypt Lord</option>";
	?>
    </select></p>
    </td>
  </tr>
  <tr>
    <td width="33%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
  </tr>
</table>
</form>
&nbsp;<form name="duh2" method = "POST" action = "player_info.php">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber3">
  <tr>
    <td width="50%">
    <p align="center">Search for Player by STEAM ID:<br>
    <br>
    </td>
    <td width="50%">
    <p align="center">Search for Player by Name:<br>
    <br>
    </td>
  </tr>
  <tr>
    <td width="50%">
    <p align="center">
<input type="text" name="playerid" size="20">&nbsp;&nbsp; </td>
    <td width="50%">
    <p align="center">
<input type="text" name="playername" size="20">&nbsp;&nbsp; </td>
  </tr>
  <tr>
    <td width="50%">
    <p align="center"><br>
<input type="submit" value="Look Up" name="B2"></td>
    <td width="50%">
    <p align="center"><br>
<input type="submit" value="Look Up" name="B3"></td>
  </tr>
</table>
<p>&nbsp;&nbsp; <BR></p>
</form>
</center></form>
<div align="center">
  <center>
  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; text-align: center" bordercolor="#111111" id="AutoNumber1" width="697">

<?php
function get_race($num){
	$race2 = "None";
	switch ($num){
		case 1:
			$race2 = "Undead Scourge";
			break;
		case 2:
			$race2 = "Human Alliance";
			break;
		case 3:
			$race2 = "Orcish Horde";
			break;
		case 4:
			$race2 = "Night Elves of Kalimdor";
			break;
		case 5:
			$race2 = "Blood Mage";
			break;
		case 6:
			$race2 = "Shadow Hunter";
			break;
		case 7:
			$race2 = "Warden";
			break;
		case 8:
			$race2 = "Crypt Lord";
			break;
	}
	return $race2;
}

function returnnum($race){
	$returnnum = -1;
	switch ($race){
		case "All":
			$returnnum = 0;
			break;
		case "Undead Scourge":
			$returnnum = 1;
			break;
		case "Human Alliance":
			$returnnum = 2;
			break;
		case "Orcish Horde":
			$returnnum = 3;
			break;
		case "Night Elf":
			$returnnum = 4;
			break;
		case "Blood Mage":
			$returnnum = 5;
			break;
		case "Shadow Hunter":
			$returnnum = 6;
			break;
		case "Warden":
			$returnnum = 7;
			break;
		case "Crypt Lord":
			$returnnum = 8;
			break;
	}
	return $returnnum;
}
	$racenum = returnnum($race);
	
	If ($racenum == 0)
		$racenum = "";
	
	
	$LocalConn = mysql_connect($host,$username,$pass) or die("Could not connect : " . mysql_error());
	mysql_select_db($dbname) or die("Could not select " . $dbname . " database");

	if ($number != "" AND $racenum != "")
		$query = "SELECT * FROM `" . $tbname . "` WHERE race = " . $racenum . " ORDER BY xp DESC LIMIT 0, " . $number;
	Else if ($number != "")
		$query = "SELECT * FROM `" . $tbname . "` ORDER BY xp DESC LIMIT 0, " . $number;
	Else if ($racenum != "") {
		$query = "SELECT * FROM `" . $tbname . "` WHERE race = " . $racenum . " ORDER BY xp DESC LIMIT 0, 50";
		$number = 50;
	}
	else{
		$query = "SELECT * FROM `" . $tbname . "` ORDER BY xp DESC  LIMIT 0, 50";
		$number = 50;
	}
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$recordcount = mysql_num_rows($result);
	if($recordcount<1){
		$found = 0;
		echo "<BR><BR><CENTER>No record found";
	}
	else{
		$found = 1;
	}


	echo "<tr><td width=95>Rank</td><td width=294>Player Name</td><td width=122>XP</td><td width=181>Race</td></tr>" . Chr(10);
	$i = 0;
	while($my_row = mysql_fetch_row($result)){
		$i = $i + 1; 
		$my_row[1] = str_replace("<","&#60;",$my_row[1]);
		$my_row[1] = str_replace(">","&#62;",$my_row[1]);
		$my_row[1] = str_replace("'","&#39;",$my_row[1]);
		echo "<tr><td width=95>" . $i . "</td><td width=294><a href='player_info.php?info=" . $my_row[1] . "'>" . $my_row[1] . "</a></td><td width=122>" . $my_row[2] . "</td><td width=181>" . get_race($my_row[3]) . "</td></tr>" . Chr(10);
	}

?>
</table>
</center>
</div>
<BR><BR><BR>
<CENTER><a href="https://war3ft.net" target="_blank">war3ft.net</a></CENTER><BR><BR>
</body>
</html>