<?php

namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'request';

    function init()
    {
        $request = new Request();

        $this->di->set($this->serviceName, $request);
    }
}