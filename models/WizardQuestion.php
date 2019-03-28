<?php
namespace SSH\Models;

use SSH\Core\MySqliModel;

/**
 * Class WizardQuestion
 * @package SSH\Models
 */
class WizardQuestion extends MySqliModel{

    /**
     * @var string table name
     */
    protected $table = 'wizard_question';
}