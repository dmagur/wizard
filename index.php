<?php
require __DIR__ . '/vendor/autoload.php';
use SSH\Core\Application;
use SSH\Core\Config;
use SSH\Core\MySqliDatabase;

session_start();
try {
    $routes = new Config('routes');
    $dbconfig = new Config('database');
    $dbconnection = new MySqliDatabase($dbconfig);

    $app = new Application(($_REQUEST['action']) ?? 'get-wizard', $routes, $dbconnection);
    print $app->run();
}
catch (Exception $e){
    print_r($e);
    /** @todo log exception */
    print json_encode(["error" => "server error"]);
}
session_write_close();