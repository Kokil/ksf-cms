<?php
// src/Admin/AdminBundle/Controller/LoginController.php
namespace Admin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller {
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request) {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('dashboard'));
        }

        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('AdminAdminBundle:Admin:login.html.twig', array(
        // last username entered by the user
        'last_username' => $session->get(SecurityContext::LAST_USERNAME), 'error' => $error,));
    }
    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction() {
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction() {
    }
    /**
     * @Route("/admin/editProfile/", name="editProfile");
     */
    public function editProfileAction()
    {
        var_dump($this->get('security.context'));
        echo 'edit profiel'; die();

    }
}