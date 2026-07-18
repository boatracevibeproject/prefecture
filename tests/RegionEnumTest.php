<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\Enums\Prefecture as PrefectureEnum;
use BVP\Prefecture\Enums\Region as RegionEnum;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class RegionEnumTest extends TestCase
{
    /**
     * @return void
     */
    #[Test]
    public function toArrayReturnsExpectedShape(): void
    {
        $this->assertSame([
            'number' => 2,
            'name' => '東北地方',
            'short_name' => '東北',
            'hiragana_name' => 'とうほくちほう',
            'katakana_name' => 'トウホクチホウ',
            'english_name' => 'tohoku',
        ], RegionEnum::tohoku->toArray());
    }

    /**
     * @return void
     */
    #[Test]
    public function nameReturnsFullName(): void
    {
        $this->assertSame('東北地方', RegionEnum::tohoku->name());
    }

    /**
     * @return void
     */
    #[Test]
    public function shortNameReturnsShortName(): void
    {
        $this->assertSame('東北', RegionEnum::tohoku->shortName());
    }

    /**
     * @return void
     */
    #[Test]
    public function hiraganaNameReturnsHiraganaName(): void
    {
        $this->assertSame('とうほくちほう', RegionEnum::tohoku->hiraganaName());
    }

    /**
     * @return void
     */
    #[Test]
    public function katakanaNameReturnsKatakanaName(): void
    {
        $this->assertSame('トウホクチホウ', RegionEnum::tohoku->katakanaName());
    }

    /**
     * @return void
     */
    #[Test]
    public function englishNameReturnsEnglishName(): void
    {
        $this->assertSame('tohoku', RegionEnum::tohoku->englishName());
    }

    /**
     * @return void
     */
    #[Test]
    public function prefecturesReturnsAllPrefecturesInRegion(): void
    {
        $this->assertSame([
            PrefectureEnum::aomori,
            PrefectureEnum::iwate,
            PrefectureEnum::miyagi,
            PrefectureEnum::akita,
            PrefectureEnum::yamagata,
            PrefectureEnum::fukushima,
        ], RegionEnum::tohoku->prefectures());
    }
}
