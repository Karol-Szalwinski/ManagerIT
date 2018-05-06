<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NetworkDevice
 *
 * @ORM\Table(name="network_device")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\NetworkDeviceRepository")
 */
class NetworkDevice
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=255, nullable=true)
     */
    private $serial;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="mac", type="string", length=255, nullable=true)
     */
    private $mac;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;
    

    /**
     * @ORM\ManyToMany(targetEntity="Picture")
     * @ORM\JoinTable(name="network_devices_pictures",
     *      joinColumns={@ORM\JoinColumn(name="network_device_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="picture_id", referencedColumnName="id")}
     *      )
     */
    private $pictures;

    /**
     * @ORM\OneToMany(targetEntity="Password", mappedBy="networkDevice", cascade={"remove"})
     */
    private $passwords;


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
     * @return NetworkDevice
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
     * Set brand
     *
     * @param string $brand
     * @return NetworkDevice
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return NetworkDevice
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set serial
     *
     * @param string $serial
     * @return NetworkDevice
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return NetworkDevice
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return NetworkDevice
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return NetworkDevice
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set mac
     *
     * @param string $mac
     * @return NetworkDevice
     */
    public function setMac($mac)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * Get mac
     *
     * @return string 
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * Set passwords
     *
     * @param string $passwords
     * @return NetworkDevice
     */
    public function setPasswords($passwords)
    {
        $this->passwords = $passwords;

        return $this;
    }

    /**
     * Get passwords
     *
     * @return string 
     */
    public function getPasswords()
    {
        return $this->passwords;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return NetworkDevice
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pictures
     *
     * @param \ManagerITBundle\Entity\Picture $pictures
     * @return NetworkDevice
     */
    public function addPicture(\ManagerITBundle\Entity\Picture $pictures)
    {
        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \ManagerITBundle\Entity\Picture $pictures
     */
    public function removePicture(\ManagerITBundle\Entity\Picture $pictures)
    {
        $this->pictures->removeElement($pictures);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Add passwords
     *
     * @param \ManagerITBundle\Entity\Password $passwords
     * @return NetworkDevice
     */
    public function addPassword(\ManagerITBundle\Entity\Password $passwords)
    {
        $this->passwords[] = $passwords;

        return $this;
    }

    /**
     * Remove passwords
     *
     * @param \ManagerITBundle\Entity\Password $passwords
     */
    public function removePassword(\ManagerITBundle\Entity\Password $passwords)
    {
        $this->passwords->removeElement($passwords);
    }
}
