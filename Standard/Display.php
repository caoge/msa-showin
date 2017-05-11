<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/5/9
 * Time: 下午11:00
 */

namespace Showin\Standard;

class Display
{
    public static function help()
    {
        Output::stdout(Output::COLOR_GREEN . "\n-c 启动组件\n   Container:容器\n   Proxy:代理\n   Registry:注册中心\n\n-h 监听host\n   默认:0.0.0.0\n\n-p 监听端口\n   默认:9500,9501,9502\n" . Output::COLOR_NONE);
    }
}