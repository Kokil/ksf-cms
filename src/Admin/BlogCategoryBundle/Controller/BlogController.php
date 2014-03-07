<?php

namespace Admin\BlogCategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller
{
    /**
     * @Route("/admin/blogcategeory/", name="admin_category_home")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'sdfasdfsdf');
    }
}
