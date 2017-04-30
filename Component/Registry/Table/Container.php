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

    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->table = new Table(1024);
        $this->table->column('ip', Table::TYPE_INT, 4);
        $this->table->column('port', Table::TYPE_INT, 4);
        $this->table->column('ttl', Table::TYPE_INT, 4);
        $this->table->column('last', Table::TYPE_INT, 4);
        $this->table->create();
    }

    /**
     * 获取容器共享内存表
     *
     * @return Table
     */
    public function getTable(): Table
    {
        return $this->table;
    }

    /**
     * 获取容器表key
     *
     * @param string $ip
     * @param int $port
     *
     * @return string
     */
    public function getKey(string $ip, int $port): string
    {
        return sprintf('%d:%d', ip2long($ip), $port);
    }

    /**
     * 获取在线容器列表
     * 
     * @return array
     */
    public function getList(): array 
    {
        $list = [];
        foreach ($this->table as $value) {
            $list[] = [
                'ip'   => long2ip($value['ip']),
                'port' => $value['port']
            ];
        }
        return $list;
    }

    /**
     * 定时删除未发送心跳的容器
     */
    public function tick()
    {
        swoole_timer_tick(10000, function () {
            foreach ($this->table as $key => $value) {
                if (time() - $value['last'] > $value['ttl']) {
                    $this->table->del($key);
                }
            }
        }, $this->table);
    }
}