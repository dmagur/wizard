<?php
namespace SSH\Contracts;

/**
 * Interface StorageProvider
 * @package SSH\Contracts
 */
interface StorageProvider{

    /**
     * @return mixed
     */
    public function connect();
}