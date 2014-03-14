<?php

namespace Admin\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogCategory
 *
 * @ORM\Table(name="BlogCategory")
 * @ORM\Entity(repositoryClass="Admin\BlogBundle\Entity\BlogCategoryRepository")
 */
class BlogCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description‎", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $description‎;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="added", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $added;

    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Admin\BlogBundle\Entity\Blog", mappedBy="BlogCategory")
     */
    private $blogs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
