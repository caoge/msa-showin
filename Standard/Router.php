<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/25
 * Time: 下午9:51
 */

namespace Showin\Standard;


class Router
{
    protected $list = [];

    protected $count = 0;

    public function __construct($routersList = [])
    {
        $this->unserialize($routersList);
    }

    /**
     * 获取路由列表
     *
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * 获取路由总数
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * 增加路由
     *
     * @param string $ip
     * @param int $port
     *
     * @return bool
     */
    public function push(string $ip = '', int $port = 0): bool
    {

    }

    /**
     * 获取上一个路由
     *
     * @return array
     */
    public function pop(): array
    {

    }

    /**
     * IP端口格式序列
     *
     * @return array
     */
    public function serialize(): array
    {

    }

    /**
     * IP端口格式反序列
     *
     * @return array
     */
    public function unserialize(): array
    {

    }
}