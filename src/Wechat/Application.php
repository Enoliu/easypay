<?php


namespace Enoliu\EasyPay\Wechat;


use Enoliu\EasyPay\Kernel\ServiceContainer;

/**
 * Class Application
 *
 * @property \Enoliu\EasyPay\Wechat\Order\Client $order
 *
 * @package Enoliu\EasyPay\Wechat
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $defaultConfig = [
        'http' => [
            'base_uri' => 'https://api.mch.weixin.qq.com/v3/',
        ],
    ];

    /**
     * @var array
     */
    protected $providers = [
        Order\ServiceProvider::class,
    ];
}