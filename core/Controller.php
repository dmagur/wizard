<?php
namespace SSH\Core;

use SSH\Contracts\ConfigProvider;
use SSH\Contracts\StorageProvider;
use SSH\Exceptions\ViewException;
use SSH\Contracts\ControllerContract;

/**
 * Class Controller
 * @package SSH\Core
 */
class Controller implements ControllerContract
{
    /**
     * Database connection
     *
     * @var StorageProvider
     */
    protected $db_connection;


    /**
     * Controller constructor.
     * @param StorageProvider $db_connection
     * @param ConfigProvider $facebook_config
     */
    public function __construct(StorageProvider $db_connection)
    {
        $this->db_connection = $db_connection;
    }

    /**
     * Displays view
     * @param string $view
     * @param string $layout
     * @param array $data
     * @throws ViewException if layout file not found
     */
    public function out(string $view,string $layout = 'default',array $data = array()){
        if (!file_exists(__DIR__.'/../views/layouts/'.$layout.'.php')){
            throw new ViewException("Layout not found");
        }
        require_once __DIR__.'/../views/layouts/'.$layout.'.php';
    }

    /**
     * Redirects to given url
     * @param $path url for redirect
     */
    public function redirect(string $path){
        header("Location:".$path);
    }
}