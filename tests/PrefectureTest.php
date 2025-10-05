<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\Prefecture;
use BVP\Prefecture\PrefectureInterface;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PrefectureTest extends TestCase
{
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
        ), Prefecture::all(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNumberListProvider')]
    public function testByNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byNumberList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNameListProvider')]
    public function testByNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byShortNameListProvider')]
    public function testByShortNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byShortNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byHiraganaNameListProvider')]
    public function testByHiraganaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byHiraganaNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byKatakanaNameListProvider')]
    public function testByKatakanaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byKatakanaNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byEnglishNameListProvider')]
    public function testByEnglishNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byEnglishNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNumberListProvider')]
    public function testByRegionNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionNumberList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNameListProvider')]
    public function testByRegionNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionShortNameListProvider')]
    public function testByRegionShortNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionShortNameList(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNumberProvider')]
    public function testByNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byNumber(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNameProvider')]
    public function testByName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byShortNameProvider')]
    public function testByShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byShortName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byHiraganaNameProvider')]
    public function testByHiraganaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byHiraganaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byKatakanaNameProvider')]
    public function testByKatakanaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byKatakanaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byEnglishNameProvider')]
    public function testByEnglishName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byEnglishName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNumberProvider')]
    public function testByRegionNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionNumber(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNameProvider')]
    public function testByRegionName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionShortNameProvider')]
    public function testByRegionShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionShortName(...$arguments));
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

        Prefecture::ghost();
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

        Prefecture::byNumber();
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

        Prefecture::byNumber(12, 34);
    }

    /**
     * @return void
     */
    public function testGetInstance(): void
    {
        Prefecture::resetInstance();
        $this->assertInstanceOf(PrefectureInterface::class, Prefecture::getInstance());
    }

    /**
     * @return void
     */
    public function testCreateInstance(): void
    {
        Prefecture::resetInstance();
        $this->assertInstanceOf(PrefectureInterface::class, Prefecture::createInstance());
    }

    /**
     * @return void
     */
    public function testResetInstance(): void
    {
        Prefecture::resetInstance();
        $instance1 = Prefecture::getInstance();
        Prefecture::resetInstance();
        $instance2 = Prefecture::getInstance();
        $this->assertNotSame($instance1, $instance2);
    }
}
