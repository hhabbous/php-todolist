<?php

namespace TODO\Core;

use TODO\Controller\TaskController;

class Application
{

    /** @var null The controller */
    private $url_controller = null;
    /** @var null The method (of the above controller), often also named "action" */
    private $url_action = null;
    /** @var array URL parameters */
    private $url_params = array();

    /**
     * "Start" the application:
     * Analyze the URL elements and calls the according controller/method or the fallback
     */
    public function __construct()
    {

        // create array with URL parts in $url
        $this->splitUrl();

        // check for controller: no controller given ? then load start-page
        if (!$this->url_controller) {
            $page = new TaskController();
            $page->index();
        } elseif (class_exists(
            $this->url_controller = sprintf("TODO\Controller\%sController", ucfirst($this->url_controller))
        )) {
            // here we did check for controller: does such a controller exist ?
            // if so, then load this file and create this controller
            $page = new $this->url_controller();

            // check for method: does such a method exist in the controller ?
            if (method_exists($page, $this->url_action)) {
                if (!empty($this->url_params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array($page, $this->url_action), $this->url_params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $page->{$this->url_action}();
                }
            } else {
                if (strlen($this->url_action) == 0) {
                    // no action defined: call the default index() method of a selected controller
                    $page->index();
                } else {
                    // PAGE 404
                }
            }
        } else {
            // PAGE 404
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            // split URL
            $url = trim($_GET['url'], '/');
            // $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);
        }
    }
}
