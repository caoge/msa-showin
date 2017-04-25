<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/26
 * Time: 上午1:08
 */

namespace Showin\Contract\Packet;


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
     * @var array
     */
    protected $routers = [];

    /**
     * @var string
     */
    protected $bodyStream = '';

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
     * @param array $routers
     *
     * @return AbstractPacket
     */
    public function setRouters(array $routers): AbstractPacket
    {
        $this->routers = $routers;
        return $this;
    }

    /**
     * @param string $bodyStream
     *
     * @return AbstractPacket
     */
    public function setBodyStream(string $bodyStream): AbstractPacket
    {
        $this->bodyStream = $bodyStream;
        return $this;
    }
}