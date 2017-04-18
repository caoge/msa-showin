<?php

namespace Showin\Component\Container;

use Swoole\Server;

/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午9:54
 */
class ContainerServer
{
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

    public function onConnect()
    {
        echo 1 . PHP_EOL;
    }

    public function onReceive($server, $fd, $fromId, $data)
    {

    }

    public function onClose()
    {

    }

    public function onWorkerStart()
    {

    }

    public function start()
    {
        $this->server->start();
    }
}