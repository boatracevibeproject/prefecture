<?php

declare(strict_types=1);

namespace BVP\Prefecture;

use BVP\Prefecture\Enums\Prefecture as PrefectureEnum;
use BVP\Prefecture\Enums\Region as RegionEnum;

/**
 * @author shimomo
 */
final class Prefecture
{
    /**
     * Number lookup takes priority over name lookup: the value is first tried
     * as a prefecture number via {@see self::fromNumber()}, and only falls
     * back to {@see self::fromName()} when no matching number is found. For
     * example, `from('13')` resolves to prefecture number 13 (Tokyo), not a
     * prefecture literally named "13".
     *
     * @param int|string $value
     * @return ?\BVP\Prefecture\Enums\Prefecture
     */
    public static function from(int|string $value): ?PrefectureEnum
    {
        return self::fromNumber((int) $value) ?? self::fromName((string) $value);
    }

    /**
     * @param int $number
     * @return ?\BVP\Prefecture\Enums\Prefecture
     */
    public static function fromNumber(int $number): ?PrefectureEnum
    {
        return PrefectureEnum::tryFrom($number);
    }

    /**
     * @param string $name
     * @return ?\BVP\Prefecture\Enums\Prefecture
     */
    public static function fromName(string $name): ?PrefectureEnum
    {
        return PrefectureEnum::fromName($name);
    }

    /**
     * Number lookup takes priority over name lookup: the value is first tried
     * as a region number via {@see self::fromRegionNumber()}, and only falls
     * back to {@see self::fromRegionName()} when no matching number is found.
     * For example, `fromRegion('3')` resolves to region number 3 (Kanto), not
     * a region literally named "3".
     *
     * @param int|string $value
     * @return ?\BVP\Prefecture\Enums\Region
     */
    public static function fromRegion(int|string $value): ?RegionEnum
    {
        return self::fromRegionNumber((int) $value) ?? self::fromRegionName((string) $value);
    }

    /**
     * @param int $number
     * @return ?\BVP\Prefecture\Enums\Region
     */
    public static function fromRegionNumber(int $number): ?RegionEnum
    {
        return RegionEnum::tryFrom($number);
    }

    /**
     * @param string $name
     * @return ?\BVP\Prefecture\Enums\Region
     */
    public static function fromRegionName(string $name): ?RegionEnum
    {
        return RegionEnum::fromName($name);
    }
}
