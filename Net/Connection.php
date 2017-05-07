<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/25
 * Time: 下午9:37
 */

namespace Showin\Net;


use Showin\Contract\Packet;

abstract class Connection
{
    const EVENT_CONNECT = 1;
    const EVENT_RECEIVE = 2;
    const EVENT_CLOSE = 3;
    const EVENT_ERROR = 4;

    protected $ip = '0.0.0.0';

    protected $port = 0;

    abstract public function send(Packet $packet);

    abstract public function close();

    abstract public function connect();

    /**
     * @return int
     */
//    public function getId(): int
//    {
//        return $this->id;
//    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }
}