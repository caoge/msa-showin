<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午9:39
 */
$option = getopt('c:h:p:');
$component = isset($option['c']) ? $option['c'] : '';
$host = isset($option['h']) ? $option['h'] : '';
$port = isset($option['p']) ? $option['p'] : '';

include __DIR__ . '/Psr/Psr4AutoloaderClass.php';
$autoloader = new \Showin\Psr\Psr4AutoloaderClass();
$autoloader->addNamespace('Showin', __DIR__ . '/');
$autoloader->register();

switch ($component) {
    case 'Container':
        $server = new \Showin\Component\Container\ContainerServer($host, $port);
        break;
}
$server->start();