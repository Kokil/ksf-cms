<?php

namespace Admin\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BlogRepository extends EntityRepository
{
	public function findAll()
    {
        return $this->findBy(array(), array('id' => 'DESC'));
    }

}
