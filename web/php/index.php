<!DOCTYPE html>
<?php
// Visit war3ft.net for more information
// Configuration options for MySQL are defined in config.php

$race = "All";
$number = 50;

if (!empty($_POST)) {
    $race = $_POST['Race'] ?? 'All';
    $number = $_POST['Number'] ?? 50;
}

require('./config.php');
?>
<html>
<head>
    <title>Warcraft 3 Frozen Throne Stats</title>
    <link href="layout.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('crestbackground.jpg')" bgproperties="fixed">
    <br>
    <center>
        Warcraft 3 Frozen Throne stats brought to you by Geesu<br>&nbsp;
        <form name="duh" method="POST" action="index.php">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
                <tr>
                    <td width="33%">
                        <p align="center">Number:&nbsp;&nbsp;&nbsp;&nbsp;
                            <select size="1" name="Number" onchange="this.form.submit();">
                                <?php
                                $options = [50, 100, 150, 200, 300, 400, 500];
                                foreach ($options as $option) {
                                    $selected = ($number == $option) ? 'selected' : '';
                                    echo "<option value=\"{$option}\" {$selected}>{$option}</option>";
                                }
                                ?>
                            </select>
                        </p>
                    </td>
                    <td width="33%">
                        <p align="center">Race:&nbsp;
                            <select size="1" name="Race" onchange="this.form.submit();">
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
                        </p>
                    </td>
                </tr>
            </table>
        </form>
        &nbsp;
        <form name="duh2" method="POST" action="player_info.php">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber3">
                <tr>
                    <td width="50%">
                        <p align="center">Search for Player by STEAM ID:<br><br></p>
                    </td>
                    <td width="50%">
                        <p align="center">Search for Player by Name:<br><br></p>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        <p align="center">
                            <input type="text" name="playerid" size="20">
                        </p>
                    </td>
                    <td width="50%">
                        <p align="center">
                            <input type="text" name="playername" size="20">
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        <p align="center"><br>
                            <input type="submit" value="Look Up" name="B2">
                        </p>
                    </td>
                    <td width="50%">
                        <p align="center"><br>
                            <input type="submit" value="Look Up" name="B3">
                        </p>
                    </td>
                </tr>
            </table>
        </form>

        <div align="center">
            <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; text-align: center" bordercolor="#111111" id="AutoNumber1" width="697">
                <?php
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

                try {
                    $racenum = returnnum($race);
                    $racenum = ($racenum === 0) ? "" : $racenum;

                    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                    $options = [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ];
                    
					$base_query = "SELECT * FROM `wc3_player` JOIN `wc3_player_extra` ON `wc3_player`.`player_id` = `wc3_player_extra`.`player_id` JOIN `wc3_player_race` ON `wc3_player`.`player_id` = `wc3_player_race`.`player_id`";

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
                        echo "<tr><td colspan='4'><br><br>No records found</td></tr>";
                    } else {
                        echo "<tr>
                                <td width='95'>Rank</td>
                                <td width='294'>Player Name</td>
                                <td width='122'>XP</td>
                                <td width='181'>Race</td>
                              </tr>\n";

                        foreach ($results as $i => $row) {
                            $playerName = htmlspecialchars($row['player_name'] ?? '', ENT_QUOTES, 'UTF-8');
                            echo "<tr>
                                    <td width='95'>" . ($i + 1) . "</td>
                                    <td width='294'><a href='player_info.php?info=" . urlencode($playerName) . "'>" . $playerName . "</a></td>
                                    <td width='122'>" . htmlspecialchars($row['race_xp'] ?? '', ENT_QUOTES, 'UTF-8') . "</td>
                                    <td width='181'>" . htmlspecialchars(get_race((int)$row['race_id']), ENT_QUOTES, 'UTF-8') . "</td>
                                  </tr>\n";
                        }
                    }
                } catch (PDOException $e) {
                    error_log("Database Error: " . $e->getMessage());
                    echo "<tr><td colspan='4'>An error occurred while fetching the data. Please try again later.</td></tr>";
                }
                ?>
            </table>
        </div>
        <br><br><br>
        <a href="https://war3ft.net" target="_blank">war3ft.net</a><br><br>
    </center>
</body>
</html>