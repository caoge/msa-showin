<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/5/5
 * Time: 下午11:24
 */

namespace Showin\Net;


use Showin\Net\Connection\Tcp;

abstract class Provider
{
    protected $connections = [];

    public function add(Tcp $connection)
    {
        $this->connections[$connection->getId()] = $connection;
    }

    public function remove(int $id)
    {

    }

    public function get(int $id): ?Tcp
    {
        return $this->connections[$id] ?? null;
    }

    /**
     * @return array
     */
    public function getConnections(): array
    {
        return $this->connections;
    }
}