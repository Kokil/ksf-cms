<?php

namespace Admin\BlogBundle\Controller;

use Admin\BlogBundle\Entity\Blog;
use Admin\BlogBundle\Form\BlogType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FileField;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller {
    /**
     * @Route("/", name="admin_blog_home")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AdminBlogBundle:Blog')->findAll();
        return $this->render('AdminBlogBundle:Blog:index.html.twig', array('entities' => $entities,));
    }
    /**
     * @Route("/new/", name="admin_blog_add")
     * @Template()
     */
    public function addAction(Request $request) {
        $entity = new blog();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $date = date('Y-m-d H:i:s');
        $uploadDirectory = '%kernel.root_dir%/../uploads/blog/';

        if ($request->isMethod('POST')) {

          $data = $request->request->all();
          $category = (int) $data['admin_blogbundle_blog']['category'];
            $MAXIMUM_FILESIZE = 30 * 1024 * 1024;
            $rEFileTypes ="/^\.(jpg|jpeg|png|gif){1}$/i";
            $dir_base = $uploadDirectory ;

            $isFile = is_uploaded_file($_FILES['image']['tmp_name']);
            if ($isFile)
               {
                $safe_filename = preg_replace(array("/\s+/", "/[^-\.\w]+/"),array("_", ""),trim($_FILES['image']['name']));
                $ext = strrchr($safe_filename, '.');
                $new_photo_name = "blog".$safe_filename[0]."_".mt_rand(1,10000);
                if ($_FILES['image']['size'] <= $MAXIMUM_FILESIZE &&
                    preg_match($rEFileTypes, strrchr($safe_filename, '.')))
                  {$isMove = move_uploaded_file (
                             $_FILES['image']['tmp_name'],
                             $dir_base.$new_photo_name.$ext
                             );

                  }
                 else if (preg_match($rEFileTypes, strrchr($safe_filename, '.'))==false)
                  {
                      die('Warning : Invalid Image File!');

                  }
                   else if ($_FILES['image']['size'] > $MAXIMUM_FILESIZE)
                  {
                    die("Warning : The size of the image shouldn't be more than 1MB!");
                  }
            }

            $blogImage = isset($isMove) ? $new_photo_name.$ext : NULL;
            $title = $this->get('request')->request->get('title');
            $entity->setTitle($request->request->get('title'));
            $entity->getCategory($category);
            $entity->setAuthor($request->request->get('author'));
            $entity->setSlug(preg_replace('/[^A-Za-z0-9-]+/', '-', $title));
            $entity->setShort($request->request->get('short'));
            $entity->setImage($blogImage);
            $entity->setDetail($request->request->get('detail'));
            $entity->setStatus($request->request->get('status'));
            $entity->setAdded($date);
            $entity->setUpdated('0000-00-00 00:00:00');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            //$this->get('session')->setFlash('success', 'Blog Added.');
            $this->get('session')->getFlashBag()->add('success','Blog added and published successfully.'
        );
            return $this->redirect($this->generateUrl('admin_blog_home'));

        }

        return $this->render('AdminBlogBundle:Blog:add.html.twig', array('form' => $form->createView()));
    }

    /**
     *
     * @Route("statusUpdate/{id}", name="blog_status_update")
     * @Method("GET")
     */
    public function StatusUpdateAction(Request $request, $id)
    {

      $em = $this->getDoctrine()->getManager();
      $entity=$em->getRepository('AdminBlogBundle:Blog')->findOneByid($id);
      if (!$entity) {
          return $this->render('AdminBlogBundle:Blog:Error.html.twig', array('error' => 'Blog Not Found! something went worng.',));
      }
      else
      {
        $status=$entity->getStatus();
        $newStatus = ($status ? 0 : 1);
        $updated = date('Y-m-d H:i:s');
        $new=$entity->setStatus($newStatus);
        $updateEntity = new blog();

        $updateEntity->setStatus($newStatus);
        $updateEntity->setUpdated($updated);
        //$em = $this->getDoctrine()->getManager();
        //$em->persist($updateEntity);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success','Blog status updated successfully.');
        return $this->redirect($this->generateUrl('admin_blog_home'));

      }

    }

    /**
     *
     * @Route("editBlog/{id}", name="blog_admin_edit")
     * @Method("GET")
     */
    public function editBlogAction(Request $request, $id)
    {
        echo 'Edit blog of id: '.$id; die();
    }

    /**
     *
     * @Route("editDelete/{id}", name="blog_admin_delete")
     * @Method("GET")
     */
    public function deleteBlogAction(Request $request, $id)
    {
        echo 'delete blog of id: '.$id; die();
    }


    private function createCreateForm(blog $entity) {
        $form = $this->createForm(new BlogType(), $entity, array('action' => $this->generateUrl('admin_blog_add'), 'method' => 'POST',));

        $form->add('submit', 'submit', array('label' => 'Create', 'attr' => array('class' => 'btn btn-info')));

        return $form;
    }
}
