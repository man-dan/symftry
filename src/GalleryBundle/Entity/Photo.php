<?php

namespace GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Gallery
 *
 * @ORM\Table(name="photos")
 * @ORM\Entity(repositoryClass="GalleryBundle\Repository\PhotoRepository")
 * @FileStore\Uploadable
 */
class Photo
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
     * @Assert\DateTime()
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="GalleryBundle\Entity\Gallery", inversedBy="gphotos")
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    private $photos;

    public function __toString()
    {
        if(is_null($this->title))
            return 'Null';
        return $this->title;
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
     * @return Photo
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
     * @return Photo
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Photo
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
     * Set photo
     *
     * @param array $photo
     *
     * @return Photo
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

    /**
     * Set photos
     *
     * @param \GalleryBundle\Entity\Gallery $photos
     *
     * @return Photo
     */
    public function setPhotos(\GalleryBundle\Entity\Gallery $photos = null)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return \GalleryBundle\Entity\Gallery
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}
