<?php
namespace Admin\BlogBundle\Controller;

use Admin\BlogBundle\Entity\BlogCategoy;
use Admin\BlogBundle\Form\BlogCategoryType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FileField;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogCategoryController extends Controller {
    /**
     * @Route("/blogCategory/", name="admin_blog_category_home")
     * @Template()
     */
    public function blogCategoryAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AdminBlogBundle:BlogCategory')->findAll();
        return $this->render('AdminBlogBundle:BlogCategory:index.html.twig', array('entities' => $entities,));
    }
}
