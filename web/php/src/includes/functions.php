<?php
// Shared functions used across the site
// TODO: Convert to camelCase

function get_race(int $num): string {
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

function returnnum(string $race): int {
    $races = [
        "All" => 0,
        "Undead Scourge" => 1,
        "Human Alliance" => 2,
        "Orcish Horde" => 3,
        "Night Elf" => 4,
        "Blood Mage" => 5,
        "Shadow Hunter" => 6,
        "Warden" => 7,
        "Crypt Lord" => 8
    ];
    return $races[$race] ?? -1;
}

function skills_for_race(int $race) {
	$skills = [
		1 => [0, 1, 2, 3],
		2 => [4, 5, 6, 7],
		3 => [8, 9, 10, 11],
		4 => [12, 13, 14, 15],
		5 => [16, 17, 18, 19],
		6 => [21, 22, 23, 24],
		7 => [26, 27, 28, 29],
		8 => [31, 32, 33, 34]
	];
	return $skills[$race] ?? [];
}

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
			0 => "<img src='./images/vampire.gif' alt='Vampire'> Vampiric Aura",
			1 => "<img src='./images/unholyaura.gif' alt='Unholy Aura'> Unholy Aura",
			2 => "<img src='./images/levitation.gif' alt='Levitation'> Levitation",
			3 => "<img src='./images/suicide.gif' alt='Suicide'> Suicide Bomber"
		],
		2 => [ // Human Alliance
			4 => "<img src='./images/invisibility.gif' alt='Invisibility'> Invisibility",
			5 => "<img src='./images/devotion.gif' alt='Devotion'> Devotion",
			6 => "<img src='./images/bash.gif' alt='Bash'> Bash",
			7 => "<img src='./images/teleport.gif' alt='Teleport'> Teleport"
		],
		3 => [ // Orcish Horde
			8 => "<img src='./images/critstrike.gif' alt='Critical Strike'> Critical Strike",
			9 => "<img src='./images/grenade.gif' alt='Critical Grenade'> Critical Grenade",
			10 => "<img src='./images/reincarnation.gif' alt='Reincarnation'> Reincarnation",
			11 => "<img src='./images/chainlightning.gif' alt='Chain Lightning'> Chain Lightning"
		],
		4 => [ // Night Elf
			12 => "<img src='./images/evasion.gif' alt='Evasion'> Evasion",
			13 => "<img src='./images/thorns.gif' alt='Thorns Aura'> Thorns Aura",
			14 => "<img src='./images/trueshot.gif' alt='Trueshot Aura'> Trueshot Aura",
			15 => "<img src='./images/entangleroots.gif' alt='Entangle Roots'> Entangle Roots"
		],
		5 => [ // Blood Mage
			16 => "<img src='./images/pheonix.gif' alt='Phoenix'> Phoenix",
			17 => "<img src='./images/banish.gif' alt='Banish'> Banish",
			18 => "<img src='./images/siphonmana.gif' alt='Siphon Mana'> Siphon Mana",
			19 => "<img src='./images/flamestrike.gif' alt='Flame Strike'> Flame Strike"
		],
		6 => [ // Shadow Hunter
			21 => "<img src='./images/healingwave.gif' alt='Healing Wave'> Healing Wave",
			22 => "<img src='./images/hex.gif' alt='Hex'> Hex",
			23 => "<img src='./images/serpentward.gif' alt='Serpent Ward'> Serpent Ward",
			24 => "<img src='./images/bigbadvoodoo.gif' alt='Big Bad Voodoo'> Big Bad Voodoo"
		],
		7 => [ // Warden
			26 => "<img src='./images/fanofknives.gif' alt='Fan of Knives'> Fan of Knives",
			27 => "<img src='./images/blink.gif' alt='Blink'> Blink",
			28 => "<img src='./images/shadowstrike.gif' alt='Shadow Strike'> Shadow Strike",
			29 => "<img src='./images/vengeance.gif' alt='Vengeance'> Vengeance"
		],
		8 => [ // Crypt Lord
			31 => "<img src='./images/impale.gif' alt='Impale'> Impale",
			32 => "<img src='./images/spikedcarapace.gif' alt='Spiked Carapace'> Spiked Carapace",
			33 => "<img src='./images/carrionbeetles.gif' alt='Carrion Beetles'> Carrion Beetles",
			34 => "<img src='./images/locustswarm.gif' alt='Locust Swarm'> Locust Swarm"
		]
	];
	
	return $skills[$race][$ability] ?? '';
}

function description(int $race, int $ability): string {
	$descriptions = [
		1 => [ // Undead Scourge
			0 => "You have a chance to steal health from your enemy",
			1 => "You gain health regeneration and speed",
			2 => "You have a chance of jumping over your enemy",
			3 => "You explode on death, damaging nearby enemies"
		],
		2 => [ // Human Alliance
			4 => "You become invisible for a short time",
			5 => "You gain armor",
			6 => "You have a chance to stun your enemy",
			7 => "You can teleport to a teammate"
		],
		3 => [ // Orcish Horde
			8 => "You have a chance to do extra damage",
			9 => "You have a chance to do extra damage with grenades",
			10 => "You have a chance to come back to life",
			11 => "Lightning bounces between enemies"
		],
		4 => [ // Night Elf
			12 => "You have a chance to dodge attacks",
			13 => "Enemies take damage when they hit you",
			14 => "Your teammates gain damage",
			15 => "You can root an enemy in place"
		],
		5 => [ // Blood Mage
			16 => "You summon a phoenix to help you",
			17 => "You can banish an enemy",
			18 => "You steal mana from your enemy",
			19 => "You call down a flame strike"
		],
		6 => [ // Shadow Hunter
			21 => "You heal yourself and nearby allies",
			22 => "You turn an enemy into a critter",
			23 => "You place a ward that attacks enemies",
			24 => "You and nearby allies become invulnerable"
		],
		7 => [ // Warden
			26 => "You have a chance of becoming a mole",
			27 => "Disables ALL enemy ultimates and reduces damage from moles",
			28 => "You have a chance of hurling a poisoned dagger at the enemy",
			29 => "You will respawn once with 50 health"
		],
		8 => [ // Crypt Lord
			31 => "Distorts the enemy",
			32 => "Does mirror damage to the person who shot you, you also gain armor",
			33 => "You have a chance of your beetles attacking the enemy when on target",
			34 => "A Swarm of Locusts attacks the enemy"
		]
	];
	
	return $descriptions[$race][$ability] ?? '';
}

function get_pdo(): PDO {
    global $host, $dbname, $username, $pass;

	$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
	];

    return new PDO($dsn, $username, $pass, $options);
}

function get_player_info(string $playerId): array {
    $pdo = get_pdo();
	
	$query = "SELECT `wc3_player_extra`.`player_name`, `wc3_player_race`.*, `wc3_player_skill`.* FROM `wc3_player` 
		JOIN `wc3_player_extra` ON `wc3_player`.`player_id` = `wc3_player_extra`.`player_id` 
		JOIN `wc3_player_race` ON `wc3_player`.`player_id` = `wc3_player_race`.`player_id`
		JOIN `wc3_player_skill` ON `wc3_player`.`player_id` = `wc3_player_skill`.`player_id`
        WHERE `wc3_player_race`.`race_id` > 0 AND `wc3_player`.`player_id` = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$playerId]);
    $results = $stmt->fetchAll();

    // Build the data for the cards
    $playerName = $results[0]['player_name'];
    $races = [];
    foreach ($results as $record) {
        $race_id = (int)$record['race_id'];
        if (!isset($races[$race_id])) {
            $races[$race_id] = [
                'race_id' => $race_id,
                'race_xp' => $record['race_xp'],
                'skills' => array()
            ];
        }
        if (isset($record['skill_id']) && isset($record['skill_level'])) {
            $skill_id = (int)$record['skill_id'];

            // Only look at skills for the race
            $skills = skills_for_race($race_id);
            if ( !in_array($skill_id, $skills) ) {
                continue;
            }

            $races[$race_id]['skills'][$skill_id] = (int)$record['skill_level'];
        }
    }

    return array(
        "player_id" => $playerId,
        "player_name" => $playerName,
        "races" => $races,
    );
}

function search_players(string $search): array {
    $pdo = get_pdo();

    if (strpos($search, 'STEAM_') === 0) {
        $stmt = $pdo->prepare("SELECT DISTINCT `player_id`, `player_name` FROM `wc3_player_extra` WHERE `player_steamid` LIKE ?");
        $stmt->execute([$search . '%']);
    }
    else {
        $stmt = $pdo->prepare("SELECT DISTINCT `player_id`, `player_name` FROM `wc3_player_extra` WHERE `player_name` LIKE ?");
        $stmt->execute(['%' . $search . '%']);
    }

    return $stmt->fetchAll();
}