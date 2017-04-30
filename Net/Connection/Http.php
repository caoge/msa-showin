<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/28
 * Time: 下午3:40
 */

namespace Showin\Net\Connection;


use Showin\Contract\Packet;
use Showin\Net\Connection;
use Swoole\Http\Response;

class Http extends Connection
{
    /**
     * @var null|Response
     */
    private $response = null;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function send(Packet $packet)
    {
        $this->response->end($packet->getStream());
    }

    public function close()
    {
        $this->response->status(404);
        $this->response->end('server close');
    }

    public function connect()
    {
        // TODO: Implement connect() method.
    }
}