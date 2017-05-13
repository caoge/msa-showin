<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/5/5
 * Time: 下午11:41
 */

namespace Showin\Standard;

/**
 *
 *
 * Class Util
 * @package Showin\Standard
 */
class Util
{
    /**
     * @param string $ip
     * @param int $port
     *
     * @return int
     */
    public static function addressToId(string $ip, int $port): int
    {
        return $ip << 32 | $port;
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public static function idToAddress(int $id): array
    {
        return [$id >> 32, $id & 0xFFFFFFFF];
    }
}