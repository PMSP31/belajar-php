<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        // to change the controller to Capitalize letter
        $capController = ucfirst($url[0]);
        // set default controller to not null;
        if ($url == NULL) {
            $url = [$this->controller];
        }

        // Controller
        if (file_exists('../app/controllers/' . $capController . '.php')) {
            $this->controller = $capController;
            // delete controller from array url
            unset($url[0]);
        }
        // call new controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        // check method from url
        if (isset($url[1])) {
            // check method is exists on controller?
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Params
        // check params from url
        if (!empty($url)) {
            // insert to property params
            $this->params = array_values($url);
        }

        // run controller, method & send params if exists
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // routing
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // remove lastest /
            $url = rtrim($_GET['url'], '/');
            // filter url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // explode url to array
            $url = explode('/', $url);
            return $url;
        }
    }
}
