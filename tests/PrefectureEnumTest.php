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
final class PrefectureEnumTest extends TestCase
{
    /**
     * @return void
     */
    #[Test]
    public function toArrayReturnsExpectedShape(): void
    {
        $this->assertSame([
            'number' => 2,
            'name' => '青森県',
            'short_name' => '青森',
            'hiragana_name' => 'あおもりけん',
            'katakana_name' => 'アオモリケン',
            'english_name' => 'aomori',
            'region_number' => 2,
            'region_name' => '東北地方',
            'region_short_name' => '東北',
            'region_hiragana_name' => 'とうほくちほう',
            'region_katakana_name' => 'トウホクチホウ',
            'region_english_name' => 'tohoku',
        ], PrefectureEnum::aomori->toArray());
    }

    /**
     * @return void
     */
    #[Test]
    public function nameReturnsFullName(): void
    {
        $this->assertSame('青森県', PrefectureEnum::aomori->name());
    }

    /**
     * @return void
     */
    #[Test]
    public function shortNameReturnsShortName(): void
    {
        $this->assertSame('青森', PrefectureEnum::aomori->shortName());
    }

    /**
     * @return void
     */
    #[Test]
    public function hiraganaNameReturnsHiraganaName(): void
    {
        $this->assertSame('あおもりけん', PrefectureEnum::aomori->hiraganaName());
    }

    /**
     * @return void
     */
    #[Test]
    public function katakanaNameReturnsKatakanaName(): void
    {
        $this->assertSame('アオモリケン', PrefectureEnum::aomori->katakanaName());
    }

    /**
     * @return void
     */
    #[Test]
    public function englishNameReturnsEnglishName(): void
    {
        $this->assertSame('aomori', PrefectureEnum::aomori->englishName());
    }

    /**
     * @return void
     */
    #[Test]
    public function regionReturnsOwningRegion(): void
    {
        $this->assertSame(RegionEnum::tohoku, PrefectureEnum::aomori->region());
    }
}
