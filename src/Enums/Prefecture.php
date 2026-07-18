<?php

declare(strict_types=1);

namespace BVP\Prefecture\Enums;

use RuntimeException;

/**
 * @author shimomo
 */
enum Prefecture: int
{
    case hokkaido = 1;
    case aomori = 2;
    case iwate = 3;
    case miyagi = 4;
    case akita = 5;
    case yamagata = 6;
    case fukushima = 7;
    case ibaraki = 8;
    case tochigi = 9;
    case gunma = 10;
    case saitama = 11;
    case chiba = 12;
    case tokyo = 13;
    case kanagawa = 14;
    case niigata = 15;
    case toyama = 16;
    case ishikawa = 17;
    case fukui = 18;
    case yamanashi = 19;
    case nagano = 20;
    case gifu = 21;
    case shizuoka = 22;
    case aichi = 23;
    case mie = 24;
    case shiga = 25;
    case kyoto = 26;
    case osaka = 27;
    case hyogo = 28;
    case nara = 29;
    case wakayama = 30;
    case tottori = 31;
    case shimane = 32;
    case okayama = 33;
    case hiroshima = 34;
    case yamaguchi = 35;
    case tokushima = 36;
    case kagawa = 37;
    case ehime = 38;
    case kochi = 39;
    case fukuoka = 40;
    case saga = 41;
    case nagasaki = 42;
    case kumamoto = 43;
    case oita = 44;
    case miyazaki = 45;
    case kagoshima = 46;
    case okinawa = 47;

    /**
     * @return array<int, array{
     *     number: int<1, 47>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     *     region_number: int<1, 8>,
     *     region_name: non-empty-string,
     *     region_short_name: non-empty-string,
     *     region_hiragana_name: non-empty-string,
     *     region_katakana_name: non-empty-string,
     *     region_english_name: non-empty-string,
     * }>
     */
    private static function rows(): array
    {
        /**
         * @var ?array<int, array{
         *     number: int<1, 47>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         *     region_number: int<1, 8>,
         *     region_name: non-empty-string,
         *     region_short_name: non-empty-string,
         *     region_hiragana_name: non-empty-string,
         *     region_katakana_name: non-empty-string,
         *     region_english_name: non-empty-string,
         * }> $rows
         */
        static $rows = null;

        if ($rows === null) {
            $prefectures = require __DIR__ . '/../Resources/prefectures.php';

            $rows = [];

            foreach ($prefectures as $prefecture) {
                $regionRow = Region::from($prefecture['region_number'])->toArray();

                if ($regionRow === null) {
                    throw new RuntimeException(
                        "Missing region resource row for region number {$prefecture['region_number']}."
                    );
                }

                $rows[$prefecture['number']] = $prefecture + [
                    'region_name' => $regionRow['name'],
                    'region_short_name' => $regionRow['short_name'],
                    'region_hiragana_name' => $regionRow['hiragana_name'],
                    'region_katakana_name' => $regionRow['katakana_name'],
                    'region_english_name' => $regionRow['english_name'],
                ];
            }
        }

        return $rows;
    }

    /**
     * @return ?array{
     *   number: int<1, 47>,
     *   name: non-empty-string,
     *   short_name: non-empty-string,
     *   hiragana_name: non-empty-string,
     *   katakana_name: non-empty-string,
     *   english_name: non-empty-string,
     *   region_number: int<1, 8>,
     *   region_name: non-empty-string,
     *   region_short_name: non-empty-string,
     *   region_hiragana_name: non-empty-string,
     *   region_katakana_name: non-empty-string,
     *   region_english_name: non-empty-string,
     * }
     */
    public function toArray(): ?array
    {
        return self::rows()[$this->value] ?? null;
    }

    /**
     * @return ?string
     */
    public function name(): ?string
    {
        return $this->toArray()['name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function shortName(): ?string
    {
        return $this->toArray()['short_name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function hiraganaName(): ?string
    {
        return $this->toArray()['hiragana_name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function katakanaName(): ?string
    {
        return $this->toArray()['katakana_name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function englishName(): ?string
    {
        return $this->toArray()['english_name'] ?? null;
    }

    /**
     * @return ?\BVP\Prefecture\Enums\Region
     */
    public function region(): ?Region
    {
        $regionNumber = $this->toArray()['region_number'] ?? null;

        if ($regionNumber !== null) {
            return Region::tryFrom($regionNumber);
        }

        return null;
    }

    /**
     * @param ?string $name
     * @return ?self
     */
    public static function fromName(?string $name): ?self
    {
        if ($name === null) {
            return null;
        }

        return self::byName()[strtolower($name)] ?? null;
    }

    /**
     * @return array<string, self>
     */
    private static function byName(): array
    {
        /** @var ?array<string, self> $map */
        static $map = null;

        if ($map === null) {
            $map = [];

            foreach (self::cases() as $case) {
                foreach ([
                    $case->name(),
                    $case->shortName(),
                    $case->hiraganaName(),
                    $case->katakanaName(),
                    $case->englishName(),
                ] as $variant) {
                    if ($variant !== null) {
                        $map[strtolower($variant)] ??= $case;
                    }
                }
            }
        }

        return $map;
    }
}
