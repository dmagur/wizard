<?php
namespace SSH\Contracts;

/**
 * Interface ConfigProvider
 * @package SSH\Contracts
 */
interface ConfigProvider{

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name);
}