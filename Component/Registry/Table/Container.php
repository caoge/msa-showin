<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/30
 * Time: 下午8:26
 */

namespace Showin\Component\Registry\Table;


use Swoole\Table;

class Container
{
    /**
     * @var null|Table
     */
    protected $table = null;

    public function __construct()
    {
        $this->table = new Table(1024);
        $this->table->column('ip', Table::TYPE_INT, 4);
        $this->table->column('port', Table::TYPE_INT, 4);
        $this->table->column('ttl', Table::TYPE_INT, 4);
        $this->table->column('last', Table::TYPE_INT, 4);
        $this->table->create();
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getKey($ip, $port)
    {
        return sprintf('%d:%d', ip2long($ip), $port);
    }

    public function remove()
    {

    }
}