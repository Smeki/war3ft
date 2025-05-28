<?php
// Visit war3ft.net for more information
// Configuration options for MySQL are defined in config.php

$race = "All";
$number = 50;
$page_title = "War3FT Player Rankings";

if (!empty($_POST)) {
    $race = $_POST['Race'] ?? 'All';
    $number = $_POST['Number'] ?? 50;
}

require_once('./config.php');
require_once('./includes/functions.php');
require_once('./includes/header.php');
?>

<div class="mb-8 text-center">
    <h1 class="text-3xl font-bold mb-2 text-primary">War3FT Player XP Rankings</h1>
    <p class="text-gray-300">Warcraft 3 Frozen Throne Mod for Counter-Strike, Condition Zero, and Day of Defeat</p>
</div>

<div class="search-container rounded-lg p-6 mb-8 mx-auto w-full max-w-4xl">
    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-grow">
            <form name="search" method="POST" action="player_info.php">
                <label for="player-search" class="block mb-2 text-sm font-medium">Search Player</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-10 h-10">
                        <i class="ri-search-line text-gray-400"></i>
                    </div>
                    <input type="text" 
                           name="search" 
                           id="player-search" 
                           class="bg-gray-900 border border-gray-700 text-white text-sm rounded-button w-full pl-10 p-2.5 focus:border-primary" 
                           placeholder="Enter Player Name or Steam ID">
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-primary hover:bg-blue-600 text-white font-medium rounded-button px-5 py-2.5 w-full">Search Player</button>
                </div>
            </form>
        </div>
        <div class="md:w-1/3">
            <form name="filter" method="POST" action="index.php">
                <label for="race-filter" class="block mb-2 text-sm font-medium">Race</label>
                <div class="relative">
                    <select name="Race" class="bg-gray-900 border border-gray-700 text-white text-sm rounded-button block w-full p-2.5 pr-8 custom-select focus:border-primary" onchange="this.form.submit();">
                        <?php
                        $races = [
                            "All", "Undead Scourge", "Human Alliance", "Orcish Horde",
                            "Night Elf", "Blood Mage", "Shadow Hunter", "Warden", "Crypt Lord"
                        ];
                        foreach ($races as $raceOption) {
                            $selected = ($race === $raceOption) ? 'selected' : '';
                            echo "<option value=\"" . htmlspecialchars($raceOption, ENT_QUOTES) . "\" {$selected}>" . 
                                 htmlspecialchars($raceOption, ENT_QUOTES) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <label for="number-filter" class="block mb-2 mt-4 text-sm font-medium">Show Players</label>
                <div class="relative">
                    <select name="Number" class="bg-gray-900 border border-gray-700 text-white text-sm rounded-button block w-full p-2.5 pr-8 custom-select focus:border-primary" onchange="this.form.submit();">
                        <?php
                        $options = [50, 100, 150, 200, 300, 400, 500];
                        foreach ($options as $option) {
                            $selected = ($number == $option) ? 'selected' : '';
                            echo "<option value=\"{$option}\" {$selected}>{$option}</option>";
                        }
                        ?>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="content-wrapper flex-grow rounded-lg overflow-hidden mb-8">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead>
                <tr>
                    <th class="px-6 py-4 text-center w-16">Rank</th>
                    <th class="px-6 py-4">Player Name</th>
                    <th class="px-6 py-4 text-center">XP</th>
                    <th class="px-6 py-4">Race</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $racenum = returnnum($race);
                    $racenum = ($racenum === 0) ? "" : $racenum;

                    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                    $options = [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ];
                    
                    $base_query = "SELECT DISTINCT `wc3_player`.`player_id`, `wc3_player_extra`.`player_name`, `wc3_player_extra`.`player_steamid`, `wc3_player_race`.`race_xp`, `wc3_player_race`.`race_id` FROM `wc3_player` JOIN `wc3_player_extra` ON `wc3_player`.`player_id` = `wc3_player_extra`.`player_id` JOIN `wc3_player_race` ON `wc3_player`.`player_id` = `wc3_player_race`.`player_id`";

                    $pdo = new PDO($dsn, $username, $pass, $options);

                    if ($number && $racenum !== "") {
                        $query = "$base_query WHERE `wc3_player_race`.`race_id` = ? ORDER BY race_xp DESC LIMIT ?";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$racenum, (int)$number]);
                    } elseif ($number) {
                        $query = "$base_query ORDER BY race_xp DESC LIMIT ?";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([(int)$number]);
                    } elseif ($racenum !== "") {
                        $query = "$base_query WHERE `wc3_player_race`.`race_id` = ? ORDER BY race_xp DESC LIMIT 50";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$racenum]);
                        $number = 50;
                    } else {
                        $query = "$base_query ORDER BY race_xp DESC LIMIT 50";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $number = 50;
                    }

                    $results = $stmt->fetchAll();
                    
                    if (empty($results)) {
                        echo "<tr><td colspan='4' class='px-6 py-4 text-center'>No records found</td></tr>";
                    } else {
                        foreach ($results as $i => $row) {
                            $playerName = htmlspecialchars($row['player_name'] ?? '', ENT_QUOTES, 'UTF-8');
                            $playerId = htmlspecialchars($row['player_id'] ?? '', ENT_QUOTES, 'UTF-8');
                            echo "<tr>
                                    <td class='px-6 py-4 text-center font-mono'>#" . ($i + 1) . "</td>
                                    <td class='px-6 py-4 font-medium'><a href='player_info.php?player_id=" . urlencode($playerId) . "' class='hover:text-primary transition-colors'>" . $playerName . "</a></td>
                                    <td class='px-6 py-4 text-center'>" . number_format($row['race_xp']) . "</td>
                                    <td class='px-6 py-4'>" . htmlspecialchars(get_race((int)$row['race_id']), ENT_QUOTES, 'UTF-8') . "</td>
                                  </tr>\n";
                        }
                    }
                } catch (PDOException $e) {
                    error_log("Database Error: " . $e->getMessage());
                    echo "<tr><td colspan='4' class='px-6 py-4 text-center'>An error occurred while fetching the data. Please try again later.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require('./includes/footer.php'); ?>