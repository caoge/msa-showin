<?php

namespace Showin\Component\Container;

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
    public function __construct($host = '', $port = '')
    {
        $this->server = new Server($host, 0, SWOOLE_BASE);
        $this->server->set([
            'open_length_check'     => true,
            'package_length_type'   => 'n',
            'package_length_offset' => 0,
            'package_body_offset'   => 2,
            'package_max_length'    => 1024 * 10
        ]);
        $this->server->listen('0.0.0.0', $port, SWOOLE_SOCK_TCP);

        $this->server->on('connect', [$this, 'onConnect']);
        $this->server->on('receive', [$this, 'onReceive']);
        $this->server->on('close', [$this, 'onClose']);
        $this->server->on('WorkerStart', [$this, 'onWorkerStart']);
    }

    public function onConnect($server, $fd, $fromId)
    {
        $connection = new ClientConnection($server, $fd);
        $fdInfo = $server->connection_info($fd);
        var_dump($fdInfo);
        $this->connections[$fd] = $connection;
        echo 1 . PHP_EOL;
    }

    public function onReceive(Server $server, $fd, $fromId, $data)
    {
        $tcpPacket = new TcpPacket();
        $tcpPacket->unpack($data);
    }

    public function onClose()
    {

    }

    public function onWorkerStart()
    {
        // 定时器发送心跳包给注册中心

        // 定时器获取在线容器列表
    }

    public function start()
    {
        $this->server->start();
    }
}