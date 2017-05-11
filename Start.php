<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午9:39
 */
use Showin\Standard\Display;
use Showin\Psr\Psr4AutoloaderClass;
use Showin\Component\Container\ContainerServer;
use Showin\Component\Proxy\ProxyServer;
use Showin\Component\Registry\RegistryServer;

$option = getopt('c:h:p:');
$component = isset($option['c']) ? $option['c'] : '';
$host = isset($option['h']) ? $option['h'] : '';
$port = isset($option['p']) ? $option['p'] : '';

include __DIR__ . '/Psr/Psr4AutoloaderClass.php';
$autoloader = new Psr4AutoloaderClass();
$autoloader->addNamespace('Showin', __DIR__ . '/');
$autoloader->register();

switch ($component) {
    case 'Container':
        $server = new ContainerServer($host, $port);
        break;
    case 'Proxy':
        $server = new ProxyServer($host, $port);
        break;
    case 'Registry':
        $server = new RegistryServer($host, $port);
        break;
    default:
        Display::help();
        exit;
        break;
}
$server->start();