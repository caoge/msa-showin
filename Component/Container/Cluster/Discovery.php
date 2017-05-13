<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/5/1
 * Time: 上午12:59
 */

namespace Showin\Component\Container\Cluster;


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

    public function tick()
    {
        $port = $this->server->port;
        // 定时器发送心跳包给注册中心
        swoole_timer_tick(3000, function () use ($port) {
            $client = new Client('127.0.0.1', 9500);
            $client->setHeaders([
                'port' => $port
            ]);
            $client->get(Registry::API_KEEPLIVE, function () {});
        });

        // 定时器获取在线容器列表
        swoole_timer_tick(5000, function () {
            $client = new Client('127.0.0.1', 9500);
            $client->get(Registry::API_GET_CONTAINER, [$this, 'onGetContainerList']);
        });
    }

    public function start()
    {
        $this->tick();
    }

    public function setServerId()
    {
        $client = new Client('127.0.0.1', 9500);
        $client->get(Registry::API_GET_IP, function ($client) {
            $ret = json_decode($client->body, true);
            // $ret['data']['ip'], $ret['data']['port']
        });
    }

    public function onGetContainerList($client)
    {
        json_decode($client->body, true);
        
        // 根据返回的容器列表，检查本地的连接

        // 新增的容器，判断ID是否主动连接

        // 失去心跳的容器，从连接里去除

        echo $client->body . PHP_EOL;
    }
}