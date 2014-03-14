<?php

namespace Admin\SettingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="Blog", indexes={@ORM\Index(name="IDX_6027FE7D64C19C1", columns={"category"})})
 * @ORM\Entity
 */
class Blog
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=false)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="short", type="text", nullable=false)
     */
    private $short;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="text", nullable=false)
     */
    private $detail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="added", type="string", length=20, nullable=false)
     */
    private $added;

    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="string", length=20, nullable=false)
     */
    private $updated;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Admin\SettingBundle\Entity\Blogcategory
     *
     * @ORM\ManyToOne(targetEntity="Admin\SettingBundle\Entity\Blogcategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;


}
