---
title: HLDS Installation Guides
nav_order: 5
---

# Linux Half-Life Dedicated Server Installation Guide

This guide provides instructions for installing and configuring Half-Life Dedicated Server (HLDS) for various Steam games on Linux.

## Prerequisites

- A Linux server (Ubuntu 16 recommended - i386)
- SteamCMD installed
- Sufficient disk space (at least 1GB per game)
- Root or sudo access

## Installing SteamCMD

```bash
# Create steam user and directory
sudo useradd -m steam
sudo mkdir /opt/steamcmd
sudo chown steam:steam /opt/steamcmd

# Install required dependencies
sudo apt-get update
sudo apt-get install curl wget

# For 64-bit
sudo dpkg --add-architecture i386
sudo apt update
sudo apt install libstdc++6:i386

# Download and extract SteamCMD
cd /opt/steamcmd
sudo -u steam wget https://steamcdn-a.akamaihd.net/client/installer/steamcmd_linux.tar.gz
sudo -u steam tar -xvzf steamcmd_linux.tar.gz
```

### Debian 12 Notes

```
dpkg --add-architecture i386
apt update
apt install libstdc++6:i386
```

## Installing Game Servers

Note: If you get an authentication error you'll need to login with your steam account.

### Counter-Strike 1.6 

```bash
sudo -u steam /opt/steamcmd/steamcmd.sh +force_install_dir /opt/steamcmd/server/ +login anonymous +app_update 90 validate +quit
```

#### Start your server
```bash
cd /opt/steamcmd/server/
./hlds_run -console -game cstrike +ip 0.0.0.0 +port 27015 +map de_dust2 +maxplayers 32 +sv_lan 0
```

### Day of Defeat

```bash
sudo -u steam /opt/steamcmd/steamcmd.sh +force_install_dir /opt/steamcmd/server/ +login anonymous +app_update 30 validate +quit
```

#### Start your server
```bash
cd /opt/steamcmd/server/
./hlds_run -console -game dod +ip 0.0.0.0 +port 27016 +map dod_avalanche +maxplayers 32 +sv_lan 0
```

### Counter-Strike: Condition Zero

```bash
sudo -u steam /opt/steamcmd/steamcmd.sh +force_install_dir /opt/steamcmd/server/ +login anonymous +app_update 80 validate +quit
```

#### Start your server
```bash
cd /opt/steamcmd/server/
./hlds_run -console -game czero +ip 0.0.0.0 +port 27017 +map de_dust2 +maxplayers 32 +sv_lan 0
```

## Additional Resources

- [Valve Developer Wiki](https://developer.valvesoftware.com/wiki/Main_Page)
- [Steam Game Server Account Management](https://steamcommunity.com/dev/managegameservers)
- [HLDS Command Line Parameters](https://developer.valvesoftware.com/wiki/Command_Line_Options#Half-Life_Dedicated_Server)

