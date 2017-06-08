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
     * @Assert\DateTime()
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Newsn", inversedBy="galleries")
     * @ORM\JoinColumn(name="fnews_id", referencedColumnName="id")
     */
    private $fnews;

    /**
     *@ORM\OneToMany(targetEntity="GalleryBundle\Entity\Photo", mappedBy="gallery")
     */
    private $gphotos;

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
     * Set fnews
     *
     * @param \AppBundle\Entity\Newsn $fnews
     *
     * @return Photo
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
     * Constructor
     */
    public function __construct()
    {
        $this->gphotos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add gphoto
     *
     * @param \GalleryBundle\Entity\Photo $gphoto
     *
     * @return Gallery
     */
    public function addGphoto(\GalleryBundle\Entity\Photo $gphoto)
    {
        $this->gphotos[] = $gphoto;

        return $this;
    }

    /**
     * Remove gphoto
     *
     * @param \GalleryBundle\Entity\Photo $gphoto
     */
    public function removeGphoto(\GalleryBundle\Entity\Photo $gphoto)
    {
        $this->gphotos->removeElement($gphoto);
    }

    /**
     * Get gphotos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGphotos()
    {
        return $this->gphotos;
    }
}
