<?php

declare(strict_types=1);

namespace BVP\Prefecture\Tests;

use BVP\Prefecture\PrefectureCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-import-type Prefecture from \BVP\Prefecture\PrefectureType
 *
 * @author shimomo
 */
final class PrefectureCoreTest extends TestCase
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     * @psalm-var \BVP\Prefecture\PrefectureCore
     *
     * @var \BVP\Prefecture\PrefectureCore
     */
    protected PrefectureCore $prefecture;

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    protected function setUp(): void
    {
        $this->prefecture = new PrefectureCore();
    }

    /**
     * @psalm-param array<int<1, 47>, Prefecture> $expected
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
        ), $this->prefecture->all());
    }

    /**
     * @psalm-param list<int<1, 47>>|list<list<int<1, 47>>> $arguments
     * @psalm-param array<int<1, 47>, Prefecture> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNumberListProvider')]
    public function testByNumberList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byNumberList(...$arguments));
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
    #[DataProviderExternal(PrefectureDataProvider::class, 'byNameListProvider')]
    public function testByNameList(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->prefecture->byNameList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byShortNameList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byHiraganaNameList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byKatakanaNameList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byEnglishNameList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byRegionNumberList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byRegionNameList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byRegionShortNameList(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byNumber(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byName(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byShortName(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byHiraganaName(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byKatakanaName(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byEnglishName(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byRegionNumber(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byRegionName(...$arguments));
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
        $this->assertSame($expected, $this->prefecture->byRegionShortName(...$arguments));
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
            "Call to undefined method `BVP\Prefecture\PrefectureCore::ghost()`."
        );

        /** @psalm-suppress UndefinedMagicMethod */
        $this->prefecture->ghost();
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
            "Too few arguments to function `BVP\Prefecture\PrefectureCore::byNumber()`, " .
            "0 passed and exactly 1 expected."
        );

        $this->prefecture->byNumber();
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
            "Too many arguments to function `BVP\Prefecture\PrefectureCore::byNumber()`, " .
            "2 passed and exactly 1 expected."
        );

        $this->prefecture->byNumber(12, 34);
    }
}
