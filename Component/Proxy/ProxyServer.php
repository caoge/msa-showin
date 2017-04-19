<?php

namespace Showin\Component\Proxy;

/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午10:51
 */
class ProxyServer
{
    public function __construct($host, $port)
    {
        $this->server = new Server($host, $port, SWOOLE_BASE, SWOOLE_SOCK_TCP);
        $this->server->set([
            'open_length_check'     => true,
            'package_length_type'   => 'n',
            'package_length_offset' => 0,
            'package_body_offset'   => 2,
            'package_max_length'    => 1024 * 10
        ]);
        $this->server->on('connect', [$this, 'onConnect']);
        $this->server->on('receive', [$this, 'onReceive']);
        $this->server->on('close', [$this, 'onClose']);
        $this->server->on('WorkerStart', [$this, 'onWorkerStart']);
    }

    public function onConnect()
    {

    }

    public function onReceive()
    {

    }

    public function onClose()
    {

    }

    public function onWorkerStart()
    {
        // 连接容器
    }

    public function start()
    {

    }
}