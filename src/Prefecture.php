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
