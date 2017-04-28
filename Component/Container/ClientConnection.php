<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/24
 * Time: 下午10:11
 */

namespace Showin\Component\Container;

use Showin\Contract\Packet;
use Showin\Net\Connection;
use Swoole\Server;

class ClientConnection extends Connection
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

    public function connect()
    {
        // TODO: Implement connect() method.
    }

    public function send(Packet $packet)
    {
        $this->server->send($this->fd, $packet->getStream());
    }

    public function close()
    {

    }
}