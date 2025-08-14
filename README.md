# BVP Prefecture

[English](./README.md) | [日本語](./README_ja.md)

[![tests](https://github.com/shimomo/bvp-prefecture/actions/workflows/tests.yml/badge.svg)](https://github.com/shimomo/bvp-prefecture/actions/workflows/tests.yml)
[![codecov](https://codecov.io/gh/shimomo/bvp-prefecture/graph/badge.svg?token=6DECMJOHLZ)](https://codecov.io/gh/shimomo/bvp-prefecture)
[![php](https://poser.pugx.org/bvp/prefecture/require/php)](https://packagist.org/packages/bvp/prefecture)
[![stable](https://poser.pugx.org/bvp/prefecture/v/stable)](https://packagist.org/packages/bvp/prefecture)
[![unstable](https://poser.pugx.org/bvp/prefecture/v/unstable)](https://packagist.org/packages/bvp/prefecture#5.x-dev)
[![license](https://poser.pugx.org/bvp/prefecture/license)](https://packagist.org/packages/bvp/prefecture)

The BVP Prefecture package provides structured data about all Japanese prefectures, including their names in various scripts (Kanji, Hiragana, Katakana, English), region information, and identifier numbers.
It is useful for applications that need to handle Japanese geographic data in a consistent and normalized way.

## Installation
```bash
composer require bvp/prefecture
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Prefecture\Prefecture;
```

### Available Methods

#### Retrieving All Prefectures
- [`Prefecture::all()`](#retrieve-all-prefectures)

#### Filtering by Prefecture
- [`Prefecture::byNumber()`](#filter-by-prefecture-number)
- [`Prefecture::byName()`](#filter-by-prefecture-name)
- [`Prefecture::byShortName()`](#filter-by-prefecture-short-name)
- [`Prefecture::byHiraganaName()`](#filter-by-prefecture-hiragana-name)
- [`Prefecture::byKatakanaName()`](#filter-by-prefecture-katakana-name)
- [`Prefecture::byEnglishName()`](#filter-by-prefecture-english-name)

#### Filtering by Region
- [`Prefecture::byRegionNumber()`](#filter-by-region-number)
- [`Prefecture::byRegionName()`](#filter-by-region-name)
- [`Prefecture::byRegionShortName()`](#filter-by-region-short-name)

Each method also supports [`List`](#filter-by-multiple-criteria-lists) variants like [`byNameList()`](#filter-by-multiple-criteria-lists) or [`byRegionNameList()`](#filter-by-multiple-criteria-lists) for multiple inputs.

---

#### Retrieve All Prefectures
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

#### Filter by Prefecture Number
```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byNumber(13);
// or $prefecture = Prefecture::byNumber([13]);

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

#### Filter by Prefecture Name
```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byName('東京都');
// or $prefecture = Prefecture::byName(['東京都']);
```

#### Filter by Prefecture Short Name
```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byShortName('東京');
// or $prefecture = Prefecture::byShortName(['東京']);
```

#### Filter by Prefecture Hiragana Name
```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byHiraganaName('とうきょうと');
// or $prefecture = Prefecture::byHiraganaName(['とうきょうと']);
```

#### Filter by Prefecture Katakana Name
```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byKatakanaName('トウキョウト');
// or $prefecture = Prefecture::byKatakanaName(['トウキョウト']);
```

#### Filter by Prefecture English Name
```php
/**
 * @return array|null
 */
$prefecture = Prefecture::byEnglishName('tokyo');
// or $prefecture = Prefecture::byEnglishName(['tokyo']);
```

---

#### Filter by Region Number
```php
/**
 * @deprecated It returns only a single result even if multiple prefectures match. Use Prefecture::byRegionNumberList() instead.
 * @return array|null
 */
$prefecture = Prefecture::byRegionNumber(3);
// or $prefecture = Prefecture::byRegionNumber([3]);
```

#### Filter by Region Name
```php
/**
 * @deprecated It returns only a single result even if multiple prefectures match. Use Prefecture::byRegionNameList() instead.
 * @return array|null
 */
$prefecture = Prefecture::byRegionName('関東地方');
// or $prefecture = Prefecture::byRegionName(['関東地方']);
```

#### Filter by Region Short Name
```php
/**
 * @deprecated It returns only a single result even if multiple prefectures match. Use Prefecture::byRegionShortNameList() instead.
 * @return array|null
 */
$prefecture = Prefecture::byRegionShortName('関東');
// or $prefecture = Prefecture::byRegionShortName(['関東']);
```

---

#### Filter by Multiple Criteria (Lists)
```php
/**
 * @return array|null
 */
$prefectures = Prefecture::byNumberList(13, 34);
// or Prefecture::byNumberList([13, 34]);

/**
 * @return array|null
 */
$prefectures = Prefecture::byNameList('東京都', '広島県');
// or Prefecture::byNameList(['東京都', '広島県']);

/**
 * @return array|null
 */
$prefectures = Prefecture::byRegionNumberList(3, 6);
// or Prefecture::byRegionNumberList([3, 6]);

/**
 * @return array|null
 */
$prefectures = Prefecture::byRegionNameList('関東地方', '中国地方');
// or Prefecture::byRegionNameList(['関東地方', '中国地方']);
```

## Data Format
The prefecture codes used in this package are based on JIS X 0401 (Japanese Prefecture Codes), with leading zeros removed and represented as integers.

## Why use this?
- Consistent and normalized prefecture data for Japanese apps
- Multiple name formats supported (Kanji, Hiragana, Katakana, English)
- Easy to filter by region or name

## License
The BVP Prefecture package is open source software licensed under the [MIT license](LICENSE).
