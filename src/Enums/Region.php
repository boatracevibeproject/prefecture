<?php

declare(strict_types=1);

namespace BVP\Prefecture\Enums;

/**
 * @author shimomo
 */
enum Region: int
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
     * @return ?array{
     *   number: int<1, 8>,
     *   name: non-empty-string,
     *   short_name: non-empty-string,
     *   hiragana_name: non-empty-string,
     *   katakana_name: non-empty-string,
     *   english_name: non-empty-string,
     * }
     */
    public function toArray(): ?array
    {
        $prefectures = require __DIR__ . '/../Resources/prefectures.php';

        foreach ($prefectures as $prefecture) {
            if ($prefecture['region_number'] === $this->value) {
                return [
                    'number' => $prefecture['region_number'],
                    'name' => $prefecture['region_name'],
                    'short_name' => $prefecture['region_short_name'],
                    'hiragana_name' => $prefecture['region_hiragana_name'],
                    'katakana_name' => $prefecture['region_katakana_name'],
                    'english_name' => $prefecture['region_english_name'],
                ];
            }
        }

        return null;
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
        if ($name !== null) {
            foreach (self::cases() as $case) {
                if (
                    $case->name() === $name ||
                    $case->shortName() === $name ||
                    $case->hiraganaName() === $name ||
                    $case->katakanaName() === $name ||
                    $case->englishName() === $name
                ) {
                    return $case;
                }
            }
        }

        return null;
    }
}
