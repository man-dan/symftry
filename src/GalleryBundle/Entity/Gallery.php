<?php

namespace GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="GalleryBundle\Repository\GalleryRepository")
 * @FileStore\Uploadable
 */
class Gallery
{
    /**
     * @var int
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
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="array")
     * @Assert\File( maxSize="20M")
     * @FileStore\UploadableField(mapping="photo")
     **/
    private $photo;

    /**
     * @ORM\Column(name="topic", type="string", length=255)
     */
    private $topic;

    /**
     * @Assert\DateTime()
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Newsn", inversedBy="galleries")
     * @ORM\JoinColumn(name="fnews_id", referencedColumnName="id")
     */
    private $fnews;

    public function __toString()
    {
        if(is_null($this->topic))
            return 'Null';
        return $this->topic;
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Gallery
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Gallery
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set fnews
     *
     * @param \AppBundle\Entity\Newsn $fnews
     *
     * @return Gallery
     */
    public function setFnews(\AppBundle\Entity\Newsn $fnews = null)
    {
        $this->fnews = $fnews;

        return $this;
    }

    /**
     * Get fnews
     *
     * @return \AppBundle\Entity\Newsn
     */
    public function getFnews()
    {
        return $this->fnews;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Gallery
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set topic
     *
     * @param string $topic
     *
     * @return Gallery
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this->topic;
    }

    /**
     * Get topic
     *
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set photo
     *
     * @param array $photo
     *
     * @return Gallery
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return array
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}
