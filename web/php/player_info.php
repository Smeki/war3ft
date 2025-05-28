<?php
// Visit war3ft.net for more information

require('./config.php');

$display = 0;
$nameexists = "";
$playername = "";
$idexists = "";

// Handle GET parameters
if (!empty($_GET)) {
	$playername = array_values($_GET)[0] ?? '';
	$playername = htmlspecialchars($playername, ENT_QUOTES, 'UTF-8');
	$display = 1;
}
// Handle POST parameters
elseif (!empty($_POST)) {
	$nameexists = $_POST['playername'] ?? '';
	$idexists = $_POST['playerid'] ?? '';
	$nameexists = htmlspecialchars($nameexists, ENT_QUOTES, 'UTF-8');
	$idexists = htmlspecialchars($idexists, ENT_QUOTES, 'UTF-8');
	$display = 1;
}
else {
	echo "<br><br><center>No player name AND/OR STEAM ID found</center><br><br>";
	$display = 0;
}

if ($display == 1):

function image(int $level, int $var): string {
	if ($var == 1) {
		$images = [
			0 => "level0.gif",
			1 => "level1.gif",
			2 => "level2.gif",
			3 => "level3.gif"
		];
		return $images[$level] ?? '';
	}
	elseif ($var == 2) {
		$images = [
			0 => "ultimate0.gif",
			1 => "ultimate1.gif"
		];
		return $images[$level] ?? '';
	}
	return "";
}

function skill(int $race, int $ability): string {
	$skills = [
		1 => [ // Undead Scourge
			1 => "<img src='./images/vampire.gif' alt='Vampire'> Vampiric Aura",
			2 => "<img src='./images/unholyaura.gif' alt='Unholy Aura'> Unholy Aura",
			3 => "<img src='./images/levitation.gif' alt='Levitation'> Levitation",
			4 => "<img src='./images/suicide.gif' alt='Suicide'> Suicide Bomber"
		],
		2 => [ // Human Alliance
			1 => "<img src='./images/invisibility.gif' alt='Invisibility'> Invisibility",
			2 => "<img src='./images/devotion.gif' alt='Devotion'> Devotion",
			3 => "<img src='./images/bash.gif' alt='Bash'> Bash",
			4 => "<img src='./images/teleport.gif' alt='Teleport'> Teleport"
		],
		3 => [ // Orcish Horde
			1 => "<img src='./images/critstrike.gif' alt='Critical Strike'> Critical Strike",
			2 => "<img src='./images/grenade.gif' alt='Critical Grenade'> Critical Grenade",
			3 => "<img src='./images/reincarnation.gif' alt='Reincarnation'> Reincarnation",
			4 => "<img src='./images/chainlightning.gif' alt='Chain Lightning'> Chain Lightning"
		],
		4 => [ // Night Elf
			1 => "<img src='./images/evasion.gif' alt='Evasion'> Evasion",
			2 => "<img src='./images/thorns.gif' alt='Thorns Aura'> Thorns Aura",
			3 => "<img src='./images/trueshot.gif' alt='Trueshot Aura'> Trueshot Aura",
			4 => "<img src='./images/entangleroots.gif' alt='Entangle Roots'> Entangle Roots"
		],
		5 => [ // Blood Mage
			1 => "<img src='./images/pheonix.gif' alt='Phoenix'> Phoenix",
			2 => "<img src='./images/banish.gif' alt='Banish'> Banish",
			3 => "<img src='./images/siphonmana.gif' alt='Siphon Mana'> Siphon Mana",
			4 => "<img src='./images/flamestrike.gif' alt='Flame Strike'> Flame Strike"
		],
		6 => [ // Shadow Hunter
			1 => "<img src='./images/healingwave.gif' alt='Healing Wave'> Healing Wave",
			2 => "<img src='./images/hex.gif' alt='Hex'> Hex",
			3 => "<img src='./images/serpentward.gif' alt='Serpent Ward'> Serpent Ward",
			4 => "<img src='./images/bigbadvoodoo.gif' alt='Big Bad Voodoo'> Big Bad Voodoo"
		],
		7 => [ // Warden
			1 => "<img src='./images/fanofknives.gif' alt='Fan of Knives'> Fan of Knives",
			2 => "<img src='./images/blink.gif' alt='Blink'> Blink",
			3 => "<img src='./images/shadowstrike.gif' alt='Shadow Strike'> Shadow Strike",
			4 => "<img src='./images/vengeance.gif' alt='Vengeance'> Vengeance"
		],
		8 => [ // Crypt Lord
			1 => "<img src='./images/impale.gif' alt='Impale'> Impale",
			2 => "<img src='./images/spikedcarapace.gif' alt='Spiked Carapace'> Spiked Carapace",
			3 => "<img src='./images/carrionbeetles.gif' alt='Carrion Beetles'> Carrion Beetles",
			4 => "<img src='./images/locustswarm.gif' alt='Locust Swarm'> Locust Swarm"
		]
	];
	
	return $skills[$race][$ability] ?? '';
}

function description(int $race, int $ability): string {
	$descriptions = [
		1 => [ // Undead Scourge
			1 => "You have a chance to steal health from your enemy",
			2 => "You gain health regeneration and speed",
			3 => "You have a chance of jumping over your enemy",
			4 => "You explode on death, damaging nearby enemies"
		],
		2 => [ // Human Alliance
			1 => "You become invisible for a short time",
			2 => "You gain armor",
			3 => "You have a chance to stun your enemy",
			4 => "You can teleport to a teammate"
		],
		3 => [ // Orcish Horde
			1 => "You have a chance to do extra damage",
			2 => "You have a chance to do extra damage with grenades",
			3 => "You have a chance to come back to life",
			4 => "Lightning bounces between enemies"
		],
		4 => [ // Night Elf
			1 => "You have a chance to dodge attacks",
			2 => "Enemies take damage when they hit you",
			3 => "Your teammates gain damage",
			4 => "You can root an enemy in place"
		],
		5 => [ // Blood Mage
			1 => "You summon a phoenix to help you",
			2 => "You can banish an enemy",
			3 => "You steal mana from your enemy",
			4 => "You call down a flame strike"
		],
		6 => [ // Shadow Hunter
			1 => "You heal yourself and nearby allies",
			2 => "You turn an enemy into a critter",
			3 => "You place a ward that attacks enemies",
			4 => "You and nearby allies become invulnerable"
		],
		7 => [ // Warden
			1 => "You have a chance of becoming a mole",
			2 => "Disables ALL enemy ultimates and reduces damage from moles",
			3 => "You have a chance of hurling a poisoned dagger at the enemy",
			4 => "You will respawn once with 50 health"
		],
		8 => [ // Crypt Lord
			1 => "Distorts the enemy",
			2 => "Does mirror damage to the person who shot you, you also gain armor",
			3 => "You have a chance of your beetles attacking the enemy when on target",
			4 => "A Swarm of Locusts attacks the enemy"
		]
	];
	
	return $descriptions[$race][$ability] ?? '';
}

function race2(int $num): string {
	$races = [
		1 => "Undead Scourge",
		2 => "Human Alliance",
		3 => "Orcish Horde",
		4 => "Night Elves of Kalimdor",
		5 => "Blood Mage",
		6 => "Shadow Hunter",
		7 => "Warden",
		8 => "Crypt Lord"
	];
	
	return $races[$num] ?? "None";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php 
	if ($nameexists) {
		echo htmlspecialchars($nameexists, ENT_QUOTES, 'UTF-8');
	} elseif ($playername) {
		echo htmlspecialchars($playername, ENT_QUOTES, 'UTF-8');
	} elseif ($idexists) {
		echo htmlspecialchars($idexists, ENT_QUOTES, 'UTF-8');
	}
	?>'s Race Information</title>
	<link href="layout.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('crestbackground.jpg')" bgproperties="fixed">
	<br>
	<center>
		Warcraft 3 Frozen Throne stats brought to you by Geesu<br>

<?php
try {
	$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
	];
	
	$pdo = new PDO($dsn, $username, $pass, $options);
	
	$base_query = "SELECT * FROM `wc3_player` JOIN `wc3_player_extra` ON `wc3_player`.`player_id` = `wc3_player_extra`.`player_id` JOIN `wc3_player_race` ON `wc3_player`.`player_id` = `wc3_player_race`.`player_id`";

	$open = 0;
	if ($playername) {
		$stmt = $pdo->prepare("$base_query WHERE `wc3_player_race`.`race_id` > 0 AND `wc3_player_extra`.`player_name` = ? LIMIT 8");
		$stmt->execute([$playername]);
		$open = 1;
	}
	elseif ($nameexists) {
		$stmt = $pdo->prepare("$base_query WHERE `wc3_player_race`.`race_id` > 0 AND `wc3_player_extra`.`player_name` LIKE ? LIMIT 8");
		$stmt->execute([$nameexists . '%']);
		$open = 1;
	}
	else {
		$open = 0;
		$playerid = $idexists;
		$found = 1;
	}

	if ($open == 1) {
		$results = $stmt->fetchAll();
		$recordcount = count($results);
		
		if ($recordcount == 0) {
			$found = 0;
			if ($playername) {
				echo "<br><br><br><center>No player by the name of " . htmlspecialchars($playername, ENT_QUOTES, 'UTF-8') . " was found in our database.</center>";
			} elseif ($nameexists) {
				echo "<br><br><br><center>No player by the name of " . htmlspecialchars($nameexists, ENT_QUOTES, 'UTF-8') . " was found in our database.</center>";
			}
		}
		elseif ($recordcount > 1 && $nameexists) {
			$found = 0;
			echo "<center><br><br><br>These names were found:<br><br>";
			$seen = [];
			foreach ($results as $row) {
				if (!isset($seen[$row['playername']])) {
					echo "<a href='player_info.php?info=" . urlencode($row['playername']) . "'>" . 
						 htmlspecialchars($row['playername'], ENT_QUOTES, 'UTF-8') . "</a><br>";
					$seen[$row['playername']] = true;
				}
			}
		}
		else {
			$found = 1;
			$playerid = $results[0]['player_id'];
		}
	}

	if ($found == 1) {
		$stmt = $pdo->prepare("$base_query JOIN `wc3_player_skill` ON `wc3_player`.`player_id` = `wc3_player_skill`.`player_id` WHERE `wc3_player_race`.`race_id` != 0 AND `wc3_player`.`player_id` = ?");
		$stmt->execute([$playerid]);
		$results = $stmt->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
		
		if (empty($results)) {
			echo "<br><br><br><center>No player by the STEAM ID of " . htmlspecialchars($playerid, ENT_QUOTES, 'UTF-8') . " was found in our database.</center>\n";
		}
		else {
			echo "<br><br><center><font size=4>";
			if ($nameexists) {
				echo htmlspecialchars($nameexists, ENT_QUOTES, 'UTF-8');
			} elseif ($playername) {
				echo htmlspecialchars($playername, ENT_QUOTES, 'UTF-8');
			} elseif ($idexists) {
				echo htmlspecialchars($idexists, ENT_QUOTES, 'UTF-8');
			}
			echo "'s Race Information</font></center><br><br><br>\n";
			
			$races = [];
			foreach ($results as $player_id => $records) {
				foreach ($records as $record) {
					$race_id = $record['race_id'];
					if (!isset($races[$race_id])) {
						$races[$race_id] = [
							'race_id' => $race_id,
							'race_xp' => $record['race_xp'],
							'skills' => array_fill(0, 4, 0)  // Initialize all skills to 0
						];
					}
					// Update skill level if this record has one
					if (isset($record['skill_id']) && isset($record['skill_level'])) {
						$skill_id = (int)$record['skill_id'];
						if ($skill_id >= 0 && $skill_id <= 3) {  // Convert 0-based skill_id to 1-based for display
							$races[$race_id]['skills'][$skill_id] = (int)$record['skill_level'];
						}
					}
				}
			}
			
			$x = 0;
			foreach ($races as $race) {
				if ($x % 2 == 0) {
					echo "<table border=0 cellpadding=0 cellspacing=0 width=100% style='border-collapse:collapse' bordercolor='#111111'><tr>\n";
				}
				
				echo "<td width='50%'>\n";
				echo "<div align='center'><center>\n";
				echo "<table border=0 cellpadding=0 cellspacing=0 width='80%' style='border-collapse:collapse' bordercolor='#111111'>\n";
				echo "<tr><td width='100%'><center>" . race2((int)$race['race_id']) . "</center></td></tr></table></center></div>\n";
				echo "<div align='center'><center>\n";
				echo "<table border=0 cellpadding=0 cellspacing=0 style='border-collapse:collapse' bordercolor='#111111' width='80%'>\n";
				echo "<tr><td width='50%'><p align='right'>XP&nbsp;&nbsp;&nbsp;</p></td>";
				echo "<td width='50%'><p align='left'>&nbsp;&nbsp;&nbsp;" . htmlspecialchars($race['race_xp'], ENT_QUOTES, 'UTF-8') . "</p></td></tr></table>\n";
				echo "</center></div>\n";
				echo "<div align='center'><center>\n";
				echo "<table border=0 cellpadding=0 cellspacing=0 style='border-collapse:collapse' bordercolor='#111111' width='80%'>\n";
				echo "<tr><td width='40%'><center>Skill</center></td>";
				echo "<td width='20%'><center>Level</center></td>";
				echo "<td width='40%'><center>Description</center></td></tr>\n";
				
				for ($skill = 1; $skill <= 4; $skill++) {
					$skillLevel = $race['skills'][$skill - 1];  // Convert 1-based skill to 0-based array index
					$imageType = ($skill == 4) ? 2 : 1;
					
					echo "<tr>";
					echo "<td width='40%'>" . skill((int)$race['race_id'], $skill) . "</td>";
					echo "<td width='20%'><center><img src='./images/" . image((int)$skillLevel, $imageType) . "' alt='Level $skillLevel'></center></td>";
					echo "<td width='40%'>" . description((int)$race['race_id'], $skill) . "</td>";
					echo "</tr>\n";
				}
				
				echo "</table></center></div>\n";
				echo "</td>\n";
				
				if ($x % 2 == 1 || $x == count($races) - 1) {
					if ($x % 2 == 0) {
						echo "<td width='50%'></td>";
					}
					echo "</tr></table>\n";
				}
				$x++;
			}
		}
	}
} catch (PDOException $e) {
	error_log("Database Error: " . $e->getMessage());
	echo "<br><br><center>An error occurred while fetching the data. Please try again later.</center>";
}
endif;
?>
		<br><br><br>
		<center><a href="https://war3ft.net" target="_blank">war3ft.net</a></center><br><br>
	</center>
</body>
</html>