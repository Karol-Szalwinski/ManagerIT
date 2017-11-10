<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * License
 *
 * @ORM\Table(name="license")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\LicenseRepository")
 */
class License
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
     * @ORM\Column(name="licenseKey", type="string", length=255, unique=true, nullable=true)
     */
    private $licenseKey;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lifetime", type="boolean")
     */
    private $lifetime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="free", type="boolean")
     */
    private $free;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expireDate", type="datetime", nullable=true)
     */
    private $expireDate;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfSites", type="integer", nullable=true)
     */
    private $numberOfSites;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="purchaseDate", type="datetime")
     */
    private $purchaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime")
     */
    private $addDate;

    /**
     * @ORM\ManyToMany(targetEntity="Computer", mappedBy="licenses")
     */
    private $computers;

    
    /**
     * @ORM\ManyToMany(targetEntity="Employee", mappedBy="licenses")
     */
    private $employees;


    /**
     * @ORM\OneToMany(targetEntity="InstalledApplication", mappedBy="license")
     */
    private $installedApplications;
    
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->computers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->installedApplications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addDate = new \DateTime();
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
     * @return License
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
     * Set licenseKey
     *
     * @param string $licenseKey
     * @return License
     */
    public function setLicenseKey($licenseKey)
    {
        $this->licenseKey = $licenseKey;

        return $this;
    }

    /**
     * Get licenseKey
     *
     * @return string 
     */
    public function getLicenseKey()
    {
        return $this->licenseKey;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return License
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
     * Set brand
     *
     * @param string $brand
     * @return License
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
     * Set format
     *
     * @param string $format
     * @return License
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set lifetime
     *
     * @param boolean $lifetime
     * @return License
     */
    public function setLifetime($lifetime)
    {
        $this->lifetime = $lifetime;

        return $this;
    }

    /**
     * Get lifetime
     *
     * @return boolean 
     */
    public function getLifetime()
    {
        return $this->lifetime;
    }

    /**
     * Set free
     *
     * @param boolean $free
     * @return License
     */
    public function setFree($free)
    {
        $this->free = $free;

        return $this;
    }

    /**
     * Get free
     *
     * @return boolean 
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * Set expireDate
     *
     * @param \DateTime $expireDate
     * @return License
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * Get expireDate
     *
     * @return \DateTime 
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * Set numberOfSites
     *
     * @param integer $numberOfSites
     * @return License
     */
    public function setNumberOfSites($numberOfSites)
    {
        $this->numberOfSites = $numberOfSites;

        return $this;
    }

    /**
     * Get numberOfSites
     *
     * @return integer 
     */
    public function getNumberOfSites()
    {
        return $this->numberOfSites;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return License
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return License
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set purchaseDate
     *
     * @param \DateTime $purchaseDate
     * @return License
     */
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    /**
     * Get purchaseDate
     *
     * @return \DateTime 
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     * @return License
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return \DateTime 
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Add computers
     *
     * @param \ManagerITBundle\Entity\Computer $computers
     * @return License
     */
    public function addComputer(\ManagerITBundle\Entity\Computer $computers)
    {
        $this->computers[] = $computers;

        return $this;
    }

    /**
     * Remove computers
     *
     * @param \ManagerITBundle\Entity\Computer $computers
     */
    public function removeComputer(\ManagerITBundle\Entity\Computer $computers)
    {
        $this->computers->removeElement($computers);
    }

    /**
     * Get computers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComputers()
    {
        return $this->computers;
    }

    /**
     * Add employees
     *
     * @param \ManagerITBundle\Entity\Employee $employees
     * @return License
     */
    public function addEmployee(\ManagerITBundle\Entity\Employee $employees)
    {
        $this->employees[] = $employees;

        return $this;
    }

    /**
     * Remove employees
     *
     * @param \ManagerITBundle\Entity\Employee $employees
     */
    public function removeEmployee(\ManagerITBundle\Entity\Employee $employees)
    {
        $this->employees->removeElement($employees);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Add installedApplications
     *
     * @param \ManagerITBundle\Entity\InstalledApplication $installedApplications
     * @return License
     */
    public function addInstalledApplication(\ManagerITBundle\Entity\InstalledApplication $installedApplications)
    {
        $this->installedApplications[] = $installedApplications;

        return $this;
    }

    /**
     * Remove installedApplications
     *
     * @param \ManagerITBundle\Entity\InstalledApplication $installedApplications
     */
    public function removeInstalledApplication(\ManagerITBundle\Entity\InstalledApplication $installedApplications)
    {
        $this->installedApplications->removeElement($installedApplications);
    }

    /**
     * Get installedApplications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInstalledApplications()
    {
        return $this->installedApplications;
    }
}
