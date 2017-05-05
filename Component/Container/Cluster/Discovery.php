<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/5/1
 * Time: 上午12:59
 */

namespace Showin\Component\Container\Cluster;


use Showin\Component\Container\Connection\Container;
use Showin\Component\Container\ContainerServer;
use Showin\Config\Registry;
use Swoole\Http\Client;

/**
 * 集群容器发现
 *
 * Class Discovery
 * @package Showin\Component\Container\Cluster
 */
class Discovery
{
    protected $server = null;

    protected $serverId = 0;

    protected $connections = [];

    public function __construct(ContainerServer $server)
    {
        $this->server = $server;
    }

    public function tick(int $port = 0)
    {
        $port = $this->server->port;
        // 定时器发送心跳包给注册中心
        swoole_timer_tick(3000, function () use ($port) {
            $client = new Client('127.0.0.1', 9500);
            $client->setHeaders([
                'port' => $port
            ]);
            $client->get(Registry::API_KEEPLIVE, [$this, 'onKeeplive']);
        });

        // 定时器获取在线容器列表
        swoole_timer_tick(5000, function () {
            $client = new Client('127.0.0.1', 9500);
            $client->get(Registry::API_GET_CONTAINER, [$this, 'onGetContainerList']);
        });
    }

    public function start()
    {
        new Container();
        $this->setServerId();
        $this->tick();
    }

    public function setServerId()
    {
        $client = new Client('127.0.0.1', 9500);
        $client->get(Registry::API_GET_IP, function ($client) {
            $ret = json_decode($client->body, true);
            $this->serverId = $this->generateServerId($ret['data']['ip'], $ret['data']['port']);
        });
    }

    public function onKeeplive()
    {

    }

    public function onGetContainerList($client)
    {
        $ret = json_decode($client->body, true);

        echo $client->body . PHP_EOL;
        echo $this->serverId . PHP_EOL;
    }

    public function generateServerId(string $ip, int $port)
    {
        return sprintf('%5d', crc32(sprintf('%s%d', $ip, $port)));
    }
}