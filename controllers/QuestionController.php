<?php
namespace SSH\Controllers;

use SSH\Core\Controller;
use SSH\Models\Question;

/**
 * Class QuestionController
 * @package SSH\Controllers
 */
class QuestionController extends Controller{

    /**
     * @return string
     */
    public function get(): string
    {
        if (!isset($_REQUEST["id"]))
        {
            return json_encode(["error" => "id required"]);
        }

        $questionModel = new Question($this->db_connection->get_connection());

        $question = $questionModel->get($_REQUEST["id"]);

        return json_encode($question);
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

        $questionModel = new Question($this->db_connection->get_connection());

        if (isset($_REQUEST["data"]["id"])) {
            $questionModel->update($_REQUEST["data"]);
        } else {
            $questionModel->insert($_REQUEST["data"]);
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

        $questionModel = new Question($this->db_connection->get_connection());

        $questionModel->delete($_REQUEST["id"]);

        return json_encode(["success" => true]);
    }

    /**
     * @param array $data
     * @return bool
     */
    private function validate(array $data)
    {
        if (empty($data["text"])) {
            return false;
        }

        if (empty($data["type"])) {
            return false;
        }
    }
}