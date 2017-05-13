<?php

namespace Showin\Component\Container;

use Showin\Component\Container\Cluster\Discovery;
use Showin\Contract\Packet\Tcp as TcpPacket;
use Swoole\Server;

/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午9:54
 */
class ContainerServer
{
    protected $connections = [];

    protected $discovery = null;

    protected $client = null;

    public $port = 0;

    public function __construct(string $host = '', int $port = 0)
    {
        $this->port = $port;
        $this->server = new Server($host, 0, SWOOLE_BASE);
        $this->server->set([
            'open_length_check'     => true,
            'package_length_type'   => 'n',
            'package_length_offset' => 0,
            'package_body_offset'   => 2,
            'package_max_length'    => 1024 * 10
        ]);
        $this->server->listen('0.0.0.0', $this->port, SWOOLE_SOCK_TCP);

        $this->server->on('connect', [$this, 'onConnect']);
        $this->server->on('receive', [$this, 'onReceive']);
        $this->server->on('close', [$this, 'onClose']);
        $this->server->on('WorkerStart', [$this, 'onWorkerStart']);
    }

    public function onConnect(Server $server, $fd, $fromId)
    {
//        $connection = new ClientConnection($server, $fd);
        $fdInfo = $server->connection_info($fd);
        var_dump($fdInfo, $fromId);
//        $this->connections[$fd] = $connection;

    }

    public function onReceive(Server $server, $fd, $fromId, $data)
    {
        var_dump($server, $fd, $fromId);
        $tcpPacket = new TcpPacket();
        $tcpPacket->unpack($data);
    }

    public function onClose()
    {

    }

    public function onWorkerStart()
    {
        $this->discovery = new Discovery($this);
        $this->discovery->start();

    }

    public function start()
    {
        $this->server->start();
    }
}