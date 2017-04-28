<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/25
 * Time: 下午9:27
 */

namespace Showin\Contract\Packet;


use Showin\Contract\Packet;
use Showin\Standard\Router;

class Tcp extends Packet
{
    public function setName(string $name): Packet
    {
        parent::setName($name);
        return parent::setService(crc32($name));
    }

    public function pack(): string
    {
        $len = $routerBin = '';
        return pack(
                'nnNNNNnn',
                $len,
                $this->getFlag(),
                $this->getService(),
                $this->getTime(),
                $this->getUniqid(),
                $this->getAskId(),
                $this->getCode(),
                $this->getRouterCount()
            ) . $routerBin . $this->getBody();
    }

    public function unpack(string $stream)
    {
        $data = unpack('nlen/nflag/Nservice/Ntime/Nuniqid/NaskId/ncode/nrouterCount', $stream);

        foreach ($data as $key => $value) {
            call_user_func(sprintf('set%s', strtoupper($key)), $value);
        }
        $this->setId(sprintf('%s-%s', dechex($this->getTime()), dechex($this->getUniqid())));
        $this->setRouter(new Router($data['routers_list']));
    }

    public function getStream(): string
    {
        return $this->pack();
    }
}