<?php
class App
{
    // make prop with def val of controller for URL in case user didn't input anything to URL
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    // constructor will accepted param from d obj that tergeting App class // this func run automatically
    public function __construct()
    {
        $url = $this->parseURL();
        //took urlparsing function n save it with d same name in __construct

        //controller
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) { // to check d existing file target
                $this->controller = strtolower($url[0]);
                // save new user controller
                unset($url[0]);
                // remove controller from d array for took d param
            }
        }

        // if user didn't input anything to url, we still require target file with def val on prop 
        require "../app/controllers/" . $this->controller . ".php";
        // instantiate d Home class n save it to controller prop above
        $this->controller = new $this->controller;

        // check existing [1] index on user url input, if it's not then run index func on Home class
        if (isset($url[1])) {
            // check existing method with first param as a class n second param is d method
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //run controller n method, send params if it has
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        // if statement. checking url and set def val if it true (isset)
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
        // sanitizing n validating user input on URL // second param is to remove any char that not allowed in URL 
        // split a string with explode func on separator (/ = first param) into array with index on it
        // [0] index will be controller
        // remove whitespace char from a string that caused by user who customized url(/ = second param)
    }
}