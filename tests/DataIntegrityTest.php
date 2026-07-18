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
final class DataIntegrityTest extends TestCase
{
    /**
     * @return void
     */
    #[Test]
    public function prefectureResourceRowCountMatchesEnumCases(): void
    {
        $prefectures = require __DIR__ . '/../src/Resources/prefectures.php';

        $this->assertCount(count(PrefectureEnum::cases()), $prefectures);
    }

    /**
     * @return void
     */
    #[Test]
    public function regionResourceRowCountMatchesEnumCases(): void
    {
        $regions = require __DIR__ . '/../src/Resources/regions.php';

        $this->assertCount(count(RegionEnum::cases()), $regions);
    }

    /**
     * @return void
     */
    #[Test]
    public function everyPrefectureCaseHasAResourceRow(): void
    {
        foreach (PrefectureEnum::cases() as $case) {
            $this->assertNotNull($case->toArray(), "Missing resource row for prefecture: {$case->name}");
        }
    }

    /**
     * @return void
     */
    #[Test]
    public function everyRegionCaseHasAResourceRow(): void
    {
        foreach (RegionEnum::cases() as $case) {
            $this->assertNotNull($case->toArray(), "Missing resource row for region: {$case->name}");
        }
    }

    /**
     * @return void
     */
    #[Test]
    public function everyPrefectureResolvesToAnExistingRegion(): void
    {
        foreach (PrefectureEnum::cases() as $case) {
            $this->assertNotNull($case->region(), "Prefecture {$case->name} does not resolve to a region");
        }
    }

    /**
     * @return void
     */
    #[Test]
    public function everyRegionHasAtLeastOnePrefecture(): void
    {
        foreach (RegionEnum::cases() as $case) {
            $this->assertNotEmpty($case->prefectures(), "Region {$case->name} has no prefectures");
        }
    }

    /**
     * @return void
     */
    #[Test]
    public function prefectureNameVariantsAreUnique(): void
    {
        $seen = [];

        foreach (PrefectureEnum::cases() as $case) {
            foreach ([
                $case->name(),
                $case->shortName(),
                $case->hiraganaName(),
                $case->katakanaName(),
                $case->englishName(),
            ] as $variant) {
                $seenName = $seen[$variant]->name ?? '';

                $this->assertTrue(
                    !isset($seen[$variant]) || $seen[$variant] === $case,
                    "Name variant '{$variant}' is shared between prefectures {$seenName} and {$case->name}"
                );

                $seen[$variant] = $case;
            }
        }
    }

    /**
     * @return void
     */
    #[Test]
    public function regionNameVariantsAreUnique(): void
    {
        $seen = [];

        foreach (RegionEnum::cases() as $case) {
            foreach ([
                $case->name(),
                $case->shortName(),
                $case->hiraganaName(),
                $case->katakanaName(),
                $case->englishName(),
            ] as $variant) {
                $seenName = $seen[$variant]->name ?? '';

                $this->assertTrue(
                    !isset($seen[$variant]) || $seen[$variant] === $case,
                    "Name variant '{$variant}' is shared between regions {$seenName} and {$case->name}"
                );

                $seen[$variant] = $case;
            }
        }
    }
}
