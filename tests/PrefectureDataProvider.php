<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

/**
 * @author shimomo
 */
final class PrefectureDataProvider
{
    /**
     * @return array
     */
    public static function allProvider(): array
    {
        return [
            [
                'arguments' => [],
                'expected' => array_merge(
                    PrefectureConstant::$hokkaido,
                    PrefectureConstant::$aomori,
                    PrefectureConstant::$iwate,
                    PrefectureConstant::$miyagi,
                    PrefectureConstant::$akita,
                    PrefectureConstant::$yamagata,
                    PrefectureConstant::$fukushima,
                    PrefectureConstant::$ibaraki,
                    PrefectureConstant::$tochigi,
                    PrefectureConstant::$gunma,
                    PrefectureConstant::$saitama,
                    PrefectureConstant::$chiba,
                    PrefectureConstant::$tokyo,
                    PrefectureConstant::$kanagawa,
                    PrefectureConstant::$niigata,
                    PrefectureConstant::$toyama,
                    PrefectureConstant::$ishikawa,
                    PrefectureConstant::$fukui,
                    PrefectureConstant::$yamanashi,
                    PrefectureConstant::$nagano,
                    PrefectureConstant::$gifu,
                    PrefectureConstant::$shizuoka,
                    PrefectureConstant::$aichi,
                    PrefectureConstant::$mie,
                    PrefectureConstant::$shiga,
                    PrefectureConstant::$kyoto,
                    PrefectureConstant::$osaka,
                    PrefectureConstant::$hyogo,
                    PrefectureConstant::$nara,
                    PrefectureConstant::$wakayama,
                    PrefectureConstant::$tottori,
                    PrefectureConstant::$shimane,
                    PrefectureConstant::$okayama,
                    PrefectureConstant::$hiroshima,
                    PrefectureConstant::$yamaguchi,
                    PrefectureConstant::$tokushima,
                    PrefectureConstant::$kagawa,
                    PrefectureConstant::$ehime,
                    PrefectureConstant::$kochi,
                    PrefectureConstant::$fukuoka,
                    PrefectureConstant::$saga,
                    PrefectureConstant::$nagasaki,
                    PrefectureConstant::$kumamoto,
                    PrefectureConstant::$oita,
                    PrefectureConstant::$miyazaki,
                    PrefectureConstant::$kagoshima,
                    PrefectureConstant::$okinawa,
                ),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byNumberListProvider(): array
    {
        return [
            [
                'arguments' => [13],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [[13]],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [13, 34],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [[13, 34]],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [13, 34, 48],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [[13, 34, 48]],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byNameListProvider(): array
    {
        return [
            [
                'arguments' => ['東京都'],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [['東京都']],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => ['東京都', '広島県'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['東京都', '広島県']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => ['東京都', '広島県', '都道府県'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['東京都', '広島県', '都道府県']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima],
            [
                'arguments' => ['東京'],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [['東京']],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => ['東京', '広島'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['東京', '広島']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => ['東京', '広島', '都道府県'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['東京', '広島', '都道府県']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byShortNameListProvider(): array
    {
        return [
            [
                'arguments' => ['東京'],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [['東京']],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => ['東京', '広島'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['東京', '広島']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => ['東京', '広島', '都道府県'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['東京', '広島', '都道府県']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byHiraganaNameListProvider(): array
    {
        return [
            [
                'arguments' => ['とうきょうと'],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [['とうきょうと']],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => ['とうきょうと', 'ひろしまけん'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['とうきょうと', 'ひろしまけん']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => ['とうきょうと', 'ひろしまけん', 'とどうふけん'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['とうきょうと', 'ひろしまけん', 'とどうふけん']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byKatakanaNameListProvider(): array
    {
        return [
            [
                'arguments' => ['トウキョウト'],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [['トウキョウト']],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => ['トウキョウト', 'ヒロシマケン'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['トウキョウト', 'ヒロシマケン']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => ['トウキョウト', 'ヒロシマケン', 'トドウフケン'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['トウキョウト', 'ヒロシマケン', 'トドウフケン']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byEnglishNameListProvider(): array
    {
        return [
            [
                'arguments' => ['tokyo'],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => [['tokyo']],
                'expected' => PrefectureConstant::$tokyo,
            ],
            [
                'arguments' => ['tokyo', 'hiroshima'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['tokyo', 'hiroshima']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => ['tokyo', 'hiroshima', 'prefecture'],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
            [
                'arguments' => [['tokyo', 'hiroshima', 'prefecture']],
                'expected' => PrefectureConstant::$tokyo + PrefectureConstant::$hiroshima,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byRegionNumberListProvider(): array
    {
        return [
            [
                'arguments' => [3],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa,
            ],
            [
                'arguments' => [[3]],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa,
            ],
            [
                'arguments' => [3, 6],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => [[3, 6]],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => [3, 6, 9],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => [[3, 6, 9]],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byRegionNameListProvider(): array
    {
        return [
            [
                'arguments' => ['関東地方'],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa,
            ],
            [
                'arguments' => [['関東地方']],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa,
            ],
            [
                'arguments' => ['関東地方', '中国地方'],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => [['関東地方', '中国地方']],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => ['関東地方', '中国地方', '地域'],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => [['関東地方', '中国地方', '地域']],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byRegionShortNameListProvider(): array
    {
        return [
            [
                'arguments' => ['関東'],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
            ],
            [
                'arguments' => [['関東']],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
            ],
            [
                'arguments' => ['関東', '中国'],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => [['関東', '中国']],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => ['関東', '中国', '地域'],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
            [
                'arguments' => [['関東', '中国', '地域']],
                'expected' => PrefectureConstant::$ibaraki
                    + PrefectureConstant::$tochigi
                    + PrefectureConstant::$gunma
                    + PrefectureConstant::$saitama
                    + PrefectureConstant::$chiba
                    + PrefectureConstant::$tokyo
                    + PrefectureConstant::$kanagawa
                    + PrefectureConstant::$tottori
                    + PrefectureConstant::$shimane
                    + PrefectureConstant::$okayama
                    + PrefectureConstant::$hiroshima
                    + PrefectureConstant::$yamaguchi,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byNumberProvider(): array
    {
        return [
            [
                'arguments' => [13],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => [[13]],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byNameProvider(): array
    {
        return [
            [
                'arguments' => ['東京都'],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => [['東京都']],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => ['東京'],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => [['東京']],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byShortNameProvider(): array
    {
        return [
            [
                'arguments' => ['東京'],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => [['東京']],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byHiraganaNameProvider(): array
    {
        return [
            [
                'arguments' => ['とうきょうと'],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => [['とうきょうと']],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byKatakanaNameProvider(): array
    {
        return [
            [
                'arguments' => ['トウキョウト'],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => [['トウキョウト']],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byEnglishNameProvider(): array
    {
        return [
            [
                'arguments' => ['tokyo'],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
            [
                'arguments' => [['tokyo']],
                'expected' => reset(PrefectureConstant::$tokyo),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byRegionNumberProvider(): array
    {
        return [
            [
                'arguments' => [3],
                'expected' => reset(PrefectureConstant::$ibaraki),
            ],
            [
                'arguments' => [[3]],
                'expected' => reset(PrefectureConstant::$ibaraki),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byRegionNameProvider(): array
    {
        return [
            [
                'arguments' => ['関東地方'],
                'expected' => reset(PrefectureConstant::$ibaraki),
            ],
            [
                'arguments' => [['関東地方']],
                'expected' => reset(PrefectureConstant::$ibaraki),
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byRegionShortNameProvider(): array
    {
        return [
            [
                'arguments' => ['関東'],
                'expected' => reset(PrefectureConstant::$ibaraki),
            ],
            [
                'arguments' => [['関東']],
                'expected' => reset(PrefectureConstant::$ibaraki),
            ],
        ];
    }
}
