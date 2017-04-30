<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/30
 * Time: 下午6:23
 */

namespace Showin\Component\Registry\Controller;


use Showin\Component\Registry\RegistryServer;
use Showin\Config\Registry;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Table;

class Api
{
    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @var null|Table
     */
    protected $table = null;

    public function __construct(Request $request, Response $response, Table $table)
    {
        $this->request = $request;
        $this->response = $response;
        $this->table = $table;
    }

    public function keeplive()
    {
        $ip = $this->request->server['remote_addr'];
        $port = $this->request->server['remote_port'];

        if ($this->table->get()) {

        }

        return [
            'code'    => 0
        ];
    }

    public function getContainer()
    {

    }

    public function getIp()
    {

    }

    public function getData()
    {
        $uri = $this->request->server['request_uri'];
        switch ($uri) {
            case Registry::API_KEEPLIVE:
                return $this->keeplive();
                break;
            case Registry::API_GET_CONTAINER:
                return $this->getContainer();
                break;
            default:
                return ['code' => 404, 'data' => []];
                break;
        }
    }
}