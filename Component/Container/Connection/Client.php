<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/24
 * Time: 下午10:11
 */

namespace Showin\Component\Container\Connection;

use Showin\Contract\Packet;
use Showin\Net\Connection;
use Swoole\Server;

class Client extends Connection
{
    protected $server = null;
    protected $fd = 0;
    public function __construct(Server $server, $fd = 0)
    {
        $this->server = $server;
        $this->fd = $fd;
    }

    public function getClient()
    {

    }

    public function addContainer()
    {

    }

    public function addProxy()
    {

    }

    public function addService()
    {

    }

    public function getContainer()
    {

    }

    public function set()
    {

    }

    public function connect()
    {

    }

    public function send(Packet $packet)
    {
        $this->server->send($this->fd, $packet->getStream());
    }

    public function close()
    {

    }
}