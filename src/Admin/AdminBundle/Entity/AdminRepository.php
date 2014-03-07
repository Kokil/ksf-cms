<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

/**
 * AdminRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdminRepository extends EntityRepository implements UserProviderInterface
{
	public function findOneByUsernameOrEmail($username)
	{
	    return $this->createQueryBuilder('u')
	        ->andWhere('u.username = :username OR u.email = :email')
	        ->setParameter('username', $username)
	        ->setParameter('email', $username)
	        ->getQuery()
	        ->getOneOrNullResult()
	    ;
	}
	public function loadUserByUsername($username)
    {
        $user = $this->findOneByUsernameOrEmail($username);

        if (!$user) {
            throw new UsernameNotFoundException('No user found for username '.$username);
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf(
                'Instances of "%s" are not supported.',
                $class
            ));
        }

        return $this->find($user->getId());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() === $class
            || is_subclass_of($class, $this->getEntityName());
    }


}