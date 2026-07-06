<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\Enums\Prefecture as PrefectureEnum;
use BVP\Prefecture\Enums\Region as RegionEnum;

/**
 * @author shimomo
 */
final class PrefectureDataProvider
{
    /**
     * @return non-empty-list<array{
     *   number: int|string,
     *   expected: ?\BVP\Prefecture\Enums\Prefecture,
     * }>
     */
    public static function prefectureFromProvider(): array
    {
        return [
            ['value' => 0, 'expected' => null],
            ['value' => 1, 'expected' => PrefectureEnum::hokkaido],
            ['value' => 2, 'expected' => PrefectureEnum::aomori],
            ['value' => '', 'expected' => null],
            ['value' => '青森県', 'expected' => PrefectureEnum::aomori],
            ['value' => '青森', 'expected' => PrefectureEnum::aomori],
            ['value' => 'あおもりけん', 'expected' => PrefectureEnum::aomori],
            ['value' => 'アオモリケン', 'expected' => PrefectureEnum::aomori],
            ['value' => 'aomori', 'expected' => PrefectureEnum::aomori],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   number: int,
     *   expected: ?\BVP\Prefecture\Enums\Prefecture,
     * }>
     */
    public static function prefectureFromNumberProvider(): array
    {
        return [
            ['number' => 0, 'expected' => null],
            ['number' => 1, 'expected' => PrefectureEnum::hokkaido],
            ['number' => 2, 'expected' => PrefectureEnum::aomori],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   name: string,
     *   expected: ?\BVP\Prefecture\Enums\Prefecture,
     * }>
     */
    public static function prefectureFromNameProvider(): array
    {
        return [
            ['name' => '', 'expected' => null],
            ['name' => '青森県', 'expected' => PrefectureEnum::aomori],
            ['name' => '青森', 'expected' => PrefectureEnum::aomori],
            ['name' => 'あおもりけん', 'expected' => PrefectureEnum::aomori],
            ['name' => 'アオモリケン', 'expected' => PrefectureEnum::aomori],
            ['name' => 'aomori', 'expected' => PrefectureEnum::aomori],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   name: string,
     *   expected: \BVP\Prefecture\Enums\Prefecture,
     * }>
     */
    public static function prefectureRegionProvider(): array
    {
        return [
            ['name' => 'aomori', 'expected' => RegionEnum::tohoku],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   number: int|string,
     *   expected: ?\BVP\Prefecture\Enums\Region,
     * }>
     */
    public static function regionFromProvider(): array
    {
        return [
            ['value' => 0, 'expected' => null],
            ['value' => 1, 'expected' => RegionEnum::hokkaido],
            ['value' => 2, 'expected' => RegionEnum::tohoku],
            ['value' => '', 'expected' => null],
            ['value' => '東北地方', 'expected' => RegionEnum::tohoku],
            ['value' => '東北', 'expected' => RegionEnum::tohoku],
            ['value' => 'とうほくちほう', 'expected' => RegionEnum::tohoku],
            ['value' => 'トウホクチホウ', 'expected' => RegionEnum::tohoku],
            ['value' => 'tohoku', 'expected' => RegionEnum::tohoku],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   number: int,
     *   expected: ?\BVP\Prefecture\Enums\Region,
     * }>
     */
    public static function regionFromNumberProvider(): array
    {
        return [
            ['number' => 0, 'expected' => null],
            ['number' => 1, 'expected' => RegionEnum::hokkaido],
            ['number' => 2, 'expected' => RegionEnum::tohoku],
        ];
    }

    /**
     * @return non-empty-list<array{
     *   name: string,
     *   expected: ?\BVP\Prefecture\Enums\Region,
     * }>
     */
    public static function regionFromNameProvider(): array
    {
        return [
            ['name' => '', 'expected' => null],
            ['name' => '東北地方', 'expected' => RegionEnum::tohoku],
            ['name' => '東北', 'expected' => RegionEnum::tohoku],
            ['name' => 'とうほくちほう', 'expected' => RegionEnum::tohoku],
            ['name' => 'トウホクチホウ', 'expected' => RegionEnum::tohoku],
            ['name' => 'tohoku', 'expected' => RegionEnum::tohoku],
        ];
    }
}
