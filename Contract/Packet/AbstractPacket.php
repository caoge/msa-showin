<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/26
 * Time: 上午1:08
 */

namespace Showin\Contract\Packet;


use Showin\Standard\Router;

class AbstractPacket
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
     * @var int
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
    protected $routers = null;

    /**
     * @var string
     */
    protected $body = '';

    /**
     * @param int $len
     *
     * @return AbstractPacket
     */
    public function setLen(int $len): AbstractPacket
    {
        $this->len = $len;
        return $this;
    }

    /**
     * @param string $service
     *
     * @return AbstractPacket
     */
    public function setService(string $service): AbstractPacket
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @param string $name
     *
     * @return AbstractPacket
     */
    public function setName(string $name): AbstractPacket
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $flag
     *
     * @return AbstractPacket
     */
    public function setFlag(int $flag): AbstractPacket
    {
        $this->flag = $flag;
        return $this;
    }

    /**
     * @param int $id
     *
     * @return AbstractPacket
     */
    public function setId(int $id): AbstractPacket
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param int $time
     *
     * @return AbstractPacket
     */
    public function setTime(int $time): AbstractPacket
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @param int $uniqid
     *
     * @return AbstractPacket
     */
    public function setUniqid(int $uniqid): AbstractPacket
    {
        $this->uniqid = $uniqid;
        return $this;
    }

    /**
     * @param int $askId
     *
     * @return AbstractPacket
     */
    public function setAskId(int $askId): AbstractPacket
    {
        $this->askId = $askId;
        return $this;
    }

    /**
     * @param int $code
     *
     * @return AbstractPacket
     */
    public function setCode(int $code): AbstractPacket
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param int $routerCount
     *
     * @return AbstractPacket
     */
    public function setRouterCount(int $routerCount): AbstractPacket
    {
        $this->routerCount = $routerCount;
        return $this;
    }

    /**
     * @param int $dstMode
     *
     * @return AbstractPacket
     */
    public function setDstMode(int $dstMode): AbstractPacket
    {
        $this->dstMode = $dstMode;
        return $this;
    }

    /**
     * @param int $dst
     *
     * @return AbstractPacket
     */
    public function setDst(int $dst): AbstractPacket
    {
        $this->dst = $dst;
        return $this;
    }

    /**
     * @param Router $routers
     *
     * @return AbstractPacket
     */
    public function setRouters(Router $routers): AbstractPacket
    {
        $this->routers = $routers;
        return $this;
    }

    /**
     * @param string $body
     *
     * @return AbstractPacket
     */
    public function setBodyStream(string $body): AbstractPacket
    {
        $this->body = $body;
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
     * @return int
     */
    public function getId(): int
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
    public function getRouters(): Router
    {
        return $this->routers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}