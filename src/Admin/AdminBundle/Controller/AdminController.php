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

        $form = $this->createForm(new EditProfileType(), $user, array('action' => $this->generateUrl('editProfile'), 'method' => 'POST',));

        if ($request->isMethod('POST')) {
            var_dump($_POST);
            /*$form->bind($request);

            if ($form->isValid()) {

                // Save the user
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                // Redirect the user
                $this->get('session')->setFlash('notice', 'Your profile has been updated');
                return new RedirectResponse($this->generateUrl('my_profile'));
            }
            else {

                // Reset to default values or else it will get saved to the session
                $em = $this->getDoctrine()->getManager();
                $em->refresh($user);
                */
            }



        return $this->render('AdminAdminBundle:Admin:editprofile.html.twig', array('entity' => $user, 'edit_form' => $form->createView(),));
    }

    private function createEditForm(blog $entity) {
        $form = $this->createForm(new BlogType(), $entity, array('action' => $this->generateUrl('blog_admin_edit'), 'method' => 'PUT',));

        return $form;
    }
}
