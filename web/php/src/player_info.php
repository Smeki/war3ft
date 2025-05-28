<?php
// Visit war3ft.net for more information

require_once('./config.php');
require_once('./includes/functions.php');

$playerFound = 0;
$search = NULL;
$playerId = NULL;

// Handle request parameters
$search = $_REQUEST['search'] ?? '';
$search = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');
$playerId = $_REQUEST['player_id'] ?? '';

$playerSearchResults = array();
if ($search && strlen($search) > 0) {
	$playerSearchResults = search_players($search);

	if (count($playerSearchResults) == 1 ){
		$playerId = $playerSearchResults[0]['player_id'];
	}
}

$playerInfo = NULL;

if ($playerId) {
	$playerInfo = get_player_info($playerId);
}

// Set page title for header
$page_title = 'Race Information';
if ($playerInfo) {
	$page_title = $page_title . ' - ' . $playerInfo["player_name"];
}

require('./includes/header.php');

?>

<div class="mb-8 text-center">
    <h1 class="text-3xl font-bold mb-2 text-primary">War3FT Player XP Rankings</h1>
<?php
	if ($playerInfo !== NULL) {
		echo '<p class="text-gray-300">Player: ' . $playerInfo["player_name"] . '</p>';
	}
?>
</div>

<?php
if ($playerInfo !== NULL):
?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-6">
<?php

	foreach ($playerInfo['races'] as $race) {
		$race_id = (int)$race['race_id'];

		// Ignore Chameleon
		if ( $race_id == 9 ) {
			continue;
		}

		$max_xp = 1000; // Adjust based on your game's max XP
		$xp_percentage = min(($race['race_xp'] / $max_xp) * 100, 100);
		?>
		<div class="bg-gray-900/50 backdrop-blur-sm border border-primary/20 rounded-xl p-6 shadow-lg hover:border-primary/30 transition-colors">
			<h2 class="text-xl font-bold mb-2"><?php echo get_race($race_id); ?></h2>
			<div class="flex justify-between items-center mb-6">
				<div class="w-full bg-gray-800/50 h-2 rounded-full overflow-hidden backdrop-blur-sm border border-primary/20">
					<div class="bg-gradient-to-r from-primary to-blue-400 h-full"
							style="width: <?php echo $xp_percentage; ?>%"></div>
				</div>
				<span class="ml-3 whitespace-nowrap text-primary">XP: <?php echo $race['race_xp']; ?></span>
			</div>
			<div class="space-y-4">
				<?php 
				$skills = skills_for_race($race_id);

				foreach ($skills as $skill_id):
					$skillLevel = $race['skills'][$skill_id] ?? 0;

					$skillInfo = skill($race_id, $skill_id);
					// Extract image source from the skill info
					preg_match('/src=\'([^\']+)\'/', $skillInfo, $matches);
					$skillImage = $matches[1] ?? '';
					// Extract skill name by removing the img tag
					$skillName = preg_replace('/<img[^>]+>/', '', $skillInfo);
					
				?>
				<div class="flex gap-3">
					<div class="flex gap-2 items-center">
						<img src="<?php echo $skillImage; ?>" alt="" class="w-8 h-8">
						<img src="./images/<?php echo ($skills[3] == $skill_id) ? "ultimate$skillLevel.gif" : "level$skillLevel.gif"; ?>" 
								alt="Level <?php echo $skillLevel; ?>"
								class="h-4">
					</div>
					<div class="flex-1 min-w-0">
						<div class="flex justify-between items-center">
							<span class="font-medium"><?php echo trim($skillName); ?></span>
						</div>
						<div class="progress-bar mt-1 mb-1">
							<div class="progress-fill" style="width: <?php echo $levelPercentage; ?>%"></div>
						</div>
						<p class="text-sm text-gray-400">
							<?php echo description($race_id, $skill_id); ?>
						</p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}

?>
</div>
<?php

elseif($playerSearchResults && count($playerSearchResults) > 1):
?>
<div class="max-w-2xl mx-auto p-6">
    <div class="bg-gray-900/50 backdrop-blur-sm border border-primary/20 rounded-xl p-6 shadow-lg">
        <h2 class="text-xl font-bold mb-4">Multiple players found for "<?php echo $search; ?>":</h2>
        <div class="space-y-2">
            <?php foreach ($playerSearchResults as $player): ?>
                <a href="player_info.php?player_id=<?php echo $player['player_id']; ?>" 
                   class="block w-full p-3 bg-gray-800/50 hover:bg-gray-700/50 rounded-lg border border-primary/20 
                          hover:border-primary/30 transition-all text-white">
                    <?php echo $player['player_name']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php

else:
?>
<div class="flex justify-center mb-8">
	<p class="text-gray-300">
	No players found
	</p>
</div>
<?php
endif;
?>

<div class="flex justify-center mb-8">
    <a href="index.php" class="inline-flex items-center gap-2 bg-gray-900/50 hover:bg-gray-800/50 text-white px-6 py-3 rounded-xl border border-primary/20 hover:border-primary/30 transition-all">
        <i class="ri-arrow-left-line"></i>
        Back to Rankings
    </a>
</div>

<?php
require('./includes/footer.php');
?>