<?php

namespace Showin\Component\Registry;

use Showin\Component\Registry\Controller\Api;
use Showin\Component\Registry\Table\Container;
use Showin\Contract\Packet\Http as HttpPacket;
use Showin\Contract\Parser\Json;
use Showin\Net\Connection\Http as HttpConnection;
use Swoole\Http\Server;
use Swoole\Http\Response;
use Swoole\Http\Request;
use Swoole\Table;

/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午10:52
 */
class RegistryServer
{
    /**
     * @var Table
     */
    protected $table = null;

    public function __construct($host = '', $port = '')
    {
        $this->server = new Server($host, $port, SWOOLE_BASE);

        $this->server->set([
            'open_length_check'     => true,
            'package_length_type'   => 'n',
            'package_length_offset' => 0,
            'package_body_offset'   => 2,
            'package_max_length'    => 1024 * 8
        ]);

        $this->server->on('Request', [$this, 'onRequest']);
        $this->server->on('WorkerStart', [$this, 'onWorkerStart']);

        //
    }

    public function start()
    {
        $this->server->start();
    }

    public function onRequest(Request $request, Response $response)
    {
        $parser = new Json();
        $api = new Api($request, $response, $this->table);
        $parser->setData($api->getData());

        $httpConnection = new HttpConnection($response);
        $packet = new HttpPacket();
        $packet->setBodyParser($parser);
        $httpConnection->send($packet);
    }

    public function onWorkerStart()
    {
        // 最多支持1024个容器
        $table = new Container();
        $this->table = $table->getTable();

        // 开启定时器，检查容器

    }
}