<?php

namespace Admin\Controller;

class DashboardController extends AdminController
{
    public function index()
    {
        $userModel = $this->load->model('user');
        //$userModel->repository->test();
        //print_r($userModel->repository->getUsers());
        $this->view->render('dashboard');
    }

}