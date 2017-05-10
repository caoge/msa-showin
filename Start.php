<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/18
 * Time: 下午9:39
 */
use Showin\Standard\Output;
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
        Output::stdout(Output::COLOR_GREEN . "\n-c 启动组件\n   Container:容器\n   Proxy:代理\n   Registry:注册中心\n\n-h 监听host\n   默认:0.0.0.0\n\n-p 监听端口\n   默认:9500,9501,9502\n" . Output::COLOR_NONE);
        exit;
        break;
}
$server->start();