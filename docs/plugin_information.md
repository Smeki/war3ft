# Warcraft 3 Frozen Throne: Plugin Information

This document provides information about the Warcraft 3 Frozen Throne (war3ft) plugin for Counter-Strike, Condition Zero, and Day of Defeat servers.

## What is war3ft?

Warcraft 3 Frozen Throne (war3ft) is an AMX MOD X plugin developed for Counter-Strike, Condition Zero, and Day of Defeat. It features 8 races (with a 9th that allows server operators to choose custom skills) and 2 shopmenus to extend normal play.

## How to Play

When you enter a server running war3ft, you will be presented with a race selection screen. Simply choose a race and you can start playing! However, to get the full experience, you might want to bind some keys.

### Binding Keys

To bind a key, press the ` key on your keyboard to bring up the console and type "bind key command" depending on what key/command you would like. Then bind the following commands:

- shopmenu
- shopmenu2
- ultimate
- ability
- levitation

Example key bindings:

- bind "-" "shopmenu"
- bind "=" "shopmenu2"
- bind "mouse3" "ultimate"
- bind "alt" "ability"

You can add these bindings to your `config.cfg` file.

### Other Commands

You can also type the following commands into chat (slash is not required):

- /ability - Use your ability (currently only serpent wards)
- /changerace - Change your race
- /itemsinfo - List items and their descriptions
- /itemsinfo2 - List items in the second shopmenu
- /level - Display your current race, level, and skills
- /levitation - Enable or disable the low gravity ability (version 3.x only)
- /ms or /movespeed - Show your current movespeed (version 3.x only)
- /playerskills - Show skills of other players
- /selectskill - Select skills for your race
- /shopmenu - Display shopmenu 1
- /shopmenu2 - Display shopmenu 2
- /skillsinfo - Show descriptions of each skill for your selected race
- /war3help - Display the help menu
- /war3menu - Show the war3ft menu

## Race/Skill Information

### Undead Scourge

- **Vampiric Aura**: Gain a percentage of damage dealt as health
- **Unholy Aura**: Speed boost; all weapons grant the same speed
- **Levitation**: Jump higher by reducing gravity
- **Ultimate - Suicide Bomber**: Explode upon death, killing nearby enemies and regenerating

### Human Alliance

- **Invisibility**: Become partially invisible; more effective with a knife
- **Devotion Aura**: Gain additional health at the start of the round
- **Bash**: Chance to immobilize enemies for 1 second when shooting
- **Ultimate - Teleport**: Teleport to where you aim

### Orcish Horde

- **Critical Strike**: Chance to deal extra damage
- **Critical Grenade**: Grenades deal significantly more damage
- **Reincarnation (Day of Defeat)**: Chance to respawn where you died
- **Equipment Reincarnation (Counter-Strike/Condition Zero)**: Chance to regain equipment upon death
- **Ultimate - Chain Lightning**: Discharge lightning that jumps to nearby enemies

### Night Elf of Kalimdore

- **Evasion**: Chance to evade incoming shots
- **Thorns Aura**: Reflect damage back to attackers
- **Trueshot Aura**: Deal extra damage to enemies
- **Ultimate - Entangle Roots**: Immobilize an enemy for 10 seconds

### Blood Mage

- **Phoenix (Day of Defeat)**: Gain a bonus ($300, $600, $900) with each kill; half awarded to nearby teammates
- **Phoenix (Counter-Strike/Condition Zero)**: Chance to revive the first teammate who dies
- **Banish**: Chance to teleport an enemy away for 1 second
- **Siphon Mana**: Steal money from enemies
- **Ultimate - Flame Strike**: Burn an enemy player over time

### Shadow Hunter

- **Healing Wave**: Heal yourself and nearby teammates
- **Hex**: Chance to transform enemies into harmless creatures
- **Serpent Ward**: Place a ward that attacks enemies
- **Ultimate - Big Bad Voodoo**: Temporarily make yourself and nearby teammates invulnerable

### Warden

- **Blink**: Teleport a short distance
- **Fan of Knives**: Deal area damage around you
- **Shadow Strike**: Poison an enemy, dealing damage over time
- **Ultimate - Vengeance**: Summon a powerful avatar upon death

### Crypt Lord

- **Impale**: Launch spikes that damage and stun enemies
- **Spiked Carapace**: Reflect a portion of melee damage back to attackers
- **Carrion Beetles**: Summon beetles to fight for you
- **Ultimate - Locust Swarm**: Summon a swarm that damages enemies and heals you

### Chameleon

- **Custom Skills**: Server administrators can set custom skills for this race, or skills can be randomly assigned each round.

## Item Information

### Shopmenu 1

- **Claws of Attack**: Increase damage
- **Boots of Speed**: Increase movement speed
- **Ring of Regeneration**: Regenerate health over time
- **Scroll of Protection**: Increase armor
- **Potion of Healing**: Instantly restore health
- **Tome of Experience**: Gain experience points
- **Orb of Frost**: Slow enemies on hit
- **Staff of Teleportation**: Teleport to a teammate
- **Amulet of Spell Shield**: Block a single spell

### Shopmenu 2

- **Mask of Death**: Lifesteal effect
- **Boots of Elvenskin**: Increase agility
- **Ring of Health**: Increase maximum health
- **Scroll of Mana**: Restore mana
- **Potion of Invisibility**: Become invisible for a short time
- **Tome of Strength**: Increase strength attribute
- **Orb of Lightning**: Chance to purge enemy buffs
- **Staff of Silence**: Silence enemies in an area
- **Amulet of Recall**: Return to spawn point

## Miscellaneous

- **Experience System**: Gain experience by killing enemies and completing objectives
- **Leveling**: Level up to unlock new skills and abilities
- **Long-Term XP**: Option to save experience between sessions
- **Multilingual Support**: Supports multiple languages

## Translations

The plugin supports multiple languages. To select your preferred language, type `amx_langmenu` in the console and choose from the available options.
