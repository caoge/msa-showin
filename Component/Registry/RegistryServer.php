<?php

namespace Showin\Component\Registry;

use Showin\Contract\Packet\Http as HttpPacket;
use Showin\Contract\Parser\Json;
use Showin\Net\Connection\Http as HttpConnection;
use Swoole\Http\Server;
use Swoole\Http\Response;
use Swoole\Http\Request;

/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午10:52
 */
class RegistryServer
{
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
    }

    public function start()
    {
        $this->server->start();
    }

    public function onRequest(Request $request, Response $response)
    {
        var_dump($request, $response);

        $httpConnection = new HttpConnection($response);
        $packet = new HttpPacket();
        $parser = new Json();


        $parser->setData(['cd' => 1]);

        $packet->setCode(200);
        $packet->setBodyParser($parser);
        $httpConnection->send($packet);

        $ip = $request->server['remote_addr'];
        $port = $request->server['remote_port'];
    }

    public function onWorkerStart()
    {

    }
}