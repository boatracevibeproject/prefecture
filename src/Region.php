<?php

declare(strict_types=1);

namespace BVP\Prefecture;

use BVP\Prefecture\Enums\Region as RegionEnum;

/**
 * @author shimomo
 */
final class Region
{
    /**
     * Number lookup takes priority over name lookup: the value is first tried
     * as a region number via {@see self::fromNumber()}, and only falls back
     * to {@see self::fromName()} when no matching number is found. For
     * example, `from('3')` resolves to region number 3 (Kanto), not a region
     * literally named "3".
     *
     * @param int|string $value
     * @return ?\BVP\Prefecture\Enums\Region
     */
    public static function from(int|string $value): ?RegionEnum
    {
        return self::fromNumber((int) $value) ?? self::fromName((string) $value);
    }

    /**
     * @param int $number
     * @return ?\BVP\Prefecture\Enums\Region
     */
    public static function fromNumber(int $number): ?RegionEnum
    {
        return RegionEnum::tryFrom($number);
    }

    /**
     * @param string $name
     * @return ?\BVP\Prefecture\Enums\Region
     */
    public static function fromName(string $name): ?RegionEnum
    {
        return RegionEnum::fromName($name);
    }
}
