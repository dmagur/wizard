<?php
namespace SSH\Controllers;

use SSH\Core\Controller;
use SSH\Models\Wizard;

/**
 * Class WizardController
 * @package SSH\Controllers
 */
class WizardController extends Controller{

    /**
     * @return string
     */
    public function get(): string
    {
        if (!isset($_REQUEST["id"]))
        {
            return json_encode(["error" => "id required"]);
        }

        $wizardModel = new Wizard($this->db_connection->get_connection());

        $wizard = $wizardModel->get($_REQUEST["id"]);

        return json_encode($wizard);
    }

    /**
     * @return string
     */
    public function post(): string
    {
        if (!isset($_REQUEST["data"]))
        {
            return json_encode(["error" => "data required"]);
        }

        if (!$this->validate($_REQUEST["data"])) {
            return json_encode(["error" => "data invalid"]);
        }

        $wizardModel = new Wizard($this->db_connection->get_connection());

        if (isset($_REQUEST["data"]["id"])) {
            $wizardModel->update($_REQUEST["data"]);
        } else {
            $wizardModel->insert($_REQUEST["data"]);
        }

        return json_encode(['success' => true]);
    }

    /**
     * @return string
     */
    public function delete(): string
    {
        if (empty($_REQUEST["id"]))
        {
            return json_encode(["error" => "id required"]);
        }

        $wizardModel = new Wizard($this->db_connection->get_connection());

        $wizardModel->delete($_REQUEST["id"]);

        return json_encode(["success" => true]);
    }

    /**
     * @param array $data
     * @return bool
     */
    private function validate(array $data)
    {
        if (empty($data["name"])) {
            return false;
        }

        if (empty($data["num_pages"])) {
            return false;
        }
    }
}