<?php

namespace Admin\SettingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blogcategory
 *
 * @ORM\Table(name="BlogCategory")
 * @ORM\Entity
 */
class Blogcategory
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

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
     * @ORM\Column(name="updated", type="string", length=20, nullable=true)
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="description‎", type="string", length=255, nullable=false)
     */
    private $description‎;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
