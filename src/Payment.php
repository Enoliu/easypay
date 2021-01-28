<?php


namespace Enoliu\EasyPay;

use Enoliu\EasyPay\Kernel\ServiceContainer;
use Enoliu\Utils\Str;

/**
 * Class Payment
 *
 * @method static \Enoliu\EasyPay\Wechat\Application    wechat(array $config)
 * @method static \Enoliu\EasyPay\Alipay\Application    alipay(array $config)
 *
 * @package Enoliu\EasyPay
 */
class Payment
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return ServiceContainer
     */
    public static function make(string $name, array $config): ServiceContainer
    {
        $namespace = Str::studly($name);

        $application = "\\Enoliu\\EasyPay\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return static::make($name, ...$arguments);
    }
}