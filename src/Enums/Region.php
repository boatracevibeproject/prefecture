<?php

declare(strict_types=1);

namespace BVP\Prefecture\Enums;

use JsonSerializable;
use RuntimeException;

/**
 * @author shimomo
 */
enum Region: int implements JsonSerializable
{
    case hokkaido = 1;
    case tohoku = 2;
    case kanto = 3;
    case chubu = 4;
    case kinki = 5;
    case chugoku = 6;
    case shikoku = 7;
    case kyushu = 8;

    /**
     * @return array<int, array{
     *     number: int<1, 8>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     * }>
     */
    private static function rows(): array
    {
        /**
         * @var array<int, array{
         *     number: int<1, 8>,
         *     name: non-empty-string,
         *     short_name: non-empty-string,
         *     hiragana_name: non-empty-string,
         *     katakana_name: non-empty-string,
         *     english_name: non-empty-string,
         * }>|null $rows
         */
        static $rows = null;

        if ($rows === null) {
            $regions = require __DIR__ . '/../Resources/regions.php';

            $rows = array_column($regions, null, 'number');
        }

        return $rows;
    }

    /**
     * @return ?array{
     *     number: int<1, 8>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     * }
     */
    public function toArray(): ?array
    {
        return self::rows()[$this->value] ?? null;
    }

    /**
     * @return array{
     *     number: int<1, 8>,
     *     name: non-empty-string,
     *     short_name: non-empty-string,
     *     hiragana_name: non-empty-string,
     *     katakana_name: non-empty-string,
     *     english_name: non-empty-string,
     * }
     */
    #[\Override]
    public function jsonSerialize(): array
    {
        $row = $this->toArray();

        if ($row === null) {
            throw new RuntimeException("Missing resource row for region: {$this->name}.");
        }

        return $row;
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
     * @return list<\BVP\Prefecture\Enums\Prefecture>
     */
    public function prefectures(): array
    {
        return array_values(array_filter(Prefecture::cases(), fn(Prefecture $prefecture): bool =>
            $prefecture->region() === $this
        ));
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
