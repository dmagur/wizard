<?php
namespace SSH\Core;

use SSH\Contracts\ConfigProvider;
use SSH\Exceptions\ConnectException;
use SSH\Contracts\StorageProvider;

/**
 * Class MySqliDatabase
 * @package SSH\Core
 */
class MySqliDatabase implements StorageProvider{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Database connection
     */
    private $connection;

    /**
     * Database constructor.
     * @param ConfigProvider $config
     */
    function __construct(ConfigProvider $config)
    {
        $this->config = $config;
        $this->connect();
    }

    /**
     * Create connection to mysql database
     * @throws ConnectException if connect was failed
     */
    public function connect(){
        $this->connection = new \mysqli($this->config->get('dbhost'),$this->config->get('dbuser'),$this->config->get('dbpass'),$this->config->get('dbname'));
        if ($this->connection->connect_error){
            throw new ConnectException(mysqli_connect_error(),mysqli_connect_errno());
        }
    }

    public function get_connection(): \mysqli{
        if (!$this->connection)
            $this->connect();
        return $this->connection;
    }
}