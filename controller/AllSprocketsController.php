<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/19/2018
 * Time: 6:53 PM
 */

class AllSprocketsController extends AbstractController
{


    /**
     * The main controller method
     * @param array $params URL parameters
     */
    public function process($params)
    {
        $dao = new SprocketDao();
        $sprockets = $dao->getAll();
        $this->data["sprockets"] = $sprockets;
        $this->view = "sprocketListing";
        $this->head["title"] = "Sprocket Listing";
    }
}