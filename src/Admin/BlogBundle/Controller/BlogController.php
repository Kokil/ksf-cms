<?php

namespace Admin\BlogBundle\Controller;

use Admin\BlogBundle\Entity\Blog;
use Admin\BlogBundle\Form\BlogType;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
    public function addAction(Request $request)
    {
        $entity = new blog();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        return $this->render('AdminBlogBundle:Blog:add.html.twig', array(
            'form' => $form->createView()
            ));
    }
    private function createCreateForm(blog $entity)
    {
        $form = $this->createForm(new BlogType(), $entity, array(
            'action' => $this->generateUrl('admin_blog_add'),
            'method' => 'POST',
            ));

        $form->add('submit', 'submit', array('label' => 'Create','attr'   =>  array(
            'class'   => 'btn btn-info')
        ));

        return $form;
    }
}
