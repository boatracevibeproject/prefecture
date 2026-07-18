# Prefecture

[English](README.md) | [日本語](README_ja.md)

[![php](https://poser.pugx.org/bvp/prefecture/require/php)](https://packagist.org/packages/bvp/prefecture)
[![stable](https://poser.pugx.org/bvp/prefecture/v/stable)](https://packagist.org/packages/bvp/prefecture)
[![license](https://poser.pugx.org/bvp/prefecture/license)](https://packagist.org/packages/bvp/prefecture)

[![test](https://github.com/boatracevibeproject/prefecture/actions/workflows/test.yml/badge.svg)](https://github.com/boatracevibeproject/prefecture/actions/workflows/test.yml)
[![psalm](https://github.com/boatracevibeproject/prefecture/actions/workflows/psalm.yml/badge.svg)](https://github.com/boatracevibeproject/prefecture/actions/workflows/psalm.yml)
[![audit](https://github.com/boatracevibeproject/prefecture/actions/workflows/audit.yml/badge.svg)](https://github.com/boatracevibeproject/prefecture/actions/workflows/audit.yml)
[![keepalive](https://github.com/boatracevibeproject/prefecture/actions/workflows/keepalive.yml/badge.svg)](https://github.com/boatracevibeproject/prefecture/actions/workflows/keepalive.yml)
[![dependabot-updates](https://github.com/boatracevibeproject/prefecture/actions/workflows/dependabot/dependabot-updates/badge.svg)](https://github.com/boatracevibeproject/prefecture/actions/workflows/dependabot/dependabot-updates)

A small utility library for converting between Japanese prefecture/region numbers, names (kanji, hiragana, katakana, English), and the region each prefecture belongs to — backed by native PHP 8.1 enums.

## Why

Japan's 47 prefectures show up differently across systems: numeric codes (1–47), full kanji names (青森県), short names (青森), hiragana/katakana readings, or romanized English names (aomori). Converting between these, and resolving which of the 8 regions (地方) a prefecture belongs to, normally means hand-rolling lookup tables scattered across a codebase.

`Prefecture` provides this as a single, tested source of truth, backed by native PHP enums so each prefecture/region is a real, type-safe value you can pass around, compare with `===`, and switch over.

## Installation

```bash
composer require bvp/prefecture
```

## Usage

```php
use BVP\Prefecture\Prefecture;
use BVP\Prefecture\Region;

Prefecture::from(2); // Enums\Prefecture::aomori
Prefecture::from('青森県'); // Enums\Prefecture::aomori
Prefecture::from('aomori'); // Enums\Prefecture::aomori (case-insensitive)

Prefecture::from(2)->name(); // '青森県'
Prefecture::from(2)->shortName(); // '青森'
Prefecture::from(2)->hiraganaName(); // 'あおもりけん'
Prefecture::from(2)->katakanaName(); // 'アオモリケン'
Prefecture::from(2)->englishName(); // 'aomori'
Prefecture::from(2)->region(); // Enums\Region::tohoku

Region::from('東北'); // Enums\Region::tohoku
Region::from('tohoku')->prefectures(); // [aomori, iwate, miyagi, akita, yamagata, fukushima]

json_encode(Prefecture::from(2));
// {"number":2,"name":"青森県","short_name":"青森", ... }
```

### Available methods

`Prefecture` and `Region` (both under `BVP\Prefecture`) expose the same three lookup methods:

| Method | Behavior |
|---|---|
| `Prefecture::from($value)` / `Region::from($value)` | Resolves by number or name (number lookup takes priority; see below) |
| `Prefecture::fromNumber(int $number)` / `Region::fromNumber(int $number)` | Resolves by number only (1–47 / 1–8) |
| `Prefecture::fromName(string $name)` / `Region::fromName(string $name)` | Resolves by any name variant (kanji, short, hiragana, katakana, or English; English matching is case-insensitive) |

All lookup methods return `null` when no match is found.

**Note on priority:** `from()` always tries the value as a number first. `Prefecture::from('13')` resolves to prefecture number 13 (Tokyo), not a prefecture literally named `"13"`.

> **Deprecated:** `Prefecture::fromRegion()`, `fromRegionNumber()`, and `fromRegionName()` still work but delegate to the `Region` class above and will be removed in the next major version. Use `Region::from()` / `fromNumber()` / `fromName()` instead.

### Enum methods

Once resolved, `BVP\Prefecture\Enums\Prefecture` and `BVP\Prefecture\Enums\Region` cases expose:

| Method | Behavior |
|---|---|
| `->toArray()` | All name variants as an array (and, for `Prefecture`, its region's name variants too) |
| `->name()` / `->shortName()` / `->hiraganaName()` / `->katakanaName()` / `->englishName()` | The corresponding name variant |
| `Prefecture->region()` | The `Region` case this prefecture belongs to |
| `Region->prefectures()` | All `Prefecture` cases belonging to this region, in number order |
| `->jsonSerialize()` | Same shape as `toArray()`; used automatically by `json_encode()` since both enums implement `JsonSerializable` |

## What it does not do

- It does not cover municipalities (市区町村) or any administrative unit below the prefecture/region level.
- It does not track historical administrative changes; only the current 47 prefectures and 8 regions are represented.

## License

Prefecture is open-source software released under the [MIT license](LICENSE).
