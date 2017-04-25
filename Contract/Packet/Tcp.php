<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/25
 * Time: 下午9:27
 */

namespace Showin\Contract\Packet;


class Tcp extends AbstractPacket
{
    public function setName(string $name): AbstractPacket
    {
        parent::setName($name);
        return parent::setService(crc32($name));
    }

    public function pack()
    {

    }

    public function unpack()
    {

    }
}