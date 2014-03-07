<?php

namespace Admin\BlogBundle\Controller;

use Admin\BlogBundle\Entity\Blog;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller
{
    /**
     * @Route("/", name="admin_blog_home")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'sdfasdf');
    }

    /**
     * @Route("/new/", name="admin_blog_add")
     * @Template()
     */
    public function addAction()
    {
        return array('name' => 'sdfasdf');
    }
}
