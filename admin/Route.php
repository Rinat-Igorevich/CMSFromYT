<?php
/**
 * List routes
 */


$this->router->add('login', '/admin/login/', 'LoginCController:form');
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');

$this->router->add('pages', '/admin/pages/', 'PageController:listing');
$this->router->add('page-create', '/admin/pages/create/', 'PageController:create');
$this->router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');

$this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
$this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');


