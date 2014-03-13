<?php
namespace Admin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Admin\AdminBundle\Form\EditProfileType;




use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FileField;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller {
    /**
     * @Route("/admin/", name="admin");
     */
    public function indexAction() {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('dashboard'));
        } else {
            return $this->render('AdminAdminBundle:Admin:login.html.twig', array('error' => 'Please login to access Admin panel.',));
        }
    }
    /**
     * @Route("/admin/editProfile/", name="editProfile");
     */
    public function editProfileAction(Request $request) {
        //var_dump($_POST);

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $id=1;

        $entity = $em->getRepository('AdminAdminBundle:Admin')->find($id);

        $form = $this->createForm(new EditProfileType(), $entity, array('action' => $this->generateUrl('editProfile'), 'method' => 'POST',));

        if ($request->isMethod('POST')) {

            $em->flush();

           // return $this->redirect($this->generateUrl('profile'));
        }

        return $this->render('AdminAdminBundle:Admin:editprofile.html.twig', array('entity' => $user, 'edit_form' => $form->createView(),));
    }

    private function createEditForm(blog $entity) {
        $form = $this->createForm(new BlogType(), $entity, array('action' => $this->generateUrl('blog_admin_edit'), 'method' => 'PUT',));

        return $form;
    }
}
