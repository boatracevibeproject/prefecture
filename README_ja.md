# BVP Prefecture

[English](README.md) | [日本語](README_ja.md)

[![keepalive](https://github.com/shimomo/bvp-prefecture/actions/workflows/keepalive.yml/badge.svg)](https://github.com/shimomo/bvp-prefecture/actions/workflows/keepalive.yml)
[![psalm](https://github.com/shimomo/bvp-prefecture/actions/workflows/psalm.yml/badge.svg)](https://github.com/shimomo/bvp-prefecture/actions/workflows/psalm.yml)
[![security](https://github.com/shimomo/bvp-prefecture/actions/workflows/security.yml/badge.svg)](https://github.com/shimomo/bvp-prefecture/actions/workflows/security.yml)
[![test](https://github.com/shimomo/bvp-prefecture/actions/workflows/test.yml/badge.svg)](https://github.com/shimomo/bvp-prefecture/actions/workflows/test.yml)
[![codecov](https://codecov.io/gh/shimomo/bvp-prefecture/graph/badge.svg?token=6DECMJOHLZ)](https://codecov.io/gh/shimomo/bvp-prefecture)
[![php](https://poser.pugx.org/bvp/prefecture/require/php)](https://packagist.org/packages/bvp/prefecture)
[![stable](https://poser.pugx.org/bvp/prefecture/v/stable)](https://packagist.org/packages/bvp/prefecture)
[![license](https://poser.pugx.org/bvp/prefecture/license)](https://packagist.org/packages/bvp/prefecture)

BVP Prefecture は、日本の47都道府県に関する構造化データ（漢字・ひらがな・カタカナ・英語での名称、地方情報、都道府県番号など）を提供するライブラリです。日本の地理データを一貫性と正規化を持って扱いたいアプリケーションに最適です。

## インストール方法

```bash
composer require bvp/prefecture
```

## 使用方法

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Prefecture\Prefecture;
```

### 利用可能なメソッド

#### 都道府県一覧の取得

- [`Prefecture::all()`](#都道府県一覧の取得)

#### 都道府県による絞り込み

- [`Prefecture::byNumber()`](#都道府県番号での絞り込み)
- [`Prefecture::byName()`](#都道府県名での絞り込み)
- [`Prefecture::byShortName()`](#都道府県略称での絞り込み)
- [`Prefecture::byHiraganaName()`](#都道府県ひらがな名での絞り込み)
- [`Prefecture::byKatakanaName()`](#都道府県カタカナ名での絞り込み)
- [`Prefecture::byEnglishName()`](#都道府県英語名での絞り込み)

#### 地方による絞り込み

- [`Prefecture::byRegionNumber()`](#地方番号での検索)
- [`Prefecture::byRegionName()`](#地方名での検索)
- [`Prefecture::byRegionShortName()`](#地方略称での検索)

それぞれのメソッドには、複数条件での検索を可能にする [`List`](#複数条件による検索) 系メソッド（例：[`Prefecture::byNameList()`](#複数条件による検索) や [`Prefecture::byRegionNameList()`](#複数条件による検索)）もあります。

---

#### 都道府県一覧の取得

```php
/**
 * @return array
 */
$prefectures = Prefecture::all();

print_r($prefectures);

/*------------------------------
Array
(
    [1] => Array
        (
            [number] => 1
            [name] => 北海道
            [short_name] => 北海道
            [hiragana_name] => ほっかいどう
            [katakana_name] => ホッカイドウ
            [english_name] => hokkaido
            [region_number] => 1
            [region_name] => 北海道地方
            [region_short_name] => 北海道
        )
    [2] => Array(...) // Aomori
    [3] => Array(...) // Iwate
    ...
    [46] => Array(...) // Kagoshima
    [47] => Array(...) // Okinawa
)
------------------------------*/
```

---

#### 都道府県番号での絞り込み

```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byNumber(13);
// または $prefecture = Prefecture::byNumber([13]);

print_r($prefecture);

/*------------------------------
Array
(
    [number] => 13
    [name] => 東京都
    [short_name] => 東京
    [hiragana_name] => とうきょうと
    [katakana_name] => トウキョウト
    [english_name] => tokyo
    [region_number] => 3
    [region_name] => 関東地方
    [region_short_name] => 関東
)
------------------------------*/
```

#### 都道府県名での絞り込み

```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byName('東京都');
// または $prefecture = Prefecture::byName(['東京都']);
```

#### 都道府県略称での絞り込み

```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byShortName('東京');
// または $prefecture = Prefecture::byShortName(['東京']);
```

#### 都道府県ひらがな名での絞り込み

```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byHiraganaName('とうきょうと');
// または $prefecture = Prefecture::byHiraganaName(['とうきょうと']);
```

#### 都道府県カタカナ名での絞り込み

```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byKatakanaName('トウキョウト');
// または $prefecture = Prefecture::byKatakanaName(['トウキョウト']);
```

#### 都道府県英語名での絞り込み

```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byEnglishName('tokyo');
// または $prefecture = Prefecture::byEnglishName(['tokyo']);
```

---

#### 地方番号での検索

```php
/**
 * @deprecated 複数の都道府県が一致しても単数の結果しか返しません。代わりに Prefecture::byRegionNumberList() を使用してください。
 * @return array|null
 */
$prefecture = Prefecture::byRegionNumber(3);
// または $prefecture = Prefecture::byRegionNumber([3]);
```

#### 地方名での検索

```php
/**
 * @deprecated 複数の都道府県が一致しても単数の結果しか返しません。代わりに Prefecture::byRegionNameList() を使用してください。
 * @return array|null
 */
$prefecture = Prefecture::byRegionName('関東地方');
// または $prefecture = Prefecture::byRegionName(['関東地方']);
```

#### 地方略称での検索

```php
/**
 * @deprecated 複数の都道府県が一致しても単数の結果しか返しません。代わりに Prefecture::byRegionShortNameList() を使用してください。
 * @return array|null
 */
$prefecture = Prefecture::byRegionShortName('関東');
// または $prefecture = Prefecture::byRegionShortName(['関東']);
```

---

#### 複数条件による検索

```php
/**
 * @return array|null
 */
$prefectures = Prefecture::byNumberList(13, 34);
// または Prefecture::byNumberList([13, 34]);

/**
 * @return array|null
 */
$prefectures = Prefecture::byNameList('東京都', '広島県');
// または Prefecture::byNameList(['東京都', '広島県']);

/**
 * @return array|null
 */
$prefectures = Prefecture::byRegionNumberList(3, 6);
// または Prefecture::byRegionNumberList([3, 6]);

/**
 * @return array|null
 */
$prefectures = Prefecture::byRegionNameList('関東地方', '中国地方');
// または Prefecture::byRegionNameList(['関東地方', '中国地方']);
```

## データ仕様

このライブラリで使用している都道府県コードは、JIS X 0401（都道府県コード）に基づいており、先頭のゼロを除去した数値形式となっています。

例：01（北海道）→ 1、13（東京都）→ 13

## このライブラリの利点

- 日本向けアプリで一貫性のある都道府県データを扱える
- 複数の表記形式（漢字・ひらがな・カタカナ・英語）に対応
- 都道府県名や地方名で柔軟に絞り込み可能

## ライセンス

このライブラリは [MIT license](LICENSE) のもとで公開されています。
