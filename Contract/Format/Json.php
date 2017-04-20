<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/19
 * Time: 下午4:17
 */

namespace Showin\Contract\Format;

class Json implements IFormatInterface
{
    protected $data = [];

    public function encode(): string
    {
        return is_string($this->data) ? $this->data : json_encode($this->data, JSON_UNESCAPED_UNICODE);
    }

    public function decode($data)
    {
        $this->data = is_string($data) ? json_decode($data, true) : (is_array($data) ? $data : []);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getType(): string
    {
        return 'json';
    }

    public function clean()
    {
        $this->data = [];
    }
}