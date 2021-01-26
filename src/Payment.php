<?php


namespace Enoliu\EasyPay;


use Enoliu\EasyPay\Kernel\Support\Str;

class Payment
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return mixed
     */
    public static function make(string $name, array $config)
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