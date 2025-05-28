# Warcraft 3 Frozen Throne: Frequently Asked Questions

## 📚 Table of Contents

- [Configuration](#configuration)
  - [How do I save XP?](#how-do-i-save-xp)
  - [What is the difference between long term and short term XP?](#what-is-the-difference-between-long-term-and-short-term-xp)
  - [How do I choose my language?](#how-do-i-choose-my-language)
  - [Is CS 1.5 supported?](#is-cs-15-supported)
  - [What mods are supported?](#what-mods-are-supported)
  - [Will this work on a listen server?](#will-this-work-on-a-listen-server)
  - [Is it possible to use bots with war3ft?](#is-it-possible-to-use-bots-with-war3ft)
  - [I don't like the Orc grenades, can I disable them?](#i-dont-like-the-orc-grenades-can-i-disable-them)
  - [How do I change the prices of the shopmenu items?](#how-do-i-change-the-prices-of-the-shopmenu-items)
- [Other](#other)
  - [Will this work for Counter-Strike Source?](#will-this-work-for-counter-strike-source)
  - [I have an idea for a new race, will you add it?](#i-have-an-idea-for-a-new-race-will-you-add-it)
  - [What is the chameleon race?](#what-is-the-chameleon-race)
  - [Where do I find information on how to bind my keys?](#where-do-i-find-information-on-how-to-bind-my-keys)

## Configuration

### How do I save XP?
In the [configuration](configuration.md) file (`war3ft.cfg`) set `mp_savexp` to `1`.

### What is the difference between long term and short term XP?
Short term experience is not saved, so with each map change you have to re-earn your experience. Also, when you gain experience and change races on short term, the experience gained stays with you.

In long-term mode, you have to gain experience for each race individually. This experience is also saved so you can rejoin the server later and continue (unless the server admin deleted your experience).

### How do I choose my language?
When you're in the game, type `amx_langmenu` in the console.

### Is CS 1.5 supported?
No.

### What mods are supported?
Counter-Strike 1.6, Condition Zero and Day of Defeat.

### Will this work on a listen server?
Yes it does, the installation is almost identical to a normal installation.

### Is it possible to use bots with war3ft?
Yes, try using podbot at [bots united](http://podbotmm.bots-united.com/doc_v3/index.html).

### I don't like the Orc grenades, can I disable them?
No.

### How do I change the prices of the shopmenu items?
The prices are stored in `war3ft\items.inl`. You can change the values in the `ITEM_Init()` method but you'll need to recompile the plugin.

---

## Other

### Will this work for Counter-Strike Source?
No.

### I have an idea for a new race, will you add it?
No.

### What is the chameleon race?
It is a 9th race added by bad-at-this that will allow server administrators to either SET the skills for that race, or the skills will be randomly chosen each round.  
To set the skills, you may do so in your `war3FT.cfg` file.

### Where do I find information on how to bind my keys?
View the [configuration](configuration.md) documentation.
