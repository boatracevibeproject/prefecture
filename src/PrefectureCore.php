<?php

declare(strict_types=1);

namespace BVP\Prefecture;

use Shimomo\Helper\Arr;

/**
 * @psalm-import-type Prefecture from PrefectureType
 * @psalm-method array<int<1, 47>, Prefecture> all()
 * @psalm-method array<int<1, 47>, Prefecture> byNumberList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byNameList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byShortNameList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byHiraganaNameList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byKatakanaNameList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byEnglishNameList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byRegionNumberList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byRegionNameList(mixed ...$arguments)
 * @psalm-method array<int<1, 47>, Prefecture> byRegionShortNameList(mixed ...$arguments)
 * @psalm-method Prefecture byNumber(mixed ...$arguments)
 * @psalm-method Prefecture byName(mixed ...$arguments)
 * @psalm-method Prefecture byShortName(mixed ...$arguments)
 * @psalm-method Prefecture byHiraganaName(mixed ...$arguments)
 * @psalm-method Prefecture byKatakanaName(mixed ...$arguments)
 * @psalm-method Prefecture byEnglishName(mixed ...$arguments)
 * @psalm-method Prefecture byRegionNumber(mixed ...$arguments)
 * @psalm-method Prefecture byRegionName(mixed ...$arguments)
 * @psalm-method Prefecture byRegionShortName(mixed ...$arguments)
 *
 * @author shimomo
 */
final class PrefectureCore implements PrefectureCoreInterface
{
    /**
     * @psalm-var list<Prefecture>
     *
     * @var array
     */
    private array $prefectures;

    /**
     * @psalm-var array<non-empty-string, 'all'|'byList'|'by'>
     *
     * @var array
     */
    private array $resolveMethodMap = [
        '/^(all)$/u' => 'all',
        '/^by(.+)List$/u' => 'byList',
        '/^by(.+)$/u' => 'by',
    ];

    public function __construct()
    {
        /** @psalm-var list<Prefecture> */
        $this->prefectures = require __DIR__ . '/../config/prefectures.php';
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return array<int<1, 47>, Prefecture>|Prefecture|null
     *
     * @param string $name
     * @param array $arguments
     * @return array|null
     */
    public function __call(string $name, array $arguments): ?array
    {
        return $this->resolveMethod($name, $arguments);
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return array<int<1, 47>, Prefecture>|Prefecture|null
     *
     * @param string $name
     * @param array $arguments
     * @return array|null
     * @throws \BadMethodCallException
     */
    private function resolveMethod(string $name, array $arguments): ?array
    {
        foreach ($this->resolveMethodMap as $pattern => $method) {
            if (preg_match($pattern, $name, $matches)) {
                if (is_callable([$this, $method])) {
                    if ($method === 'all') {
                        /** @psalm-var array<int<1, 47>, Prefecture> */
                        return $this->$method();
                    }

                    /** @psalm-var array<int<1, 47>, Prefecture>|Prefecture|null */
                    return $this->$method($matches[1], $arguments);
                }
            }
        }

        throw new \BadMethodCallException(
            __METHOD__ . "() - Call to undefined method '" . self::class . "::{$name}()'."
        );
    }

    /**
     * @psalm-return array<int<1, 47>, Prefecture>
     *
     * @return array
     */
    private function all(): array
    {
        return $this->convertToKeyedArray($this->prefectures, 'number');
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return array<int<1, 47>, Prefecture>|null
     *
     * @param string $name
     * @param array $arguments
     * @return array|null
     * @throws \InvalidArgumentException
     */
    private function byList(string $name, array $arguments): ?array
    {
        if (($countArguments = count($arguments)) === 0) {
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Too few arguments to function " . self::class . "::by{$name}(), " .
                "$countArguments passed and exactly 1 expected."
            );
        }

        $snakeCaseName = $this->convertToSnakeCase($name);
        $flattenArguments = Arr::flatten($arguments);
        foreach ($flattenArguments as $flattenArgument) {
            if (!is_string($flattenArgument) && !is_int($flattenArgument)) {
                throw new \InvalidArgumentException(
                    __METHOD__ . "() - Argument passed to function " . self::class .
                    "::by{$name}() must be of type string or int, " . gettype($flattenArgument) . " given."
                );
            }
        }

        /** @psalm-var array<int<1, 47>, Prefecture> */
        $exactMatchedPrefectures = Arr::whereIn($this->prefectures, $snakeCaseName, $flattenArguments);
        if (!empty($exactMatchedPrefectures)) {
            return $this->convertToKeyedArray($exactMatchedPrefectures, 'number');
        }

        /** @psalm-var array<int<1, 47>, Prefecture> */
        $partialMatchedPrefectures = array_filter(
            $this->prefectures,
            function (array $prefecture) use ($snakeCaseName, $flattenArguments) {
                return !empty(array_filter(
                    $flattenArguments,
                    function (int|string $argument) use ($snakeCaseName, $prefecture) {
                        return str_contains((string) $prefecture[$snakeCaseName], (string) $argument);
                    }
                ));
            }
        );
        if (!empty($partialMatchedPrefectures)) {
            return $this->convertToKeyedArray($partialMatchedPrefectures, 'number');
        }

        return null;
    }

    /**
     * @psalm-param non-empty-string $name
     * @psalm-param list<mixed> $arguments
     * @psalm-return Prefecture|null
     *
     * @param string $name
     * @param array $arguments
     * @return array|null
     * @throws \InvalidArgumentException
     */
    private function by(string $name, array $arguments): ?array
    {
        if (($countArguments = count($arguments)) !== 1) {
            $messageType = $countArguments === 0 ? 'few' : 'many';
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Too {$messageType} arguments to function " . self::class . "::by{$name}(), " .
                "{$countArguments} passed and exactly 1 expected."
            );
        }

        $snakeCaseName = $this->convertToSnakeCase($name);
        $flattenArguments = Arr::flatten($arguments);
        if (!is_string($flattenArguments[0]) && !is_int($flattenArguments[0])) {
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Argument passed to function " . self::class .
                "::by{$name}() must be of type string or int, " . gettype($flattenArguments[0]) . " given."
            );
        }

        $exactMatchedPrefecture = Arr::firstWhere($this->prefectures, $snakeCaseName, (string) $flattenArguments[0]);
        if (!is_null($exactMatchedPrefecture)) {
            /** @psalm-var Prefecture */
            return $exactMatchedPrefecture;
        }

        $partialMatchedPrefectures = array_filter(
            $this->prefectures,
            function (array $prefecture) use ($snakeCaseName, $flattenArguments) {
                return $snakeCaseName !== '' && str_contains(
                    (string) $prefecture[$snakeCaseName],
                    (string) $flattenArguments[0]
                );
            }
        );

        $partialMatchedPrefecture = reset($partialMatchedPrefectures);
        return $partialMatchedPrefecture === false ? null : $partialMatchedPrefecture;
    }

    /**
     * @psalm-param list<Prefecture>|array<int<1, 47>, Prefecture> $array
     * @psalm-param non-empty-string $key
     * @psalm-return array<int<1, 47>, Prefecture>
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    private function convertToKeyedArray(array $array, string $key): array
    {
        /** @psalm-var array<array-key, int<1, 47>|non-empty-string> */
        $keys = array_column($array, $key);

        /** @psalm-var array<int<1, 47>, Prefecture> */
        return array_combine($keys, $array);
    }

    /**
     * @psalm-param string $value
     * @psalm-return string
     *
     * @param string $value
     * @return string
     */
    private function convertToSnakeCase(string $value): string
    {
        return ltrim(strtolower((string) preg_replace('/[A-Z]/', '_$0', $value)), '_');
    }
}
