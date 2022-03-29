<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\DI\DI;
use Engine\Helper\Common;

class Cms
{
    /**
     * @var DI
     */
    private $di;

    public $router;

    /**
     * cms constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * run cms
     */
    public function run()
    {
        try {
            $file = __DIR__ . '/../' . mb_strtolower(ENV) . '/Route.php';
            require_once $file;

            $routerDispatch = $this->router->dispatch(Common::getMethod() , Common::getPathUrl());

            if ($routerDispatch == null) {

                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }
            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\' . ENV . '\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);

        } catch (\Exception $e)
        {
            echo $e->getMessage();
            exit;
        }

    }
}