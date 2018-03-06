<?php
/**
 * User: lyang
 * Date: 1/30/18
 */

class ErrorController extends AbstractController
{
    function process($params)
    {
        if (!empty($params)) {
            $this->data["ref_id"] = $params[0];
        }
        $this->view = 'error';
    }
}