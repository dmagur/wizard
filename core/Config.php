<?php
namespace SSH\Core;

use SSH\Contracts\ConfigProvider;
use SSH\Exceptions\ConfigException;

/**
 * Class Config
 * @package SSH\Core
 */
class Config implements ConfigProvider{
    /**
     * @var mixed config data
     */
    private $config;

    /**
     * Config constructor.
     * @param $name config name
     * @throws ConfigException if config not found
     */
    function __construct(string $name)
    {
        if (file_exists(__DIR__.'/../config/'.$name.'.php')) {
            $this->config = include __DIR__.'/../config/' . $name . '.php';
        }
        else{
            throw new ConfigException('config with name '.$name.' not found');
        }
    }

    /**
     * @param string $name config param name
     * @return config param data
     * @return null if param not found in config
     */
    public function get(string $name){
        if (isset($this->config[$name])){
            return $this->config[$name];
        }
        else
            return null;
    }
}