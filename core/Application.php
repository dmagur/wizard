<?php
namespace SSH\Core;

use SSH\Contracts\ApplicationContract;
use SSH\Contracts\ConfigProvider;
use SSH\Contracts\StorageProvider;

/**
 * Class Application
 * @package SSH\Core
 */
class Application implements ApplicationContract
{
    /**
     * @var Route route name
     */
    private $route;

    /**
     * @var ConfigProvider config
     */
    private $route_config;

    /**
     * @var StorageProvider database connection
     */
    private $db_connection;

    /**
     * Application constructor.
     * @param string $route
     * @param ConfigProvider $route_config
     * @param StorageProvider $db_connection
     */
    function __construct(string $route,ConfigProvider $route_config,StorageProvider $db_connection)
    {
        $this->route = $route;
        $this->route_config = $route_config;
        $this->db_connection = $db_connection;
    }

    /**
     * @return mixed
     */
    function run()
    {
        $controller = $this->route_config->get($this->route);
        $controller_class = new $controller['class']($this->db_connection);
        return $controller_class->{$controller['method']}();
    }
}