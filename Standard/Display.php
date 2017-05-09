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
    public static function component()
    {
        Output::stdout(Output::COLOR_RED . "\n启动参数错误\n    message \n\n启动参数错误\n    message\n" . Output::COLOR_NONE);
    }
}