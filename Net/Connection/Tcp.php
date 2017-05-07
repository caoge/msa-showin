<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/28
 * Time: 下午3:40
 */

namespace Showin\Net\Connection;


use Showin\Contract\Packet;
use Showin\Net\Connection;
use Showin\Standard\Util;

class Tcp extends Connection
{
    public function __construct(string $ip, int $port)
    {
        $this->ip = $ip;
        $this->port = $port;
//        $this->id = Util::addressToId($ip, $port);
    }

    public function connect()
    {
        // TODO: Implement connect() method.
    }

    public function send(Packet $packet)
    {
        // TODO: Implement send() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
    }
}