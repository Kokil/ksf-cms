<?php
// src/Yoda/UserBundle/DataFixtures/ORM/LoadUsers.php
namespace Admin\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Admin\AdminBundle\Entity\Admin;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUsers implements FixtureInterface, ContainerAwareInterface
{
	private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    private function encodePassword($user, $plainPassword)
	{
	    $encoder = $this->container->get('security.encoder_factory')
	        ->getEncoder($user)
	    ;

	    return $encoder->encodePassword($plainPassword, $user->getSalt());
	}
	public function load(ObjectManager $manager)
	{	// admin User
	    $admin = new Admin();
	    $admin->setUsername('admin');
		$admin->setSalt(md5(uniqid()));
     	$encoder = $this->container->get('security.encoder_factory')->getEncoder($admin);
        $admin->setPassword($encoder->encodePassword('admin', $admin->getSalt()));
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setIsActive(true);
        $admin->setEmail('admin@admin.com');
	    $manager->persist($admin);

	    // Normal user
	    /*$User = new User();
	    $User->setUsername('user');
		$User->setSalt(md5(uniqid()));
     	$encoder = $this->container->get('security.encoder_factory')->getEncoder($User);
        $User->setPassword($encoder->encodePassword('user', $User->getSalt()));
        $admin->setRoles(array('ROLE_USER'));
        $User->setIsActive(false);
        $User->setEmail('user@user.com');
	    $User->persist($User);
	    */

	    $manager->flush();
	}
}