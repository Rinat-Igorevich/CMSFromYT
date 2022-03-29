<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\DI\DI;

class AdminController extends Controller
{

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var array
     */
    public $data = [];

    /**
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() == null) {
            header('Location: /admin/login/');
            exit;
        }
    }

    /**
     * Check auth
     */
    public function checkAuthorization()
    {

    }
    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit;
    }
}