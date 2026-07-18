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

都道府県・地方の番号、名称（漢字・ひらがな・カタカナ・英語）、および都道府県が属する地方を相互に変換する小さなユーティリティライブラリです。PHP 8.1 の enum で実装されています。

## Why

日本の 47 都道府県は、システムによって様々な形式で表現されます。数値コード（1〜47）、正式な漢字名（青森県）、短縮名（青森）、ひらがな/カタカナ読み、ローマ字の英語名（aomori）などです。これらを相互に変換したり、都道府県がどの8地方に属するかを解決したりする処理は、通常プロジェクトのあちこちに自前のルックアップテーブルを書くことになりがちです。

`Prefecture` はこれを単一のテスト済みデータソースとして提供します。ネイティブな PHP enum で実装されているため、各都道府県・地方は型安全な値として扱え、`===` で比較したり `switch` (`match`) で分岐したりできます。

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
Prefecture::from('aomori'); // Enums\Prefecture::aomori (大文字小文字を区別しない)

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

`Prefecture` と `Region`（いずれも `BVP\Prefecture` 名前空間）は、同じ 3 つのルックアップメソッドを持ちます。

| Method | Behavior |
|---|---|
| `Prefecture::from($value)` / `Region::from($value)` | 番号または名前で解決する（番号が名前より優先される。後述） |
| `Prefecture::fromNumber(int $number)` / `Region::fromNumber(int $number)` | 番号のみで解決する（1〜47 / 1〜8） |
| `Prefecture::fromName(string $name)` / `Region::fromName(string $name)` | 名前のいずれかのバリアント（漢字・短縮名・ひらがな・カタカナ・英語）で解決する。英語名は大文字小文字を区別しない |

いずれのルックアップメソッドも、一致するものがなければ `null` を返します。

**優先順位について:** `from()` は常に値をまず番号として解釈しようとします。`Prefecture::from('13')` は「13」という名前の都道府県としてではなく、都道府県番号 13（東京都）として解決されます。

> **非推奨:** `Prefecture::fromRegion()`、`fromRegionNumber()`、`fromRegionName()` は引き続き動作しますが、内部で上記の `Region` クラスに委譲しており、次のメジャーバージョンで削除予定です。代わりに `Region::from()` / `fromNumber()` / `fromName()` を使用してください。

### Enum methods

解決された `BVP\Prefecture\Enums\Prefecture` と `BVP\Prefecture\Enums\Region` の case は、以下を提供します。

| Method | Behavior |
|---|---|
| `->toArray()` | 名前の全バリアントを配列で返す（`Prefecture` の場合は属する地方の名前バリアントも含む） |
| `->name()` / `->shortName()` / `->hiraganaName()` / `->katakanaName()` / `->englishName()` | それぞれに対応する名前バリアント |
| `Prefecture->region()` | この都道府県が属する `Region` case |
| `Region->prefectures()` | この地方に属する全 `Prefecture` case(番号順) |
| `->jsonSerialize()` | `toArray()` と同じ形状。両 enum とも `JsonSerializable` を実装しているため `json_encode()` から自動的に呼ばれる |

## What it does not do

- 市区町村など、都道府県・地方より下位の行政単位はカバーしません。
- 過去の行政区画の変遷は追跡せず、現在の 47 都道府県・8 地方のみを表現します。

## License

Prefecture は [MIT license](LICENSE) の元で公開されています。
