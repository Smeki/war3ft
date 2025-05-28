---
title: Upgrading
parent: Installation
nav_order: 2
---

# Warcraft 3 Frozen Throne: Upgrading Guide

This guide will help you upgrade to the latest version of Warcraft 3 Frozen Throne (war3ft) for Counter-Strike or Condition Zero game servers.

## Requirements

1. **HLDS Installed**
   - [HLDS Installation Guide](../hlds.md)
2. **AMX Mod X Installed**
   - [AMX Mod X Downloads](https://www.amxmodx.org/downloads.php)
3. **Warcraft 3 Frozen Throne Downloaded**
   - [Download war3ft](https://github.com/wc3mods/war3ft/releases)


## Upgrading Process

After downloading the latest version, follow these steps to upgrade:

1. **Backup Configuration Files**: Before proceeding, it's recommended to back up your existing configuration files to prevent any loss of custom settings.

2. **Replace Existing Files**: Copy the new files over the existing ones in your game server directory, following the structure below:

```
|-- cstrike (or czero)
    |-- addons
        |-- amxmodx
            |-- configs       # Place the 'war3ft' folder containing configuration files here
            |-- plugins       # Place 'war3ft.amxx' here
            |-- scripting     # Optional: Place the war3ft source code here
    |-- sounds                # Place the contents of the 'sounds' folder here
    |-- sprites               # Place the contents of the 'sprites' folder here
    wc3.css                 # Place this file in the root directory
```

*Note*: The `wc3.css` file should be placed in the root directory of your game server (e.g., `cstrike/`, `czero/` or `/dod`).

---

For further configuration details, refer to the [Configuration Guide](../configuration.md).
