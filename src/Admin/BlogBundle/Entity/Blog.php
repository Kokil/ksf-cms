<?php
namespace Admin\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Blog
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Admin\BlogBundle\Entity\BlogRepository")
 */
class Blog {
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;
    /**
     * @var string
     *
     * @ORM\Column(name="short", type="text")
     */
    private $short;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255 ,nullable=true)
     */
    private $image;
    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="text")
     */
    private $detail;
    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;
    /**
     * @var string
     *
     * @ORM\Column(name="added", type="string", length=20,nullable=true)
     */
    private $added;
    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="string", length=20,nullable=true)
     */
    private $updated;

    /**
     * @ORM\ManyToOne(targetEntity="BlogCategory", inversedBy="Blog")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    protected $category;

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
     * Set title
     *
     * @param string $title
     * @return Blog
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Blog
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Blog
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set short
     *
     * @param string $short
     * @return Blog
     */
    public function setShort($short)
    {
        $this->short = $short;

        return $this;
    }

    /**
     * Get short
     *
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Blog
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Blog
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Blog
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
     * @return Blog
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
     * @return Blog
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
     * Set category
     *
     * @param \Admin\BlogBundle\Entity\BlogCategory $category
     * @return Blog
     */
    public function setCategory(\Admin\BlogBundle\Entity\BlogCategory $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Admin\BlogBundle\Entity\BlogCategory
     */
    public function getCategory()
    {
        return $this->category;
    }
}
