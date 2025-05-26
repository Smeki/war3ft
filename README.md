# War3FT (Warcraft 3: Frozen Throne) Plugin for Counter-Strike 1.6, Day of Defeat and Condition Zero

This is an AMX MOD X plugin that implements Warcraft 3: Frozen Throne RPG elements into the game. Players can level up, choose races, use skills, and gain experience during gameplay.

## Features

- Multiple races with unique abilities
- Experience and leveling system
- Special skills and ultimate abilities
- Item shop system
- Customizable configurations
- Web interface for stats

## Prerequisites

To compile and use this plugin, you need:

1. AMX Mod X 1.8.2 or later
2. Metamod installed on your Counter-Strike server
3. AMX Mod X compiler (amxxpc)

## Directory Structure

```
war3ft/
├── war3ft.sma          # Main plugin source file
├── configs/            # Configuration files
├── data/              # Data files
├── war3ft/            # Plugin specific files
├── web/               # Web interface files
└── wc3.css            # Stylesheet for web interface
```

## Compilation Instructions

1. **Install AMX Mod X Development Kit**
   - Download the latest AMX Mod X Dev Kit from [www.amxmodx.org](https://www.amxmodx.org/downloads.php)
   - Extract it to a convenient location

2. **Set up the environment**
   - Add the AMX Mod X compiler directory to your system PATH
   - Ensure you have all required include files in your compiler's include directory

3. **Compile the plugin**
   ```bash
   # Navigate to the plugin directory
   cd war3ft

   # Compile using amxxpc
   amxxpc war3ft.sma
   ```
   This will generate `war3ft.amxx` file

4. **Installation**
   - Copy `war3ft.amxx` to your server's `addons/amxmodx/plugins/` directory
   - Copy contents of `configs/` to your server's `addons/amxmodx/configs/` directory
   - Copy other necessary files to their respective directories

## Configuration

1. Add the following to your `plugins.ini`:
   ```
   war3ft.amxx
   ```

2. Configure the plugin settings in the config files located in the `configs/` directory

## Common Issues

- If compilation fails, ensure all required include files are present
- Check the compiler's error messages for missing includes or syntax errors
- Verify that all dependencies are installed correctly

## Support

For issues, bug reports, or feature requests, please create an issue in the repository.

## Changelog

See [changelog.txt](war3ft/changelog.txt) for a detailed list of changes and updates.

## License

This project is licensed under the terms specified in the license file.

## Credits

Thanks to the AMX Mod X team and the Counter-Strike modding community for making this possible. 
