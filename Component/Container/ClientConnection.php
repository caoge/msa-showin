<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/24
 * Time: 下午10:11
 */

namespace Showin\Component\Container;

use Showin\Contract\Packet\AbstractPacket;
use Swoole\Server;

class ClientConnection
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

    public function getContainer()
    {

    }

    public function send(AbstractPacket $packet)
    {
        $this->server->send($this->fd, $packet->getStream());
    }

    public function close()
    {

    }
}