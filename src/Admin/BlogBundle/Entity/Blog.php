<?php
namespace Admin\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
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
     * @var integer
     *
     * @ORM\Column(name="category", type="integer")
     */
    private $category;
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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }
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
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    /**
     * Set title
     *
     * @param string $title
     * @return Blog
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }
    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    /**
     * Set category
     *
     * @param string $category
     * @return Blog
     */
    public function setCategory($category) {
        $this->category = $category;

        return $this;
    }
    /**
     * Get category
     *
     * @return string
     */
    public function getCategory() {
        return $this->category;
    }
    /**
     * Set slug
     *
     * @param string $slug
     * @return Blog
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }
    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }
    /**
     * Set short
     *
     * @param string $short
     * @return Blog
     */
    public function setShort($short) {
        $this->short = $short;

        return $this;
    }
    /**
     * Get short
     *
     * @return string
     */
    public function getShort() {
        return $this->short;
    }
    /**
     * Set image
     *
     * @param string $image
     * @return Blog
     */
    public function setImage($image) {
        $this->image = $image;

        return $this;
    }
    /**
     * Get image
     *
     * @return string
     */
    public function getImage() {
        return $this->image;
    }
    /**
     * Set detail
     *
     * @param string $detail
     * @return Blog
     */
    public function setDetail($detail) {
        $this->detail = $detail;

        return $this;
    }
    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail() {
        return $this->detail;
    }
    /**
     * Set status
     *
     * @param boolean $status
     * @return Blog
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }
    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus() {
        return $this->status;
    }
    /**
     * Set added
     *
     * @param \DateTime $added
     * @return Blog
     */
    public function setAdded($added) {
        $this->added = $added;

        return $this;
    }
    /**
     * Get added
     *
     * @return \DateTime
     */
    public function getAdded() {
        return $this->added;
    }
    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Blog
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }
    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated() {
        return $this->updated;
    }
    /**
     * Set author
     *
     * @param string $author
     * @return Blog
     */
    public function setAuthor($author) {
        $this->author = $author;

        return $this;
    }
    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor() {
        return $this->author;
    }
}
