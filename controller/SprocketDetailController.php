<?php
/**
 * Created by PhpStorm.
 * User: JP
 * Date: 2/21/2018
 * Time: 6:37 PM
 */

class SprocketDetailController extends AbstractController
{
    /**
     * The main controller method
     * @param array $params URL parameters
     */
    public function process($params)
    {
        $id = $_GET["id"];
        $dao = new SprocketDao();
        $sprockets = $dao->getOne($id);
        $this->data["sprockets"] = $sprockets;
        $this->view = "sprocketDetail";
        $this->head["title"] = "Sprocket Detail";
    }
}