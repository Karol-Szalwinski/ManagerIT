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
     * @ORM\ManyToOne(targetEntity="DesktopCPU")
     *
     * @ORM\JoinColumn(name="computercpu_id", referencedColumnName="id")
     */
    private $cpu;

    /**
     * @ORM\OneToMany(targetEntity="RamSlot", mappedBy="computer", cascade={"remove"})
     */
    private $ramslots;

    /**
     * @ORM\OneToMany(targetEntity="InterfacePci", mappedBy="computer", cascade={"remove"})
     */
    private $pciInterfaces;

    /**
     * @ORM\OneToMany(targetEntity="StorageController", mappedBy="computer", cascade={"remove"})
     */
    private $storageControllers;

    /**
     * @ORM\ManyToOne(targetEntity="PowerSupply")
     *
     * @ORM\JoinColumn(name="powersupply_id", referencedColumnName="id")
     */
    private $powerSupply;

    /**
     * @ORM\ManyToOne(targetEntity="ComputerFormFactor")
     *
     * @ORM\JoinColumn(name="computerformfactor_id", referencedColumnName="id")
     */
    private $caseType;

    /**
     * @ORM\ManyToOne(targetEntity="Os")
     *
     * @ORM\JoinColumn(name="computeros_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="Picture")
     * @ORM\JoinTable(name="computers_pictures",
     *      joinColumns={@ORM\JoinColumn(name="computer_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="picture_id", referencedColumnName="id")}
     *      )
     */
    private $pictures;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
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
     * @ORM\ManyToMany(targetEntity="License", inversedBy="computers")
     *
     * @ORM\JoinTable(name="computers_licenses")
     */
    private $licenses;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="computers")
     *
     * @ORM\JoinTable(name="users_computers")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="Employee", inversedBy="computers")
     *
     * @ORM\JoinTable(name="employees_computers")
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
     * @ORM\OneToMany(targetEntity="NetworkInterfaceCard", mappedBy="device", cascade={"remove"})
     */
    private $networkInterfaceCards;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="computer", cascade={"remove"})
     */
    private $documents;


    /**
     *
     * @ORM\OneToMany(targetEntity="InstalledApplication", mappedBy="computer")
     */
    private $installedApplications;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="warrantyEndDate", type="datetime", nullable=true)
     */
    private $warrantyEndDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ups_protected", type="boolean", nullable=true)
     */
    private $upsProtected;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=100, nullable=true)
     */
    private $location;


    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true, nullable=true)
     */
    private $description;

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
     * Set users
     *
     * @param string $users
     * @return Computer
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return string
     */
    public function getUsers()
    {
        return $this->users;
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ramslots = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pciInterfaces = new \Doctrine\Common\Collections\ArrayCollection();
        $this->storageControllers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
        $this->licenses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->installedApplications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addDate = new \DateTime();
        $this->upsProtected = false;
    }

    /**
     * Add ramslots
     *
     * @param \ManagerITBundle\Entity\RamSlot $ramslots
     * @return Computer
     */
    public function addRamslot(\ManagerITBundle\Entity\RamSlot $ramslots)
    {
        $this->ramslots[] = $ramslots;

        return $this;
    }

    /**
     * Remove ramslots
     *
     * @param \ManagerITBundle\Entity\RamSlot $ramslots
     */
    public function removeRamslot(\ManagerITBundle\Entity\RamSlot $ramslots)
    {
        $this->ramslots->removeElement($ramslots);
    }

    /**
     * Add pciInterfaces
     *
     * @param \ManagerITBundle\Entity\InterfacePci $pciInterfaces
     * @return Computer
     */
    public function addPciInterface(\ManagerITBundle\Entity\InterfacePci $pciInterfaces)
    {
        $this->pciInterfaces[] = $pciInterfaces;

        return $this;
    }

    /**
     * Remove pciInterfaces
     *
     * @param \ManagerITBundle\Entity\InterfacePci $pciInterfaces
     */
    public function removePciInterface(\ManagerITBundle\Entity\InterfacePci $pciInterfaces)
    {
        $this->pciInterfaces->removeElement($pciInterfaces);
    }

    /**
     * Add storageControllers
     *
     * @param \ManagerITBundle\Entity\StorageController $storageControllers
     * @return Computer
     */
    public function addStorageController(\ManagerITBundle\Entity\StorageController $storageControllers)
    {
        $this->storageControllers[] = $storageControllers;

        return $this;
    }

    /**
     * Remove storageControllers
     *
     * @param \ManagerITBundle\Entity\StorageController $storageControllers
     */
    public function removeStorageController(\ManagerITBundle\Entity\StorageController $storageControllers)
    {
        $this->storageControllers->removeElement($storageControllers);
    }

    /**
     * Add pictures
     *
     * @param \ManagerITBundle\Entity\Picture $pictures
     * @return Computer
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
     * Add licenses
     *
     * @param \ManagerITBundle\Entity\License $licenses
     * @return Computer
     */
    public function addLicense(\ManagerITBundle\Entity\License $licenses)
    {
        $this->licenses[] = $licenses;

        return $this;
    }

    public function hasLicense(License $license)
    {
        return $this->licenses->contains($license);
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
     * Add users
     *
     * @param \ManagerITBundle\Entity\User $users
     * @return Computer
     */
    public function addUser(\ManagerITBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    public function hasUser(User $user)
    {
        return $this->users->contains($user);
    }

    /**
     * Remove users
     *
     * @param \ManagerITBundle\Entity\User $users
     */
    public function removeUser(\ManagerITBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }



    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return Computer
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
     * Add networkInterfaceCards
     *
     * @param \ManagerITBundle\Entity\NetworkInterfaceCard $networkInterfaceCards
     * @return Computer
     */
    public function addNetworkInterfaceCard(\ManagerITBundle\Entity\NetworkInterfaceCard $networkInterfaceCards)
    {
        $this->networkInterfaceCards[] = $networkInterfaceCards;

        return $this;
    }

    /**
     * Remove networkInterfaceCards
     *
     * @param \ManagerITBundle\Entity\NetworkInterfaceCard $networkInterfaceCards
     */
    public function removeNetworkInterfaceCard(\ManagerITBundle\Entity\NetworkInterfaceCard $networkInterfaceCards)
    {
        $this->networkInterfaceCards->removeElement($networkInterfaceCards);
    }

    /**
     * Get networkInterfaceCards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNetworkInterfaceCards()
    {
        return $this->networkInterfaceCards;
    }

    /**
     * Add documents
     *
     * @param \ManagerITBundle\Entity\Document $documents
     * @return Computer
     */
    public function addDocument(\ManagerITBundle\Entity\Document $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \ManagerITBundle\Entity\Document $documents
     */
    public function removeDocument(\ManagerITBundle\Entity\Document $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Set powerSupply
     *
     * @param \ManagerITBundle\Entity\PowerSupply $powerSupply
     * @return Computer
     */
    public function setPowerSupply(\ManagerITBundle\Entity\PowerSupply $powerSupply = null)
    {
        $this->powerSupply = $powerSupply;

        return $this;
    }

    /**
     * Get powerSupply
     *
     * @return \ManagerITBundle\Entity\PowerSupply 
     */
    public function getPowerSupply()
    {
        return $this->powerSupply;
    }

    /**
     * Add installedApplications
     *
     * @param \ManagerITBundle\Entity\InstalledApplication $installedApplications
     * @return Computer
     */
    public function addInstalledApplication(\ManagerITBundle\Entity\InstalledApplication $installedApplications)
    {
        $this->installedApplications[] = $installedApplications;

        return $this;
    }

    public function hasInstalledApplication(InstalledApplication $installedApplication)
    {
        return $this->installedApplications->contains($installedApplication);
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

    /**
     * Add employees
     *
     * @param \ManagerITBundle\Entity\Employee $employees
     * @return Computer
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
     * Set location
     *
     * @param string $location
     * @return Computer
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
     * Set varrantyEndDate
     *
     * @param \DateTime $varrantyEndDate
     * @return Computer
     */
    public function setVarrantyEndDate($varrantyEndDate)
    {
        $this->varrantyEndDate = $varrantyEndDate;

        return $this;
    }

    /**
     * Get varrantyEndDate
     *
     * @return \DateTime 
     */
    public function getVarrantyEndDate()
    {
        return $this->varrantyEndDate;
    }

    /**
     * Set warrantyEndDate
     *
     * @param \DateTime $warrantyEndDate
     * @return Computer
     */
    public function setWarrantyEndDate($warrantyEndDate)
    {
        $this->warrantyEndDate = $warrantyEndDate;

        return $this;
    }

    /**
     * Get warrantyEndDate
     *
     * @return \DateTime 
     */
    public function getWarrantyEndDate()
    {
        return $this->warrantyEndDate;
    }

    /**
     * Set protectedUps
     *
     * @param boolean $protectedUps
     * @return Computer
     */
    public function setProtectedUps($protectedUps)
    {
        $this->protectedUps = $protectedUps;

        return $this;
    }

    /**
     * Get protectedUps
     *
     * @return boolean 
     */
    public function getProtectedUps()
    {
        return $this->protectedUps;
    }

    /**
     * Set upsProtected
     *
     * @param boolean $upsProtected
     * @return Computer
     */
    public function setUpsProtected($upsProtected)
    {
        $this->upsProtected = $upsProtected;

        return $this;
    }

    /**
     * Get upsProtected
     *
     * @return boolean 
     */
    public function getUpsProtected()
    {
        return $this->upsProtected;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Computer
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Computer
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
}
