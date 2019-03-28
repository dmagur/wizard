<?php
namespace SSH\Core;

use SSH\Exceptions\ModelException;
use SSH\Contracts\ModelContract;

class MySqliModel implements ModelContract{
    /**
     * @var \mysqli
     */
    protected $db;

    /**
     * MySqliModel constructor.
     * @param \mysqli $db
     */
    function __construct(\mysqli $db)
    {
        $this->db = $db;
    }

    /**
     * @param array $data
     * @return int
     * @throws ModelException if storage error
     */
    public function insert(array $data): int
    {
        foreach ($data as $key => $value){
            $data[$key] = $this->db->real_escape_string($data[$key]);
        }
        if ($this->db->query("INSERT INTO `".$this->table."`(".implode(",",array_keys($data) ).") VALUES('".implode("','",array_values($data))."')"))
            return $this->db->insert_id;
        else
            throw new ModelException($this->db->error);
    }

    /**
     * @param array $data
     * @return bool
     * @throws ModelException if storage error
     */
    public function update(array $data): bool
    {
        $id = $data['id'];
        $id = $this->db->real_escape_string($id);
        unset($data['id']);
        $values = [];
        foreach ($data as $key => $value){
            $data[$key] = $this->db->real_escape_string($data[$key]);

            $values[] = $key."='".$value."'";
        }
        $values = implode(",",$values );

        if ($this->db->query("UPDATE `".$this->table."` set ".$values." where id='$id'"))
            return true;
        else
            throw new ModelException($this->db->error);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function get(int $id)
    {
        $id = $this->db->real_escape_string($id);
        $res = $this->db->query("SELECT * FROM `".$this->table."` WHERE id='$id'");
        if ($res)
            return $res->fetch_assoc();
        else
            return null;
    }


    /**
     * @param int $id
     * @return array|null
     */
    public function delete(int $id): array
    {
        $id = $this->db->real_escape_string($id);
        $res = $this->db->query("DELETE * FROM `".$this->table."` WHERE id='$id'");
        if ($res)
            return $res->fetch_assoc();
        else
            return null;
    }
}