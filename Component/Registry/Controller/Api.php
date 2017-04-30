<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/30
 * Time: 下午6:23
 */

namespace Showin\Component\Registry\Controller;


use Showin\Component\Registry\Table\Container;
use Showin\Config\Registry;
use Swoole\Http\Request;
use Swoole\Http\Response;

class Api
{
    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @var null|Container
     */
    protected $containerTable = null;

    public function __construct(Request $request, Response $response, Container $containerTable)
    {
        $this->request = $request;
        $this->response = $response;
        $this->containerTable = $containerTable;
    }

    public function keeplive()
    {
        $ip = $this->request->server['remote_addr'];
        $port = $this->request->server['remote_port'];

        $table = $this->containerTable->getTable();
        $key = $this->containerTable->getKey($ip, $port);
        $table->set($key, [
            'ip'   => ip2long($ip),
            'port' => $port,
            'ttl'  => 20,
            'last' => time()
        ]);

        return [
            'code' => 0
        ];
    }

    public function getContainerList()
    {
        return [
            'code' => 0,
            'data' => $this->containerTable->getList()
        ];
    }

    public function getIp()
    {
        return [
            'code' => 0,
            'data' => [
                'ip'   => $this->request->server['remote_addr'],
                'port' => $this->request->server['remote_port']
            ]
        ];
    }

    public function getData()
    {
        $uri = $this->request->server['request_uri'];
        switch ($uri) {
            case Registry::API_KEEPLIVE:
                return $this->keeplive();
                break;
            case Registry::API_GET_CONTAINER:
                return $this->getContainerList();
                break;
            default:
                return ['code' => 404, 'data' => []];
                break;
        }
    }
}