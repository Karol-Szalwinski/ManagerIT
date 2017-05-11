<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Desktop
 *
 * @ORM\Table(name="desktop")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\DesktopRepository")
 */
class Desktop
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", length=255)
     */
    private $manufacturer;

    /**
     * @ORM\ManyToOne(targetEntity="DesktopCPU")
     * @ORM\JoinColumn(name="desktopcpu_id", referencedColumnName="id")
     */
    private $cpu;

    /**
     * @ORM\ManyToMany(targetEntity="DesktopRam")
     * @ORM\JoinTable(name="desktop_desktopram",
     *      joinColumns={@ORM\JoinColumn(name="desktop_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="desktopram_id", referencedColumnName="id")}
     *      )
     */
    private $rams;

    /**
     * @ORM\ManyToMany(targetEntity="Hdd")
     * @ORM\JoinTable(name="desktop_hdd",
     *      joinColumns={@ORM\JoinColumn(name="desktop_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="hdd_id", referencedColumnName="id")}
     *      )
     */
    private $hdds;

    /**
     * @ORM\ManyToMany(targetEntity="Ssd")
     * @ORM\JoinTable(name="desktop_ssd",
     *      joinColumns={@ORM\JoinColumn(name="desktop_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ssd_id", referencedColumnName="id")}
     *      )
     */
    private $ssds;

    /**
     * @var string
     *
     * @ORM\Column(name="drive", type="string", length=255, nullable=true)
     */
    private $drive;

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
     * @ORM\Column(name="os", type="string", length=255, nullable=true)
     */
    private $os;

    /**
     * @var string
     *
     * @ORM\Column(name="ipAddress", type="string", length=255, nullable=true)
     */
    private $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="macAddress", type="string", length=255, nullable=true)
     */
    private $macAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Proszę, wgrać obrazek")
     * @Assert\File(mimeTypes={ "image/*" })
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
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
     * @ORM\ManyToMany(targetEntity="License", inversedBy="desktops")
     * @ORM\JoinTable(name="desktops_licenses")
     */
    private $licenses;

    /**
     * @ORM\ManyToMany(targetEntity="Employee", inversedBy="desktops")
     * @ORM\JoinTable(name="employees_desktops")
     */
    private $employees;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rams = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hdds = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ssds = new \Doctrine\Common\Collections\ArrayCollection();
        $this->licenses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addDate = new \DateTime();
        $this->picture = null;
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
     * @return Desktop
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
     * @return Desktop
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
     * Set type
     *
     * @param string $type
     * @return Desktop
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
     * Set manufacturer
     *
     * @param string $manufacturer
     * @return Desktop
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set drive
     *
     * @param string $drive
     * @return Desktop
     */
    public function setDrive($drive)
    {
        $this->drive = $drive;

        return $this;
    }

    /**
     * Get drive
     *
     * @return string
     */
    public function getDrive()
    {
        return $this->drive;
    }

    /**
     * Set powerSupply
     *
     * @param string $powerSupply
     * @return Desktop
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
     * @return Desktop
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
     * @return Desktop
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
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return Desktop
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set macAddress
     *
     * @param string $macAddress
     * @return Desktop
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
     * @return Desktop
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
     * @param string $price
     * @return Desktop
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set purchaseDate
     *
     * @param \DateTime $purchaseDate
     * @return Desktop
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
     * @return Desktop
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
     * Set cpu
     *
     * @param \ManagerITBundle\Entity\DesktopCPU $cpu
     * @return Desktop
     */
    public function setCpu(\ManagerITBundle\Entity\DesktopCPU $cpu = null)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return \ManagerITBundle\Entity\DesktopCPU
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Add rams
     *
     * @param \ManagerITBundle\Entity\DesktopRam $rams
     * @return Desktop
     */
    public function addRam(\ManagerITBundle\Entity\DesktopRam $rams)
    {
        $this->rams[] = $rams;

        return $this;
    }

    /**
     * Remove rams
     *
     * @param \ManagerITBundle\Entity\DesktopRam $rams
     */
    public function removeRam(\ManagerITBundle\Entity\DesktopRam $rams)
    {
        $this->rams->removeElement($rams);
    }

    /**
     * Get rams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRams()
    {
        return $this->rams;
    }

    /**
     * Add hdds
     *
     * @param \ManagerITBundle\Entity\Hdd $hdds
     * @return Desktop
     */
    public function addHdd(\ManagerITBundle\Entity\Hdd $hdds)
    {
        $this->hdds[] = $hdds;

        return $this;
    }

    /**
     * Remove hdds
     *
     * @param \ManagerITBundle\Entity\Hdd $hdds
     */
    public function removeHdd(\ManagerITBundle\Entity\Hdd $hdds)
    {
        $this->hdds->removeElement($hdds);
    }

    /**
     * Get hdds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHdds()
    {
        return $this->hdds;
    }

    /**
     * Add ssds
     *
     * @param \ManagerITBundle\Entity\Ssd $ssds
     * @return Desktop
     */
    public function addSsd(\ManagerITBundle\Entity\Ssd $ssds)
    {
        $this->ssds[] = $ssds;

        return $this;
    }

    /**
     * Remove ssds
     *
     * @param \ManagerITBundle\Entity\Ssd $ssds
     */
    public function removeSsd(\ManagerITBundle\Entity\Ssd $ssds)
    {
        $this->ssds->removeElement($ssds);
    }

    /**
     * Get ssds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSsds()
    {
        return $this->ssds;
    }

    /**
     * Add licenses
     *
     * @param \ManagerITBundle\Entity\License $licenses
     * @return Desktop
     */
    public function addLicense(\ManagerITBundle\Entity\License $licenses)
    {
        $this->licenses[] = $licenses;

        return $this;
    }

    /**
     * Remove licenses
     *
     * @param \ManagerITBundle\Entity\License $licenses
     */
    public function removeLicense(\ManagerITBundle\Entity\License $licenses)
    {
        $this->licenses->removeElement($licenses);
    }

    /**
     * Get licenses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * Add employees
     *
     * @param \ManagerITBundle\Entity\Employee $employees
     * @return Desktop
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
