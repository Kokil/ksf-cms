<?php
namespace Admin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Admin\AdminBundle\Form\EditProfileType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FileField;
use Admin\AdminBundle\Entity\Admin;
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

        $user = $this->get('security.context')->getToken()->getUser();
        $id=$user->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminAdminBundle:Admin')->find($id);
        $form = $this->createForm(new EditProfileType(), $entity, array('action' => $this->generateUrl('editProfile'), 'method' => 'POST',));

        if ($request->isMethod('POST')) {

            $entity->setFirstname($request->request->get('firstname'));
            $entity->setLastname($request->request->get('lastname'));
            $entity->setAddress($request->request->get('address'));
            $entity->setGender($request->request->get('gender'));
            $entity->setUpdated(date('Y-m-d H:i:s'));
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Profile Updated successfully.');
            return $this->redirect($this->generateUrl('editProfile'));

        }

        return $this->render('AdminAdminBundle:Admin:editprofile.html.twig', array('entity' => $user, 'edit_form' => $form->createView(),));
    }

    /**
     * @Route("/admin/changePassword/", name="admin_change_password");
     */

    public function changePasswordAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $id=$user->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminAdminBundle:Admin')->find($id);

        $password=$user->getPassword();

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $oldpassword=$encoder->encodePassword('kokilthapa', $user->getSalt());

        $oldpassword1=$encoder->encodePassword('sdfsdfsdfsdf', $user->getSalt());


        var_dump($oldpassword);
        var_dump($oldpassword1);
        die();


        if ($request->isMethod('POST')) {

            $userOldPassword=$request->request->get('oldpassword');
            $userNewPassword=$request->request->get('newpassword');
            $userNewConfirmPassword=$request->request->get('confirmpassword');
            $encoder = $this->encoder->getEncoder($user);



            /*$encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
            $UserinputoldEncryptedPassword=$user->getPassword($encoder->encodePassword($userOldPassword, $user->getSalt()));
            */

            $plainCurrentPassword = $request->request->get('oldpassword');


                    $encoded = $encoder->encodePassword($plainCurrentPassword, $user->getSalt());
                    echo $encoded;


            if($password===$UserinputoldEncryptedPassword){

                echo $userOldPassword;



            }
            else {

                echo 'sdfasd';die();

            $this->get('session')->getFlashBag()->add('error', 'Your old password is wrong !!!');
            return $this->redirect($this->generateUrl('admin_change_password'));

            }

            die();

            /*
            Update Password ....
             */


        }

        return $this->render('AdminAdminBundle:Admin:changePassword.html.twig', array('entity' => $user));
    }

    private function createEditForm(blog $entity) {
        $form = $this->createForm(new BlogType(), $entity, array('action' => $this->generateUrl('blog_admin_edit'), 'method' => 'PUT',));

        return $form;
    }

    private function encodePassword($user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}
