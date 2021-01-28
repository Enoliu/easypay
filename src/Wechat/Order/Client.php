<?php


namespace Enoliu\EasyPay\Wechat\Order;


use Enoliu\EasyPay\Wechat\Application;

class Client
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function test()
    {
        return $this->app['config'];
    }
}