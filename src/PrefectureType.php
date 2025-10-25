<?php

declare(strict_types=1);

namespace BVP\Prefecture;

/**
 * @psalm-type Prefecture = array{
 *     number: int<1, 47>,
 *     name: non-empty-string,
 *     short_name: non-empty-string,
 *     hiragana_name: non-empty-string,
 *     katakana_name: non-empty-string,
 *     english_name: non-empty-string,
 *     region_number: int<1, 8>,
 *     region_name: non-empty-string,
 *     region_short_name: non-empty-string,
 * }
 *
 * @author shimomo
 */
final class PrefectureType
{
    //
}
