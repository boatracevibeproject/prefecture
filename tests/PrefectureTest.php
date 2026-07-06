<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\Enums\Prefecture as PrefectureEnum;
use BVP\Prefecture\Enums\Region as RegionEnum;
use BVP\Prefecture\Prefecture;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PrefectureTest extends TestCase
{
    /**
     * @param int|string $value
     * @param ?\BVP\Prefecture\Enums\Prefecture $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'prefectureFromProvider')]
    public function testPrefectureFrom(int|string $value, ?PrefectureEnum $expected): void
    {
        $this->assertSame($expected, Prefecture::from($value));
    }

    /**
     * @param int $number
     * @param ?\BVP\Prefecture\Enums\Prefecture $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'prefectureFromNumberProvider')]
    public function testPrefectureFromNumber(int $number, ?PrefectureEnum $expected): void
    {
        $this->assertSame($expected, Prefecture::fromNumber($number));
    }

    /**
     * @param string $name
     * @param ?\BVP\Prefecture\Enums\Prefecture $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'prefectureFromNameProvider')]
    public function testPrefectureFromName(string $name, ?PrefectureEnum $expected): void
    {
        $this->assertSame($expected, Prefecture::fromName($name));
    }

    /**
     * @param string $name
     * @param \BVP\Prefecture\Enums\Region $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'prefectureRegionProvider')]
    public function testPrefectureRegion(string $name, RegionEnum $expected): void
    {
        $this->assertSame($expected, Prefecture::from($name)->region());
    }

    /**
     * @param int|string $value
     * @param ?\BVP\Prefecture\Enums\Region $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'regionFromProvider')]
    public function testRegionFrom(int|string $value, ?RegionEnum $expected): void
    {
        $this->assertSame($expected, Prefecture::fromRegion($value));
    }

    /**
     * @param int $number
     * @param ?\BVP\Prefecture\Enums\Region $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'regionFromNumberProvider')]
    public function testRegionFromNumber(int $number, ?RegionEnum $expected): void
    {
        $this->assertSame($expected, Prefecture::fromRegionNumber($number));
    }

    /**
     * @param string $name
     * @param ?\BVP\Prefecture\Enums\Region $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'regionFromNameProvider')]
    public function testRegionFromName(string $name, ?RegionEnum $expected): void
    {
        $this->assertSame($expected, Prefecture::fromRegionName($name));
    }
}
