<?php
namespace SSH\Models;

use SSH\Core\Model;
use SSH\Core\MySqliModel;

/**
 * Class Question
 * @package SSH\Models
 */
class Question extends MySqliModel{

    /**
     * @var string table name
     */
    protected $table = 'question';
}