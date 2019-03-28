<?php
namespace SSH\Contracts;

/**
 * Interface ControllerContract
 * @package SSH\Contracts
 */
interface ControllerContract{

    /**
     * @param string $view
     * @param string $layout
     * @param array $data
     * @return mixed
     */
    public function out(string $view,string $layout,array $data);

    /**
     * @param string $path
     * @return mixed
     */
    public function redirect(string $path);
}