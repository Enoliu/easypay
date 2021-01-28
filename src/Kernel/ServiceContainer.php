<?php


namespace Enoliu\EasyPay\Kernel;


use Enoliu\EasyPay\Kernel\Providers\ConfigServiceProvider;
use Pimple\Container;

class ServiceContainer extends Container
{
    /**
     * @var array
     */
    protected $providers = [];

    /**
     * @var array
     */
    protected $defaultConfig = [];

    /**
     * @var array
     */
    protected $userConfig = [];

    public function __construct(array $config = [], array $prepends = [])
    {
        $this->userConfig = $config;

        $this->registerProviders($this->getProviders());

        parent::__construct($prepends);
    }

    /**
     * 获取所有配置信息
     *
     * @return array
     */
    public function getConfig(): array
    {
        return array_replace_recursive($this->defaultConfig, $this->userConfig);
    }

    /**
     * 获取所有服务提供者provider
     *
     * @return array
     */
    public function getProviders()
    {
        return array_merge(
            [
                ConfigServiceProvider::class,
            ],
            $this->providers
        );
    }

    /**
     * 注册服务提供者
     *
     * @param array $providers
     */
    public function registerProviders(array $providers = [])
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }
}