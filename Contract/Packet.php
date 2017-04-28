<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/28
 * Time: 下午3:14
 */

namespace Showin\Contract;

use Showin\Standard\Router;

abstract class Packet
{
    /**
     * 不包含自身的包头长度
     *
     * @var int
     */
    protected $len = 0;

    /**
     * 契约名crc32
     *
     * @var string
     */
    protected $service = '';

    /**
     * 契约名
     *
     * @var string
     */
    protected $name = '';

    /**
     * 契约类型
     *
     * @var int
     */
    protected $flag = 0;

    /**
     *
     *
     * @var string
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $time = 0;

    /**
     * @var int
     */
    protected $uniqid = 0;

    /**
     * @var int
     */
    protected $askId = 0;

    /**
     * @var int
     */
    protected $code = 0;

    /**
     * @var int
     */
    protected $routerCount = 0;

    /**
     * @var int
     */
    protected $dstMode = 0;

    /**
     * @var int
     */
    protected $dst = 0;

    /**
     * @var Router
     */
    protected $router = null;

    /**
     * @var string
     */
    protected $body = '';

    /**
     * @var Parser
     */
    protected $bodyParser = null;

    /**
     * @param int $len
     *
     * @return Packet
     */
    public function setLen(int $len): Packet
    {
        $this->len = $len;
        return $this;
    }

    /**
     * @param string $service
     *
     * @return Packet
     */
    public function setService(string $service): Packet
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @param string $name
     *
     * @return Packet
     */
    public function setName(string $name): Packet
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $flag
     *
     * @return Packet
     */
    public function setFlag(int $flag): Packet
    {
        $this->flag = $flag;
        return $this;
    }

    /**
     * @param string $id
     *
     * @return Packet
     */
    public function setId(string $id): Packet
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param int $time
     *
     * @return Packet
     */
    public function setTime(int $time): Packet
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @param int $uniqid
     *
     * @return Packet
     */
    public function setUniqid(int $uniqid): Packet
    {
        $this->uniqid = $uniqid;
        return $this;
    }

    /**
     * @param int $askId
     *
     * @return Packet
     */
    public function setAskId(int $askId): Packet
    {
        $this->askId = $askId;
        return $this;
    }

    /**
     * @param int $code
     *
     * @return Packet
     */
    public function setCode(int $code): Packet
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param int $routerCount
     *
     * @return Packet
     */
    public function setRouterCount(int $routerCount): Packet
    {
        $this->routerCount = $routerCount;
        return $this;
    }

    /**
     * @param int $dstMode
     *
     * @return Packet
     */
    public function setDstMode(int $dstMode): Packet
    {
        $this->dstMode = $dstMode;
        return $this;
    }

    /**
     * @param int $dst
     *
     * @return Packet
     */
    public function setDst(int $dst): Packet
    {
        $this->dst = $dst;
        return $this;
    }

    /**
     * @param Router $router
     *
     * @return Packet
     */
    public function setRouter(Router $router): Packet
    {
        $this->router = $router;
        return $this;
    }

    /**
     * @param string $body
     *
     * @return Packet
     */
    public function setBody(string $body): Packet
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param Parser $bodyParser
     *
     * @return Packet
     */
    public function setBodyParser(Parser $bodyParser): Packet
    {
        $this->bodyParser = $bodyParser;
        return $this;
    }

    /**
     * @return int
     */
    public function getLen(): int
    {
        return $this->len;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getFlag(): int
    {
        return $this->flag;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @return int
     */
    public function getUniqid(): int
    {
        return $this->uniqid;
    }

    /**
     * @return int
     */
    public function getAskId(): int
    {
        return $this->askId;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getRouterCount(): int
    {
        return $this->routerCount;
    }

    /**
     * @return int
     */
    public function getDstMode(): int
    {
        return $this->dstMode;
    }

    /**
     * @return int
     */
    public function getDst(): int
    {
        return $this->dst;
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return Parser
     */
    public function getBodyParser(): Parser
    {
        return $this->bodyParser;
    }

    /**
     * @return string
     */
    abstract public function getStream(): string;
}