<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Computer
 *
 * @ORM\Table(name="computer")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\ComputerRepository")
 */
class Computer
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
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="formFactor", type="string", length=255)
     */
    private $formFactor;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="series", type="string", length=255)
     */
    private $series;

    /**
     * @var string
     *
     * @ORM\Column(name="cpu", type="string", length=255)
     */
    private $cpu;

    /**
     * @var string
     *
     * @ORM\Column(name="ramslots", type="string", length=255)
     */
    private $ramslots;

    /**
     * @var string
     *
     * @ORM\Column(name="pciInterfaces", type="string", length=255)
     */
    private $pciInterfaces;

    /**
     * @var string
     *
     * @ORM\Column(name="storageControllers", type="string", length=255)
     */
    private $storageControllers;

    /**
     * @var string
     *
     * @ORM\Column(name="powerSupply", type="string", length=255)
     */
    private $powerSupply;

    /**
     * @var string
     *
     * @ORM\Column(name="caseType", type="string", length=255)
     */
    private $caseType;

    /**
     * @var string
     *
     * @ORM\Column(name="os", type="string", length=255)
     */
    private $os;

    /**
     * @var string
     *
     * @ORM\Column(name="ipAddresss", type="string", length=255)
     */
    private $ipAddresss;

    /**
     * @var string
     *
     * @ORM\Column(name="macAddress", type="string", length=255)
     */
    private $macAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)
     */
    private $picture;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="purchaseDate", type="datetime", nullable=true)
     */
    private $purchaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime")
     */
    private $addDate;

    /**
     * @var string
     *
     * @ORM\Column(name="licenses", type="string", length=255)
     */
    private $licenses;

    /**
     * @var string
     *
     * @ORM\Column(name="employees", type="string", length=255)
     */
    private $employees;

    /**
     * @var string
     *
     * @ORM\Column(name="battery", type="string", length=255, nullable=true)
     */
    private $battery;

    /**
     * @var float
     *
     * @ORM\Column(name="screenSize", type="float", nullable=true)
     */
    private $screenSize;

    /**
     * @var string
     *
     * @ORM\Column(name="screenType", type="string", length=255, nullable=true)
     */
    private $screenType;


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
     * @return Computer
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
     * Set model
     *
     * @param string $model
     * @return Computer
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
     * Set formFactor
     *
     * @param string $formFactor
     * @return Computer
     */
    public function setFormFactor($formFactor)
    {
        $this->formFactor = $formFactor;

        return $this;
    }

    /**
     * Get formFactor
     *
     * @return string 
     */
    public function getFormFactor()
    {
        return $this->formFactor;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return Computer
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
     * Set series
     *
     * @param string $series
     * @return Computer
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return string 
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     * @return Computer
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return string 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set ramslots
     *
     * @param string $ramslots
     * @return Computer
     */
    public function setRamslots($ramslots)
    {
        $this->ramslots = $ramslots;

        return $this;
    }

    /**
     * Get ramslots
     *
     * @return string 
     */
    public function getRamslots()
    {
        return $this->ramslots;
    }

    /**
     * Set pciInterfaces
     *
     * @param string $pciInterfaces
     * @return Computer
     */
    public function setPciInterfaces($pciInterfaces)
    {
        $this->pciInterfaces = $pciInterfaces;

        return $this;
    }

    /**
     * Get pciInterfaces
     *
     * @return string 
     */
    public function getPciInterfaces()
    {
        return $this->pciInterfaces;
    }

    /**
     * Set storageControllers
     *
     * @param string $storageControllers
     * @return Computer
     */
    public function setStorageControllers($storageControllers)
    {
        $this->storageControllers = $storageControllers;

        return $this;
    }

    /**
     * Get storageControllers
     *
     * @return string 
     */
    public function getStorageControllers()
    {
        return $this->storageControllers;
    }

    /**
     * Set powerSupply
     *
     * @param string $powerSupply
     * @return Computer
     */
    public function setPowerSupply($powerSupply)
    {
        $this->powerSupply = $powerSupply;

        return $this;
    }

    /**
     * Get powerSupply
     *
     * @return string 
     */
    public function getPowerSupply()
    {
        return $this->powerSupply;
    }

    /**
     * Set caseType
     *
     * @param string $caseType
     * @return Computer
     */
    public function setCaseType($caseType)
    {
        $this->caseType = $caseType;

        return $this;
    }

    /**
     * Get caseType
     *
     * @return string 
     */
    public function getCaseType()
    {
        return $this->caseType;
    }

    /**
     * Set os
     *
     * @param string $os
     * @return Computer
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return string 
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Set ipAddresss
     *
     * @param string $ipAddresss
     * @return Computer
     */
    public function setIpAddresss($ipAddresss)
    {
        $this->ipAddresss = $ipAddresss;

        return $this;
    }

    /**
     * Get ipAddresss
     *
     * @return string 
     */
    public function getIpAddresss()
    {
        return $this->ipAddresss;
    }

    /**
     * Set macAddress
     *
     * @param string $macAddress
     * @return Computer
     */
    public function setMacAddress($macAddress)
    {
        $this->macAddress = $macAddress;

        return $this;
    }

    /**
     * Get macAddress
     *
     * @return string 
     */
    public function getMacAddress()
    {
        return $this->macAddress;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Computer
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Computer
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
     * @return Computer
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
     * @return Computer
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
     * Set licenses
     *
     * @param string $licenses
     * @return Computer
     */
    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;

        return $this;
    }

    /**
     * Get licenses
     *
     * @return string 
     */
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * Set employees
     *
     * @param string $employees
     * @return Computer
     */
    public function setEmployees($employees)
    {
        $this->employees = $employees;

        return $this;
    }

    /**
     * Get employees
     *
     * @return string 
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Set battery
     *
     * @param string $battery
     * @return Computer
     */
    public function setBattery($battery)
    {
        $this->battery = $battery;

        return $this;
    }

    /**
     * Get battery
     *
     * @return string 
     */
    public function getBattery()
    {
        return $this->battery;
    }

    /**
     * Set screenSize
     *
     * @param float $screenSize
     * @return Computer
     */
    public function setScreenSize($screenSize)
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    /**
     * Get screenSize
     *
     * @return float 
     */
    public function getScreenSize()
    {
        return $this->screenSize;
    }

    /**
     * Set screenType
     *
     * @param string $screenType
     * @return Computer
     */
    public function setScreenType($screenType)
    {
        $this->screenType = $screenType;

        return $this;
    }

    /**
     * Get screenType
     *
     * @return string 
     */
    public function getScreenType()
    {
        return $this->screenType;
    }
}
