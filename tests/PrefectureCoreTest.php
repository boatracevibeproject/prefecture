<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\PrefectureCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PrefectureCoreTest extends TestCase
{
    /**
     * @var \BVP\Prefecture\PrefectureCore
     */
    protected PrefectureCore $prefecture;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->prefecture = new PrefectureCore();
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'allProvider')]
    public function testAll(array $arguments, array $expected): void
    {
        $this->assertSame(array_combine(
            array_map(fn($key) => $key + 1, array_keys($expected)),
            array_values($expected)
        ), $this->prefecture->all(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNumberListProvider')]
    public function testByNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byNumberList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNameListProvider')]
    public function testByNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byShortNameListProvider')]
    public function testByShortNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byShortNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byHiraganaNameListProvider')]
    public function testByHiraganaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byHiraganaNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byKatakanaNameListProvider')]
    public function testByKatakanaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byKatakanaNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byEnglishNameListProvider')]
    public function testByEnglishNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byEnglishNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNumberListProvider')]
    public function testByRegionNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byRegionNumberList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNameListProvider')]
    public function testByRegionNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byRegionNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNumberProvider')]
    public function testByNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byNumber(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNameProvider')]
    public function testByName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byShortNameProvider')]
    public function testByShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byShortName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byHiraganaNameProvider')]
    public function testByHiraganaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byHiraganaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byKatakanaNameProvider')]
    public function testByKatakanaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byKatakanaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byEnglishNameProvider')]
    public function testByEnglishName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byEnglishName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNumberProvider')]
    public function testByRegionNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byRegionNumber(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNameProvider')]
    public function testByRegionName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byRegionName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionShortNameProvider')]
    public function testByRegionShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byRegionShortName(...$arguments));
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Prefecture\PrefectureCore::resolveMethod() - " .
            "Call to undefined method 'BVP\Prefecture\PrefectureCore::ghost()'."
        );

        $this->prefecture->ghost();
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenArgumentsAreTooFew(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Prefecture\PrefectureCore::by() - " .
            "Too few arguments to function BVP\Prefecture\PrefectureCore::byNumber(), " .
            "0 passed and exactly 1 expected."
        );

        $this->prefecture->byNumber();
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenArgumentsAreTooMany(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Prefecture\PrefectureCore::by() - " .
            "Too many arguments to function BVP\Prefecture\PrefectureCore::byNumber(), " .
            "2 passed and exactly 1 expected."
        );

        $this->prefecture->byNumber(12, 34);
    }
}
