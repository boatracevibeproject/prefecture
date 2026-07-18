<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\Enums\Region as RegionEnum;
use BVP\Prefecture\Region;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class RegionTest extends TestCase
{
    /**
     * @param int|string $value
     * @param ?\BVP\Prefecture\Enums\Region $expected
     * @return void
     */
    #[Test]
    #[DataProviderExternal(PrefectureDataProvider::class, 'regionFromProvider')]
    public function testRegionFrom(int|string $value, ?RegionEnum $expected): void
    {
        $this->assertSame($expected, Region::from($value));
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
        $this->assertSame($expected, Region::fromNumber($number));
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
        $this->assertSame($expected, Region::fromName($name));
    }
}
