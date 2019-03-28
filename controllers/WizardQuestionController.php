<?php
namespace SSH\Controllers;

use SSH\Core\Controller;
use SSH\Models\WizardQuestion;

/**
 * Class WizardQuestionController
 * @package SSH\Controllers
 */
class WizardQuestionController extends Controller
{
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

        $model = new WizardQuestion($this->db_connection->get_connection());

        if (isset($_REQUEST["data"]["id"])) {
            $model->update($_REQUEST["data"]);
        } else {
            $model->insert($_REQUEST["data"]);
        }

        return json_encode(['success' => true]);
    }

    /**
     * @return string
     */
    public function delete(): string
    {
        if (!isset($_REQUEST["id"]))
        {
            return json_encode(["error" => "id required"]);
        }

        $model = new WizardQuestion($this->db_connection->get_connection());

        $model->delete($_REQUEST["id"]);

        return json_encode(["success" => true]);
    }

    /**
     * @param array $data
     * @return bool
     */
    private function validate(array $data)
    {

        if (empty($data["wizard_id"])) {
            return false;
        }

        if (empty($data["question_id"])) {
            return false;
        }

        if (empty($data["page"])) {
            return false;
        }

        if (empty($data["order_no"])) {
            return false;
        }

        return true;
    }
}