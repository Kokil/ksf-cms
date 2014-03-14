<?php
namespace Admin\BlogBundle\Controller;

use Admin\BlogBundle\Entity\BlogCategory;
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

    /**
     * @Route("/blogCategory/changeStatus/{id}/", name="admin_blog_category_change_status")
     * @Template()
     */
    public function CategoryStatusChangeAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminBlogBundle:BlogCategory')->findOneByid($id);
        if (!$entity) {
            return $this->render('AdminBlogBundle:BlogCategory:Error.html.twig', array('error' => 'Blog Category Not Found! something went worng.',));
        } else {
            $status = $entity->getStatus();

            $newStatus = ($status ? 0 : 1);

            $updated = date('Y-m-d H:i:s');
            $new = $entity->setStatus($newStatus);
            $updateEntity = new BlogCategory;

            $updateEntity->setStatus($newStatus);
            $updateEntity->setUpdated($updated);
            $em->flush();

            //sleep(20000);

            $this->get('session')->getFlashBag()->add('success', 'Blog Category status updated successfully.');
            return $this->redirect($this->generateUrl('admin_blog_category_home'));
        }

    }

    /**
     * @Route("blogCategory/Add",name="admin_blog_category_add")
     * @Template()
     */
    public function blogCategoryAddAction(Request $request)
    {
        $entity = new BlogCategory();

        if ($request->isMethod('POST')) {
            $date = date('Y-m-d H:i:s');

            $entity->setName($request->request->get('name'));
            $entity->setDescription‎($request->request->get('description‎'));
            $entity->setStatus($request->request->get('status'));
            $entity->setAdded($date);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Blog Category added successfully.');
            return $this->redirect($this->generateUrl('admin_blog_category_home'));
        }

        return $this->render('AdminBlogBundle:BlogCategory:add.html.twig');

    }

    /**
     * @Route("/blogCategory/edit/{id}/", name="admin_blog_category_edit")
     * @Template()
     */
    public function blogCategoryEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminBlogBundle:BlogCategory')->find($id);

        if (!$entity) {
            return $this->render('AdminBlogBundle:BlogCategory:Error.html.twig', array('error' => 'Blog Category Not Found! something went worng.',));
        }

        if ($request->isMethod('POST')) {

            $entity->setName($request->request->get('name'));
            $entity->setDescription‎($request->request->get('description‎'));
            $entity->setStatus($request->request->get('status'));
            $entity->setUpdated(date('Y-m-d H:i:s'));
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Blog updated successfully.');
            return $this->redirect($this->generateUrl('admin_blog_category_home'));

        }



        return $this->render('AdminBlogBundle:BlogCategory:edit.html.twig', array('entity' => $entity));
    }

    /**
     * @Route("/blogCategory/delete/{id}",name="admin_blog_category_delete")
     */
    public function blogCategoryDeleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $BlogCategory = $em->getRepository('AdminBlogBundle:BlogCategory')->findOneByid($id);

        if (!$BlogCategory) {
             return $this->render('AdminBlogBundle:BlogCategory:Error.html.twig', array('error' => 'Blog Category Not Found! something went worng.',));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($BlogCategory);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Blog Category deleted successfully.');
        return $this->redirect($this->generateUrl('admin_blog_category_home'));
    }


}
