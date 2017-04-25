<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/24
 * Time: 下午10:27
 */

namespace Showin\Standard;


class Event
{
    protected $listens = [];

    public function listen($event = null, callable $callback, $once = false)
    {
        if (!is_callable($callback)) {
            return false;
        }
        $this->listens[$event][] = ['callback' => $callback, 'once' => $once];
        return true;
    }

    public function one($event = null, callable $callback)
    {
        return $this->listen($event, $callback, true);
    }

    public function remove($event = null, $index = null)
    {
        if (is_null($index)) {
            unset($this->listens[$event]);
        } else {
            unset($this->listens[$event][$index]);
        }
    }

    public function remove2($event = null, callable $callback = null)
    {

    }

    public function trigger()
    {
        if (!func_num_args()) {
            return false;
        }
        $args = func_get_args();
        $event = array_shift($args);
        if (!isset($this->listens[$event])) {
            return false;
        }
        foreach ($this->listens[$event] as $index => $listen) {
            $callback = $listen['callback'];
            $listen['once'] && $this->remove($event, $index);
            call_user_func_array($callback, $args);
        }
    }
}