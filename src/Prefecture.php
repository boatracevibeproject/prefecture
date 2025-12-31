<?php

declare(strict_types=1);

namespace BVP\Prefecture;

/**
 * @psalm-import-type Prefecture from PrefectureType
 * @psalm-method static array<int<1, 47>, Prefecture> all()
 * @psalm-method static array<int<1, 47>, Prefecture> byNumberList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byNameList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byShortNameList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byHiraganaNameList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byKatakanaNameList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byEnglishNameList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byRegionNumberList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byRegionNameList(mixed ...$arguments)
 * @psalm-method static array<int<1, 47>, Prefecture> byRegionShortNameList(mixed ...$arguments)
 * @psalm-method static Prefecture byNumber(mixed ...$arguments)
 * @psalm-method static Prefecture byName(mixed ...$arguments)
 * @psalm-method static Prefecture byShortName(mixed ...$arguments)
 * @psalm-method static Prefecture byHiraganaName(mixed ...$arguments)
 * @psalm-method static Prefecture byKatakanaName(mixed ...$arguments)
 * @psalm-method static Prefecture byEnglishName(mixed ...$arguments)
 * @psalm-method static Prefecture byRegionNumber(mixed ...$arguments)
 * @psalm-method static Prefecture byRegionName(mixed ...$arguments)
 * @psalm-method static Prefecture byRegionShortName(mixed ...$arguments)
 *
 * @method static array<int<1, 47>, Prefecture> all()
 * @method static array<int<1, 47>, Prefecture> byNumberList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byNameList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byShortNameList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byHiraganaNameList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byKatakanaNameList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byEnglishNameList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byRegionNumberList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byRegionNameList(mixed ...$arguments)
 * @method static array<int<1, 47>, Prefecture> byRegionShortNameList(mixed ...$arguments)
 * @method static Prefecture byNumber(mixed ...$arguments)
 * @method static Prefecture byName(mixed ...$arguments)
 * @method static Prefecture byShortName(mixed ...$arguments)
 * @method static Prefecture byHiraganaName(mixed ...$arguments)
 * @method static Prefecture byKatakanaName(mixed ...$arguments)
 * @method static Prefecture byEnglishName(mixed ...$arguments)
 * @method static Prefecture byRegionNumber(mixed ...$arguments)
 * @method static Prefecture byRegionName(mixed ...$arguments)
 * @method static Prefecture byRegionShortName(mixed ...$arguments)
 *
 * @author shimomo
 */
final class Prefecture implements PrefectureInterface
{
    /**
     * @psalm-var ?\BVP\Prefecture\PrefectureInterface
     *
     * @var ?\BVP\Prefecture\PrefectureInterface
     */
    private static ?PrefectureInterface $instance;

    /**
     * @psalm-param \BVP\Prefecture\PrefectureCoreInterface $prefecture
     *
     * @param \BVP\Prefecture\PrefectureCoreInterface $prefecture
     */
    public function __construct(private readonly PrefectureCoreInterface $prefecture)
    {
        //
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return array<int<1, 47>, Prefecture>|Prefecture|null
     *
     * @param string $name
     * @param array $arguments
     * @return ?array
     */
    public function __call(string $name, array $arguments): ?array
    {
        /** @psalm-var array<int<1, 47>, Prefecture>|Prefecture|null */
        return $this->prefecture->$name(...$arguments);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return array<int<1, 47>, Prefecture>|Prefecture|null
     *
     * @param string $name
     * @param array $arguments
     * @return ?array
     */
    public static function __callStatic(string $name, array $arguments): ?array
    {
        /** @psalm-var array<int<1, 47>, Prefecture>|Prefecture|null */
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @psalm-param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @psalm-return \BVP\Prefecture\PrefectureInterface
     *
     * @param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    #[\Override]
    public static function getInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface
    {
        return self::$instance ??= new self($prefectureCore ?? new PrefectureCore());
    }

    /**
     * @psalm-param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @psalm-return \BVP\Prefecture\PrefectureInterface
     *
     * @param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    #[\Override]
    public static function createInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface
    {
        return self::$instance = new self($prefectureCore ?? new PrefectureCore());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    #[\Override]
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
