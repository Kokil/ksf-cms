<?php
namespace Admin\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * BlogCategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Admin\BlogBundle\Entity\BlogCategoryRepository")
 */
class BlogCategory {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="description‎", type="string", length=255)
     */
    private $description‎;
    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;
    /**
     * @var string
     *
     * @ORM\Column(name="added", type="string", length=20)
     */
    private $added;
    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="string", length=20)
     */
    private $updated;

    /**
     * @ORM\OneToMany(targetEntity="Blog", mappedBy="BlogCategory")
     */
    protected $blogs;

    public function __construct()
    {
        $this->blogs = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BlogCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description‎
     *
     * @param string $description‎
     * @return BlogCategory
     */
    public function setDescription‎($description‎)
    {
        $this->description‎ = $description‎;

        return $this;
    }

    /**
     * Get description‎
     *
     * @return string
     */
    public function getDescription‎()
    {
        return $this->description‎;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return BlogCategory
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set added
     *
     * @param string $added
     * @return BlogCategory
     */
    public function setAdded($added)
    {
        $this->added = $added;

        return $this;
    }

    /**
     * Get added
     *
     * @return string
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set updated
     *
     * @param string $updated
     * @return BlogCategory
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add blogs
     *
     * @param \Admin\BlogBundle\Entity\Blog $blogs
     * @return BlogCategory
     */
    public function addBlog(\Admin\BlogBundle\Entity\Blog $blogs)
    {
        $this->blogs[] = $blogs;

        return $this;
    }

    /**
     * Remove blogs
     *
     * @param \Admin\BlogBundle\Entity\Blog $blogs
     */
    public function removeBlog(\Admin\BlogBundle\Entity\Blog $blogs)
    {
        $this->blogs->removeElement($blogs);
    }

    /**
     * Get blogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlogs()
    {
        return $this->blogs;
    }


    public function __toString()
    {
        return $this->name;
    }
}
