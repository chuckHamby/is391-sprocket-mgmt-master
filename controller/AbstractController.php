<?php
/**
 * User: lyang
 * Date: 1/30/18
 */

abstract class AbstractController
{
    /**
     * @var array An array to store data with indexes that will be accessible as variables in template view
     */
    protected $data = array();
    /**
     * @var string A template name without the extension
     */
    protected $view = "";
    /**
     * @var array The HTML head
     */
    protected $head = array('title' => '', 'description' => '');


    /**
     * Protects any variable by converting HTML special characters to entities
     * @param mixed $x The variable to be protected
     * @return mixed The protected variable
     */
    private function protect($x = null)
    {
        if (!isset($x))
            return null;
        elseif (is_string($x))
            return htmlspecialchars($x, ENT_QUOTES);
        elseif (is_array($x)) {
            foreach ($x as $k => $v) {
                $x[$k] = $this->protect($v);
            }
            return $x;
        } else
            return $x;
    }


    /**
     * Renders the view
     */
    public function renderView()
    {
        if ($this->view) {
            extract($this->protect($this->data));
            extract($this->data, EXTR_PREFIX_ALL, "");
            require("view/" . $this->view . ".phtml");
        }
    }


    /**
     * @param string $url Redirects to a given URL
     */
    public function redirect($url)
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    /**
     * The main controller method
     * @param array $params URL parameters
     */
    abstract function process($params);
}
