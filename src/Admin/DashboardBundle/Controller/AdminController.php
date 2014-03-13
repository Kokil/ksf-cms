<?php

namespace Admin\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {

        return $this->render('AdminDashboardBundle:Admin:index.html.twig');
    }
}
