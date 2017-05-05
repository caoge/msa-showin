<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/5/5
 * Time: 下午11:41
 */

namespace Showin\Standard;


class Util
{
    public static function addressToId(string $ip, int $port): int
    {
        return $ip << 32 | $port;
    }

    public static function idToAddress(int $id): array
    {
        return [$id >> 32, $id & 0xFFFFFFFF];
    }
}