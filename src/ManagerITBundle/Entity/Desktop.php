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
     * @ORM\ManyToMany(targetEntity="OpticalDrive")
     * @ORM\JoinTable(name="desktop_opticaldrive",
     *      joinColumns={@ORM\JoinColumn(name="desktop_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="opticaldrive_id", referencedColumnName="id")}
     *      )
     */
    private $drives;

    /**
     * @var string
     *
     * @ORM\Column(name="powerSupply", type="string", length=255)
     */
    private $powerSupply;

    /**
     * @ORM\ManyToOne(targetEntity="ComputerFormFactor")
     * @ORM\JoinColumn(name="desktopformfactor_id", referencedColumnName="id")
     */
    private $caseType;

    /**
     * @ORM\ManyToOne(targetEntity="Os")
     * @ORM\JoinColumn(name="desktopos_id", referencedColumnName="id")
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
     * @ORM\Column(name="pictures", type="string", length=255, nullable=true)
     *
     *
     * @Assert\File(mimeTypes={ "image/*" })
     */
    private $pictures;

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
        $this->drives = new \Doctrine\Common\Collections\ArrayCollection();
        $this->licenses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addDate = new \DateTime();
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add drive
     *
     * @param \ManagerITBundle\Entity\OpticalDrive $drive
     * @return Desktop
     */
    public function addDrive(\ManagerITBundle\Entity\OpticalDrive $drive)
    {
        $this->drive[] = $drive;

        return $this;
    }

    /**
     * Remove drive
     *
     * @param \ManagerITBundle\Entity\OpticalDrive $drive
     */
    public function removeDrive(\ManagerITBundle\Entity\OpticalDrive $drive)
    {
        $this->drive->removeElement($drive);
    }

    /**
     * Get drive
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDrive()
    {
        return $this->drive;
    }

    /**
     * Set caseType
     *
     * @param \ManagerITBundle\Entity\ComputerFormFactor $caseType
     * @return Desktop
     */
    public function setCaseType(\ManagerITBundle\Entity\ComputerFormFactor $caseType = null)
    {
        $this->caseType = $caseType;

        return $this;
    }

    /**
     * Get caseType
     *
     * @return \ManagerITBundle\Entity\ComputerFormFactor 
     */
    public function getCaseType()
    {
        return $this->caseType;
    }

    /**
     * Set os
     *
     * @param \ManagerITBundle\Entity\Os $os
     * @return Desktop
     */
    public function setOs(\ManagerITBundle\Entity\Os $os = null)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return \ManagerITBundle\Entity\Os 
     */
    public function getOs()
    {
        return $this->os;
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

    /**
     * Get drives
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDrives()
    {
        return $this->drives;
    }

    /**
     * Add pictures
     *
     * @param string $pictures
     * @return Desktop
     */
    public function addPicture($pictures)
    {

        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     *
     */
    public function removePicture($pictures)
    {
        $this->$pictures->removeElement($pictures);
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
}
