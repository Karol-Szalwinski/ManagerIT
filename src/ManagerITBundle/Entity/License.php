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
     * @ORM\Column(name="licenseKey", type="string", length=255, unique=true)
     */
    private $licenseKey;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expireDate", type="datetimetz", nullable=true)
     */
    private $expireDate;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
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
     * @ORM\ManyToMany(targetEntity="Desktop", mappedBy="licenses")
     */
    private $desktops;
    
    /**
     * @ORM\ManyToMany(targetEntity="Laptop", mappedBy="licenses")
     */
    private $laptops;
    
    /**
     * @ORM\ManyToMany(targetEntity="Employee", mappedBy="licenses")
     */
    private $employees;
    
    
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
     * Constructor
     */
    public function __construct()
    {
        $this->desktops = new \Doctrine\Common\Collections\ArrayCollection();
        $this->laptops = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addDate = new \DateTime();
    }

    /**
     * Add desktops
     *
     * @param \ManagerITBundle\Entity\Desktop $desktops
     * @return License
     */
    public function addDesktop(\ManagerITBundle\Entity\Desktop $desktops)
    {
        $this->desktops[] = $desktops;

        return $this;
    }

    /**
     * Remove desktops
     *
     * @param \ManagerITBundle\Entity\Desktop $desktops
     */
    public function removeDesktop(\ManagerITBundle\Entity\Desktop $desktops)
    {
        $this->desktops->removeElement($desktops);
    }

    /**
     * Get desktops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDesktops()
    {
        return $this->desktops;
    }

    /**
     * Add laptops
     *
     * @param \ManagerITBundle\Entity\Laptop $laptops
     * @return License
     */
    public function addLaptop(\ManagerITBundle\Entity\Laptop $laptops)
    {
        $this->laptops[] = $laptops;

        return $this;
    }

    /**
     * Remove laptops
     *
     * @param \ManagerITBundle\Entity\Laptop $laptops
     */
    public function removeLaptop(\ManagerITBundle\Entity\Laptop $laptops)
    {
        $this->laptops->removeElement($laptops);
    }

    /**
     * Get laptops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLaptops()
    {
        return $this->laptops;
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
}
