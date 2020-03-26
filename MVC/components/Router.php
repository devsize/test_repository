<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Return request string
     * @return string
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //get uri request
        $uri = $this->getURI();
        //check this uri in routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //compare $uriPattern with $uri
            if (preg_match("~$uriPattern~", $uri)) {


                //get internal path from external compare
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);


                //we define what controller and action handle the query
//                $segments = explode('/', $path);
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));


                $parameters = $segments;

                //include file of controller`s class
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }


                //create object of controller`s class and call method = action
                $controllerObject = new $controllerName;
//                $result = $controllerObject->$actionName($parameters); //$actionName() calls like method with string of $actionName

                //such approach gives us use of variables in parameters of actionView function in NewsController
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }

        }


    }
}