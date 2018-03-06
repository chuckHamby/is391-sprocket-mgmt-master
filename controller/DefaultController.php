<?php
/**
 * User: lyang
 * Date: 1/30/18
 */

final class DefaultController extends AbstractController
{

    /**
     * The main controller method
     * @param array $params URL parameters
     */
    function process($params)
    {
        $this->view = "default";
        $this->head['title'] = "iSprocket";
    }
}