<?php
namespace SSH\Contracts;

/**
 * Interface ModelContract
 * @package SSH\Contracts
 */
interface ModelContract{

    /**
     * @param array $data
     * @return int
     */
    public function insert(array $data): int;

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool;

    /**
     * @param int $id
     * @return array|null
     */
    public function get(int $id);

    /**
     * @param int $id
     * @return array|null
     */
    public function delete(int $id);
}