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
        $date=date('Y-m-d H:i:s');//die();

        if ($request->isMethod('POST')) {
            $title = $this->get('request')->request->get('title');
            $entity->setTitle($request->request->get('title'));
            $entity->setCategory($request->request->get('category'));
            $entity->setAuthor($request->request->get('author'));
            $entity->setSlug(preg_replace('/[^A-Za-z0-9-]+/', '-', $title));
            $entity->setShort($request->request->get('short'));
            $entity->setImage('logo.png');
            $entity->setDetail($request->request->get('detail'));
            $entity->setStatus($request->request->get('status'));
            $entity->setAdded(date("Y-m-d H:i:s"));
            $entity->setUpdated('0000-00-00 00:00:00');
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
