<?php
/**
 * User: Blink
 * Email: caogemail@163.com
 * Date: 2017/4/20
 * Time: 下午11:11
 */

namespace Showin\Contract\Parser;


interface IParserInterface
{
    public function decode($data);

    public function encode(): string;

    public function getData(): array;

    public function setData(array $data);

    public function getType(): string;

    public function clean();
}