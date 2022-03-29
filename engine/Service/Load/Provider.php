<?php

namespace Engine\Service\Load;

use Engine\Load;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'load';

    function init()
    {
        $load = new Load();

        $this->di->set($this->serviceName, $load);
    }
}