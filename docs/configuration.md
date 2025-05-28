---
title: Configuration
nav_order: 3
---

# Warcraft 3 Frozen Throne: Plugin Configuration

This document outlines all configurable options available in the `war3ft` plugin. These settings can be modified in the plugin's configuration file to tailor gameplay, XP saving, admin access, and more.

## Configuration File

The configuration file is located at:
```
addons/amxmodx/configs/war3ft/war3FT.cfg
```

---

## 📁 Saving Options

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_save_xp` | Enable saving of XP | `0` |
| `wc3_save_xp_db` | 0 = SQLite, 1 = MySQL | `0` |
| `wc3_save_by` | 0 = Steam ID, 1 = IP, 2 = Name | `0` |
| `wc3_save_pruning` | Prune old users on map change | `0` |
| `wc3_days_before_delete` | Days before XP deletion | `31` |
| `wc3_save_end_round` | Save XP at round end (can cause lag) | `1` |

---

## 🗃 SQL Database Settings

Only used if `wc3_save_xp_db = 1`.

| Config | Description |
|--------|-------------|
| `wc3_sql_dbhost` | MySQL host (e.g. `localhost`) |
| `wc3_sql_dbuser` | Database user |
| `wc3_sql_dbpass` | Database password |
| `wc3_sql_dbname` | Database name |

---

## 🔧 Admin Settings

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_admin_flag` | Flag required to give/take XP | `"m"` |

---

## ⭐ Experience Settings

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_xp_multiplier` | XP gain rate multiplier | `1.0` |
| `wc3_xp_weap_multiplier` | XP based on weapon used | `1` |
| `wc3_min_players` | Minimum players required for XP | `2` |
| `wc3_ignore_bots` | Ignore bots/spectators/HLTV for XP | `0` |
| `wc3_xp_auto_average` | Give joining players average XP | `0` |
| `wc3_show_objectives` | Show XP gain from objectives | `1` |
| `wc3_show_kill_obj` | Show XP gain per kill | `0` |
| `wc3_xp_radius` | Radius for shared XP on objectives | `750` |

---

## 🎮 Gameplay Enhancements

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_races` | Number of races (4+ enables shopmenu2) | `8` |
| `wc3_grenade_protection` | Limit 1 HE per round | `0` |
| `wc3_spec_position` | HUD position for spectators (0 = left, 1 = right) | `0` |
| `wc3_buy_zone` | Restrict item buying to buyzone | `0` |
| `wc3_buy_time` | Restrict item buying to buytime | `0` |
| `wc3_buy_dead` | Allow dead players to buy items | `1` |
| `wc3_show_player` | Show player info on crosshair | `1` |
| `wc3_query_client` | Check `cl_minmodels` cvar every second | `1` |
| `wc3_cheats` | Enable cheats (debug/dev use) | `0` |
| `wc3_psychostats` | Log Psychostats info for abilities | `1` |
| `wc3_start_level` | Level players start at | `0` |

---

## 👤 Icon Display

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_race_icon` | Show race icons above players | `1` |
| `wc3_level_icon` | Show level icons above players | `1` |

---

## 🧬 Chameleon Race (9th Race)

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_cham_random` | Random skills each round | `1` |
| `wc3_cham_skill1` | Custom skill 1 ID | `14` |
| `wc3_cham_skill2` | Custom skill 2 ID | `0` |
| `wc3_cham_skill3` | Custom skill 3 ID | `6` |
| `wc3_cham_ultimate` | Custom ultimate skill ID | `7` |
| `wc3_cham_passive` | Custom passive skill ID | `20` |

---

## 🪄 Skills & Ultimates

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_ult_delay` | Delay before ultimates are usable (seconds) | `15.0` |
| `wc3_ult_cooldown` | Cooldown time for ultimates (seconds) | `35.0` |
| `wc3_blink_protection` | Protect against blink abuse | `1` |
| `wc3_blink_dizziness` | Blink visual effect: 0 = flash, 1 = blue fade | `0` |
| `wc3_blink_slay` | Slay if blink into restricted area | `0` |
| `wc3_entangle_drop` | Drop weapon on entangle | `0` |

---

## 🧪 Item Configs

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_glove_timer` | Interval between giving Flaming Gloves grenade | `10` |
| `wc3_glove_orc_damage` | Give Orcs crit with gloves | `0` |
| `wc3_boots` | Speed % bonus from Boots of Speed | `0.10` |
| `wc3_claw` | Extra damage from Claws of Attack | `6` |
| `wc3_health` | Health gained from Periapt of Health | `15` |
| `wc3_frost` | Slowed speed from Orb of Frost | `125.0` |
| `wc3_mask` | Life steal % from Mask of Death | `0.3` |
| `wc3_cloak` | Invisibility from Cloak (lower = more invisible) | `150` |
| `wc3_sock` | Gravity multiplier from Sock of the Feather | `0.5` |
| `wc3_tome` | XP gained from Tome of Experience | `50` |

---

## 🤖 Bot Settings

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_bot_buy_item` | Chance of bot buying an item each round | `0.33` |

---

## 🪖 Day of Defeat (DoD)

| Config | Description | Default |
|--------|-------------|---------|
| `wc3_dod_start_money` | Starting money for DoD players | `800` |

---

## 🚫 Disabling Gloves of Warmth or Critical Grenade on Specific Maps

You can disable specific items or skills on a per-map basis using configuration files located in:

```
configs/war3ft/disable/
```

### ❄️ Disable: Gloves of Warmth
To disable the **Flaming Gloves of Warmth**, list map names in:
```
configs/war3ft/disable/item_gloves.cfg
```

### 💣 Disable: Orc's Critical Grenade
To disable the **Orc's Critical Grenade skill**, list map names in:
```
configs/war3ft/disable/skill_orc_nade.cfg
```

Each file should contain one map name per line. Wildcards (`*`) are supported.

#### ✅ Example:
```
ka_*
he_tennis
```

This will disable the corresponding item or skill on all maps starting with `ka_` and on the `he_tennis` map.

---

## 🔢 Chameleon Skill ID Reference

This section explains how to assign specific abilities to the **Chameleon** race, which allows players to combine skills from different races for a custom experience.

To define the Chameleon’s skill layout, configure the following options in your `war3FT.cfg`:

```ini
wc3_cham_random     0
wc3_cham_skill1     14
wc3_cham_skill2     8
wc3_cham_skill3     28
wc3_cham_ultimate   29
wc3_cham_passive    20
```

This example will give Chameleon the following abilities:
- **Skill 1**: Trueshot Aura  
- **Skill 2**: Critical Strike  
- **Skill 3**: Shadow Strike  
- **Ultimate**: Vengeance  
- **Passive**: Resistant Skin  

You can mix and match using the following skill ID references:

### ***Skill choices***

| ID | Skill             |
|----|-------------------|
| 0  | Vampiric Aura     |
| 1  | Unholy Aura       |
| 2  | Levitation        |
| 4  | Invisibility      |
| 5  | Devotion Aura     |
| 6  | Bash              |
| 8  | Critical Strike   |
| 9  | Critical Grenade  |
| 10 | Reincarnation     |
| 12 | Evasion           |
| 13 | Thorns            |
| 14 | Trueshot Aura     |
| 16 | Phoenix           |
| 17 | Banish            |
| 18 | Siphon Mana       |
| 21 | Healing Wave      |
| 22 | Hex               |
| 23 | Serpent Ward      |
| 26 | Fan of Knives     |
| 27 | Blink             |
| 28 | Shadow Strike     |
| 31 | Impale            |
| 32 | Spiked Carapace   |
| 33 | Carrion Beetles   |

### ***Ultimate choices***

| ID | Ultimate          |
|----|-------------------|
| 3  | Suicide Bomber    |
| 7  | Blink             |
| 11 | Chain Lightning   |
| 15 | Entangle          |
| 19 | Immolate          |
| 24 | Big Bad Voodoo    |
| 29 | Vengeance         |
| 34 | Locust Swarm      |

### ***Passive choices***

| ID | Passive Skill     |
|----|-------------------|
| 20 | Resistant Skin    |
| 25 | Unstable Concoction |
| 30 | Hardened Skin     |
| 35 | Orb               |
