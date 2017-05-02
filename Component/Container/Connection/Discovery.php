<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/5/1
 * Time: 上午12:59
 */

namespace Showin\Component\Container\Connection;


use Swoole\Http\Client;

class Discovery
{
    protected $connections = [];

    public function tick(int $port = 0)
    {
        // 定时器发送心跳包给注册中心
        swoole_timer_tick(3000, function () use ($port) {
            $client = new Client('127.0.0.1', 9500);

            $client->setHeaders([
                'port' => $port
            ]);
            $client->get('/api/keeplive', [$this, 'onKeeplive']);
        });

        // 定时器获取在线容器列表
        swoole_timer_tick(5000, function () {
            $client = new Client('127.0.0.1', 9500);
            $client->get('/api/container/list', [$this, 'onGetContainerList']);
        });
    }

    public function onKeeplive()
    {

    }

    public function onGetContainerList($client)
    {
        echo "Length: " . strlen($client->body) . PHP_EOL;
        echo $client->body . PHP_EOL;
    }
}