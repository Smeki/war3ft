<?
// Configuration options for MySQL are defined in config.php
// Developed by 4HM | Pimp Daddy for the Warcraft 3 Frozen Throne MOD
// Will also work with WAR3 MOD 4 Race
// Visit http://4honor.net/forum/viewforum.php?f=28 for updates

require('./config.php');
$display=0;
$nameexists="";
$playername="";
$idexists="";
if (!empty($_GET)){
	if (is_array($_GET)){
		$is_magic_quotes = get_magic_quotes_gpc();	
		foreach($_GET AS $key => $playername) {
			$temp = $playername;
		}
	}
	$display=1;
}
else if(!empty($_POST)){
	$nameexists = $HTTP_POST_VARS['playername'];
	$idexists = $HTTP_POST_VARS['playerid'];
	$display=1;
}
else{
	echo "<BR><BR><CENTER>No player name AND/OR STEAM ID found</CENTER><BR><BR>";
	$display=0;
}
?>

<? if ($display==1){ ?>
<?
function image($level,$var){
	if ($var == 1){
		switch ($level){
			case 0:
				$image= "level0.gif";
				break;
			case 1:
				$image= "level1.gif";
				break;
			case 2:
				$image= "level2.gif";
				break;
			case 3:
				$image= "level3.gif";
				break;
		}
		return $image;
	}
	else if ($var == 2){
		switch ($level){
			case 0:
				$image = "ultimate0.gif";
				break;
			case 1:
				$image = "ultimate1.gif";
				break;
		}
		return $image;
	}
	return "";
}

function skill($race,$ability){
	switch($race){
		case 1:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/vampire.gif> Vampiric Aura";
					break;
				case 2:
					$var = "<IMG SRC=./images/unholyaura.gif> Unholy Aura";
					break;
				case 3:
					$var = "<IMG SRC=./images/levitation.gif> Levitation";
					break;
				case 4:
					$var = "<IMG SRC=./images/suicide.gif> Suicide Bomber";
					break;
			}
		break;
		case 2:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/invisibility.gif> Invisibility";
					break;
				case 2:
					$var = "<IMG SRC=./images/devotion.gif> Devotion";
					break;
				case 3:
					$var = "<IMG SRC=./images/bash.gif> Bash";
					break;
				case 4:
					$var = "<IMG SRC=./images/teleport.gif> Teleport";
					break;
			}
		break;
		case 3:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/critstrike.gif> Critical Strike";
					break;
				case 2:
					$var = "<IMG SRC=./images/grenade.gif> Critical Grenade";
					break;
				case 3:
					$var = "<IMG SRC=./images/reincarnation.gif> Reincarnation";
					break;
				case 4:
					$var = "<IMG SRC=./images/chainlightning.gif> Chain Lightning";
					break;
			}
		break;
		case 4:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/evasion.gif> Evasion";
					break;
				case 2:
					$var = "<IMG SRC=./images/thorns.gif> Thorns Aura";
					break;
				case 3:
					$var = "<IMG SRC=./images/trueshot.gif> Trueshot Aura";
					break;
				case 4:
					$var = "<IMG SRC=./images/entangleroots.gif> Entangle Roots";
					break;
			}
		break;
		case 5:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/pheonix.gif> Pheonix";
					break;
				case 2:
					$var = "<IMG SRC=./images/banish.gif> Banish";
					break;
				case 3:
					$var = "<IMG SRC=./images/siphonmana.gif> Siphon Mana";
					break;
				case 4:
					$var = "<IMG SRC=./images/flamestrike.gif> Flame Strike";
					break;
			}
		break;
		case 6:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/healingwave.gif> Healing Wave";
					break;
				case 2:
					$var = "<IMG SRC=./images/hex.gif> Hex";
					break;
				case 3:
					$var = "<IMG SRC=./images/serpentward.gif> Serpent Ward";
					break;
				case 4:
					$var = "<IMG SRC=./images/bigbadvoodoo.gif> Big Bad Voodoo";
					break;
			}
		break;
		case 7:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/fanofknives.gif> Fan of Knives";
					break;
				case 2:
					$var = "<IMG SRC=./images/blink.gif> Blink";
					break;
				case 3:
					$var = "<IMG SRC=./images/shadowstrike.gif> Shadow Strike";
					break;
				case 4:
					$var = "<IMG SRC=./images/vengeance.gif> Vengeance";
					break;
			}
		break;
		case 8:
			switch ($ability){
				case 1:
					$var = "<IMG SRC=./images/impale.gif> Impale";
					break;
				case 2:
					$var = "<IMG SRC=./images/spikedcarapace.gif> Spiked Carapace";
					break;
				case 3:
					$var = "<IMG SRC=./images/carrionbeetles.gif> Carrion Beetles";
					break;
				case 4:
					$var = "<IMG SRC=./images/locustswarm.gif> Locust Swarm";
					break;
			}
		break;
	}
	return $var;
}

function description($race,$ability){
	switch($race){
		case 1:
			switch ($ability){
				case 1:
					$var= "Gives you life leech";
					break;
				case 2:
					$var= "Gives you a speed boost, also all weapons make you move at the same speed";
					break;
				case 3:
					$var= "Allows you to jump higher";
					break;
				case 4:
					$var= "Player will explode when he dies, killing enemies around him";
					break;
			}
		break;
		case 2:
			switch ($ability){
				case 1:
					$var= "You become partially invisible";
					break;
				case 2:
					$var= "Gives you more health at the start of each round";
					break;
				case 3:
					$var= "When you shoot someone you have a chance of rendering them immobile for 1 second";
					break;
				case 4:
					$var= "Ability to teleport where you are looking";
					break;
			}
		break;
		case 3:
			switch ($ability){
				case 1:
					$var= "Gives you a chance of doing more damage on each shot";
					break;
				case 2:
					$var= "Will ALWAYS more damage when you hit someone with a grenade";
					break;
				case 3:
					$var= "Gives you a chance in respawning with the equipment you had before you died last round";
					break;
				case 4:
					$var= "Ability to cast chain lightning, damage decreases by 2/3 each jump";
					break;
			}
		break;
		case 4:
			switch ($ability){
				case 1:
					$var= "Gives you a chance of evading a shot";
					break;
				case 2:
					$var= "Does mirror damage to the person who shot you";
					break;
				case 3:
					$var= "Does extra damage on each of your bullets";
					break;
				case 4:
					$var= "Immobilizes enemy for 10 seconds.";
					break;
			}
		break;
		case 5:
			switch ($ability){
				case 1:
					$var= "You have a chance of reviving the fist teammate who dies";
					break;
				case 2:
					$var= "You have a chance of slapping your enemy";
					break;
				case 3:
					$var= "Steal money from your enemy";
					break;
				case 4:
					$var= "You receive a flame thrower";
					break;
			}
		break;
		case 6:
			switch ($ability){
				case 1:
					$var= "Heals yourself and your nearby teammates";
					break;
				case 2:
					$var= "You have a chance of turning your enemy into a big goober";
					break;
				case 3:
					$var= "You receive serpent wards each round that damage nearby enemy units";
					break;
				case 4:
					$var= "Invincibility for 2 seconds";
					break;
			}
		break;
		case 7:
			switch ($ability){
				case 1:
					$var= "You have a chance of becoming a mole";
					break;
				case 2:
					$var= "Disables ALL enemy ultimates and reduces damage from moles";
					break;
				case 3:
					$var= "You have a chance of hurling a poisoned dagger at the enemy";
					break;
				case 4:
					$var= "You will respawn once with 50 health";
					break;
			}
		break;
		case 8:
			switch ($ability){
				case 1:
					$var= "Distorts the enemy";
					break;
				case 2:
					$var= "Does mirror damage to the person who shot you, you also gain armor";
					break;
				case 3:
					$var= "You have a chance of your beetles attacking the enemy when on target";
					break;
				case 4:
					$var= "A Swarm of Locusts attacks the enemy";
					break;
			}
		break;
		}
	return $var;

}

function race2($num){
	switch ($num){
		case 1:
			$var = "Undead Scourge";
			break;
		case 2:
			$var = "Human Alliance";
			break;
		case 3:
			$var = "Orcish Horde";
			break;
		case 4:
			$var = "Night Elves of Kalimdor";
			break;
		case 5:
			$var = "Blood Mage";
			break;
		case 6:
			$var = "Shadow Hunter";
			break;
		case 7:
			$var = "Warden";
			break;
		case 8:
			$var = "Crypt Lord";
			break;
	}
	return $var;
}
?>
<HTML>
<? if($nameexists<>""){ ?>
<HEAD><TITLE><? echo $nameexists; ?>'s Race Information</TITLE></HEAD>
<?
}
else if($playername<>""){
?>
<HEAD><TITLE><? echo $playername; ?>'s Race Information</TITLE></HEAD>
<?
}
else if($idexists<>""){
?>
<HEAD><TITLE><? echo $idexists; ?>'s Race Information</TITLE></HEAD>
<? } ?>

<link href="layout.css" rel="stylesheet" type="text/css">
<body style="background-image: url('crestbackground.jpg')" bgproperties="fixed"><BR><center>Warcraft 3 Frozen Throne stats brought to you by Geesu/Pimp Daddy<br>

<?
	$LocalConn = mysql_connect($host,$username,$pass) or die("Could not connect : " . mysql_error());
	mysql_select_db($dbname) or die("Could not select " . $dbname . " database");
	$open = 0;
	if($playername<>""){
		$query= "SELECT * FROM `" . $tbname . "` WHERE ('race'>'0' AND `playername` LIKE '" . $playername . "') LIMIT 0 , 8";
		$open = 1;
	}
	else if($nameexists<>""){
		$query= "SELECT * FROM `" . $tbname . "` WHERE (1 AND `playername`  LIKE '" . $nameexists . "%' AND 'race'>'0') LIMIT 0 , 8";
		$open = 1;
	}
	else{
		$open = 0;
		$playerid = $idexists;
		$found = 1;
	}

	if($open==1){
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		$recordcount = mysql_num_rows($result);
		if($recordcount==0){
			$found = 0;
			if($playername<>"")
				echo "<BR><BR><BR><center> No player by the name of " . $playername . " was found in our database.</center>";
			else if($nameexists<>"")
				echo "<BR><BR><BR><center> No player by the name of " . $nameexists . " was found in our database.</center>";
		}
		else if($recordcount>1 && $nameexists<>""){
			$found = 0;
			echo "<CENTER><BR><BR><BR>These names were found:<BR><BR>";
			$temp=0;
			while($my_row = mysql_fetch_row($result)){
				if($temp!=$my_row[1])
					echo "<a href='player_info.php?info=" . $my_row[1] . "'>" . $my_row[1] . "</a><BR>";
				$temp = $my_row[1];
			}
		}
		else{
			$found = 1;
			$my_row = mysql_fetch_row($result);
			$playerid=$my_row[0];
		}
	}

	
	if($found==1){
		$query="SELECT * FROM `" . $tbname . "` WHERE ('race'<>'0' AND `playerid` LIKE '" . $playerid . "') LIMIT 0 , 8;";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		$recordcount = mysql_num_rows($result);
		if($recordcount<1)
			echo "<BR><BR><BR><center> No player by the STEAM ID of " . $playerid . " was found in our database.</center>" . Chr(10);
		else{
			echo "<title>" . $idexists . "'s Statistics</title></head><body>" . Chr(10);
			echo "<BR><BR><center><font size=4>";
			if($nameexists<>"")
				echo $nameexists;
			else if($playername<>"")
				echo $playername;
			else if($idexists<>"")
				echo $idexists;
			echo "'s Race Information</font></center><br><br><br>" . Chr(10);
			$x=0;
			while($x<4 && $recordcount>0){
				$my_row = mysql_fetch_row($result);
				echo "<table border=0 cellpadding=0 cellspacing=0 width=100% style=border-collapse:collapse bordercolor=#111111><tr><td width=50% >" . Chr(10);
				$i=0;
				while($i<2 && $recordcount>0){
					$race=$my_row[3];
					if($race!=0){
						if ($i == 1)
							echo "<td width=50% >";
						$xp = $my_row[2];
						$skill1=$my_row[4];	
						$skill2=$my_row[5];
						$skill3=$my_row[6];
						$skill4=$my_row[7];
						echo "<div align=center><center><table border=0 cellpadding=0 cellspacing=0 width=80% style=border-collapse:collapse bordercolor=#111111>" . Chr(10);
						echo "<tr><td width=100% ><center>" . race2($race) . "</center></td></tr></table></center></div><div align=center><center>" . Chr(10);
						echo "<table border=0 cellpadding=0 cellspacing=0 style=border-collapse:collapse bordercolor=#111111 id=AutoNumber1 width=80% >" . Chr(10);
						echo "<tr><td width=50% ><p align=right>XP&nbsp;&nbsp;&nbsp;</p></td><td width=50% ><p align=left>&nbsp;&nbsp;&nbsp;" . $xp . "</p></td></tr></table>" . Chr(10);
						echo "</center></div><div align=center><center><table border=0 cellpadding=0 cellspacing=0 style=border-collapse:collapse bordercolor=#111111 id=AutoNumber2 width=80% >" . Chr(10);
						echo "<tr><td width=40% ><center>Skill</center></td><td width=20% ><center>Level</center></td><td width=40% ><center>Description</center></td></tr>" . Chr(10);
						echo "<tr><td width=40% >" . skill($race,1) . "</td><td width=20% ><center><IMG SRC=./images/" . image($skill1,1) . "></center></td><td width=40% >" . description($race,1) . "</td></tr>" . Chr(10);
						echo "<tr><td width=40% >" . skill($race,2) . "</td><td width=20% ><center><IMG SRC=./images/" . image($skill2,1) . "></center></td><td width=40% >" . description($race,2) . "</td></tr>" . Chr(10);
						echo "<tr><td width=40% >" . skill($race,3) . "</td><td width=20% ><center><IMG SRC=./images/" . image($skill3,1) . "></center></td><td width=40% >" . description($race,3) . "</td></tr>" . Chr(10);
						echo "<tr><td width=40% >" . skill($race,4) . "</td><td width=20% ><center><IMG SRC=./images/" . image($skill4,2) . "></center></td><td width=40% >" . description($race,4) . "</td></tr>" . Chr(10);
						echo "</tr></table></center></div></td>" . Chr(10);
						if ($i == 1)
							echo "</td></tr></table>" . Chr(10);
						if($i==0)
							$my_row = mysql_fetch_row($result);
						$i=$i+1;
					}
					else
						$my_row = mysql_fetch_row($result);
					$recordcount--;	
				}
				if ($i==1){
					echo "<td width=50% ></td></tr></table>" . Chr(10);
					$recordcount--;
				}
				$x++;
			}
		}
	}
?>
<? } ?>
<BR><BR><BR>
<CENTER><a href="http://wc3mods.net" target="_blank">wc3mods.net</a></CENTER><BR><BR>
</BODY></HTML>