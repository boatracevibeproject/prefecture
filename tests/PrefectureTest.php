<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\Prefecture;
use BVP\Prefecture\PrefectureInterface;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-import-type Prefecture from \BVP\Prefecture\PrefectureType
 *
 * @author shimomo
 */
final class PrefectureTest extends TestCase
{
    /**
     * @psalm-param non-empty-array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'allProvider')]
    public function testAll(array $expected): void
    {
        $this->assertSame(array_combine(
            array_map(fn($key) => $key + 1, array_keys($expected)),
            array_values($expected)
        ), Prefecture::all());
    }

    /**
     * @psalm-param non-empty-list<int<1, 47>>|non-empty-list<non-empty-list<int<1, 47>>> $arguments
     * @psalm-param non-empty-array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNumberListProvider')]
    public function testByNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byNumberList(...$arguments));
    }

    /**
     * @psalm-param non-empty-list<non-empty-string>|non-empty-list<non-empty-list<non-empty-string>> $arguments
     * @psalm-param non-empty-array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNameListProvider')]
    public function testByNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byNameList(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byShortNameListProvider')]
    public function testByShortNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byShortNameList(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byHiraganaNameListProvider')]
    public function testByHiraganaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byHiraganaNameList(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byKatakanaNameListProvider')]
    public function testByKatakanaNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byKatakanaNameList(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byEnglishNameListProvider')]
    public function testByEnglishNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byEnglishNameList(...$arguments));
    }

    /**
     * @psalm-param list<int<1, 8>>|list<list<int<1, 8>>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNumberListProvider')]
    public function testByRegionNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionNumberList(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNameListProvider')]
    public function testByRegionNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionNameList(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionShortNameListProvider')]
    public function testByRegionShortNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionShortNameList(...$arguments));
    }

    /**
     * @psalm-param list<int<1, 47>>|list<list<int<1, 47>>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNumberProvider')]
    public function testByNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byNumber(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNameProvider')]
    public function testByName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byName(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byShortNameProvider')]
    public function testByShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byShortName(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byHiraganaNameProvider')]
    public function testByHiraganaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byHiraganaName(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byKatakanaNameProvider')]
    public function testByKatakanaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byKatakanaName(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byEnglishNameProvider')]
    public function testByEnglishName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byEnglishName(...$arguments));
    }

    /**
     * @psalm-param list<int<1, 8>>|list<list<int<1, 8>>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNumberProvider')]
    public function testByRegionNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionNumber(...$arguments));
    }

    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionNameProvider')]
    public function testByRegionName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionName(...$arguments));
    }
    /**
     * @psalm-param list<non-empty-string>|list<list<non-empty-string>> $arguments
     * @psalm-param Prefecture $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byRegionShortNameProvider')]
    public function testByRegionShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Prefecture::byRegionShortName(...$arguments));
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Prefecture\PrefectureCore::resolveMethod() - " .
            "Call to undefined method 'BVP\Prefecture\PrefectureCore::ghost()'."
        );

        /** @psalm-suppress UndefinedMagicMethod */
        Prefecture::ghost();
    }

    /**
     * @psalm-return void
     *
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
     * @psalm-return void
     *
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
     * @psalm-return void
     *
     * @return void
     */
    public function testGetInstance(): void
    {
        Prefecture::resetInstance();
        $this->assertInstanceOf(PrefectureInterface::class, Prefecture::getInstance());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testCreateInstance(): void
    {
        Prefecture::resetInstance();
        $this->assertInstanceOf(PrefectureInterface::class, Prefecture::createInstance());
    }

    /**
     * @psalm-return void
     *
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
