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
final class SerializationTest extends TestCase
{
    /**
     * @return void
     */
    #[Test]
    public function prefectureJsonSerializeMatchesToArray(): void
    {
        $this->assertSame(
            PrefectureEnum::aomori->toArray(),
            json_decode(json_encode(PrefectureEnum::aomori, JSON_THROW_ON_ERROR), true)
        );
    }

    /**
     * @return void
     */
    #[Test]
    public function regionJsonSerializeMatchesToArray(): void
    {
        $this->assertSame(
            RegionEnum::tohoku->toArray(),
            json_decode(json_encode(RegionEnum::tohoku, JSON_THROW_ON_ERROR), true)
        );
    }

}
