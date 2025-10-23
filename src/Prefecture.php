<?php

declare(strict_types=1);

namespace BVP\Prefecture;

use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class Prefecture implements PrefectureInterface
{
    /**
     * @var \BVP\Prefecture\PrefectureInterface|null
     */
    private static ?PrefectureInterface $instance;

    /**
     * @param  \BVP\Prefecture\PrefectureCoreInterface  $prefecture
     * @return void
     */
    public function __construct(private readonly PrefectureCoreInterface $prefecture)
    {
        //
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return array|null
     */
    public function __call(string $name, array $arguments): ?array
    {
        return $this->prefecture->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return array|null
     */
    public static function __callStatic(string $name, array $arguments): ?array
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @param  \BVP\Prefecture\PrefectureCoreInterface|null  $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    public static function getInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface
    {
        return self::$instance ??= new self($prefectureCore ?? new PrefectureCore());
    }

    /**
     * @param  \BVP\Prefecture\PrefectureCoreInterface|null  $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    public static function createInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface
    {
        return self::$instance = new self($prefectureCore ?? new PrefectureCore());
    }

    /**
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
