<?php

namespace Admin\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="Blog")
 * @ORM\Entity(repositoryClass="Admin\BlogBundle\Entity\BlogRepository")
 */
class Blog
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
     * @ORM\Column(name="title", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="short", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $short;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $detail;

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
     * @var \Admin\BlogBundle\Entity\BlogCategory
     *
     * @ORM\ManyToOne(targetEntity="Admin\BlogBundle\Entity\BlogCategory", inversedBy="Blog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id", nullable=true)
     * })
     */
    private $category;


}
