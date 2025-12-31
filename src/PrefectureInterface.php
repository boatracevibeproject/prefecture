<?php

declare(strict_types=1);

namespace BVP\Prefecture;

/**
 * @author shimomo
 */
interface PrefectureInterface
{
    /**
     * @psalm-param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @psalm-return \BVP\Prefecture\PrefectureInterface
     *
     * @param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    public static function getInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface;

    /**
     * @psalm-param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @psalm-return \BVP\Prefecture\PrefectureInterface
     *
     * @param ?\BVP\Prefecture\PrefectureCoreInterface $prefectureCore
     * @return \BVP\Prefecture\PrefectureInterface
     */
    public static function createInstance(?PrefectureCoreInterface $prefectureCore = null): PrefectureInterface;

    /**
     * @psalm-return void
     *
     * @return void
     */
    public static function resetInstance(): void;
}
