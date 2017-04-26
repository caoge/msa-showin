<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/25
 * Time: 下午9:27
 */

namespace Showin\Contract\Packet;


use Showin\Standard\Router;

class Tcp extends AbstractPacket
{
    public function setName(string $name): AbstractPacket
    {
        parent::setName($name);
        return parent::setService(crc32($name));
    }

    public function setId(): AbstractPacket
    {
        return parent::setId(sprintf('%s-%s', dechex($this->getTime()), dechex($this->getUniqid())));
    }

    public function pack(array $data)
    {

    }

    public function unpack(string $stream)
    {
        $data = unpack('nlen/nflag/Nservice/Ntime/Nuniqid/NaskId/ncode/nrouterCount', $stream);

        foreach ($data as $key => $value) {
            call_user_func(sprintf('set%s', strtoupper($key)), $value);
        }
        $this->setId();
        $this->setRouters(new Router($data['routers_list']));
    }
}