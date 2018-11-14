<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phone
 *
 * @ORM\Table(name="phone")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\PhoneRepository")
 */
class Phone
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
     * @ORM\Column(name="serial", type="string", length=255)
     */
    private $serial;

    /**
     * @var string
     *
     * @ORM\Column(name="imei", type="string", length=255)
     */
    private $imei;

    /**
     * @var string
     *
     * @ORM\Column(name="cpu", type="string", length=255)
     */
    private $cpu;

    /**
     * @var int
     *
     * @ORM\Column(name="ram", type="integer", nullable=true)
     */
    private $ram;

    /**
     * @var int
     *
     * @ORM\Column(name="rom", type="integer", nullable=true)
     */
    private $rom;

    /**
     * @var string
     *
     * @ORM\Column(name="modem", type="string", length=255, nullable=true)
     */
    private $modem;

    /**
     * @var int
     *
     * @ORM\Column(name="screenSize",  type="decimal", scale=2)
     */
    private $screenSize;

    /**
     * @var string
     *
     * @ORM\Column(name="os", type="string", length=255)
     */
    private $os;

    /**
     * @var string
     *
     * @ORM\Column(name="pin", type="string", length=255, nullable=true)
     */
    private $pin;

    /**
     * @var string
     *
     * @ORM\Column(name="pinScreen", type="string", length=255, nullable=true)
     */
    private $pinScreen;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="phones")
     *
     * @ORM\JoinTable(name="users_phones")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="Employee", inversedBy="phones")
     *
     * @ORM\JoinTable(name="employees_phones")
     */
    private $employees;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime")
     */
    private $addDate;

    /**
     * @ORM\ManyToMany(targetEntity="Picture")
     * @ORM\JoinTable(name="phones_pictures",
     *      joinColumns={@ORM\JoinColumn(name="phone_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="picture_id", referencedColumnName="id")}
     *      )
     */
    private $pictures;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="phone", cascade={"remove"})
     */
    private $documents;

    /**
     * One Phone has Many Sims.
     * @ORM\OneToMany(targetEntity="Sim", mappedBy="phone")
     */
    private $sims;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="warrantyEndDate", type="datetime", nullable=true)
     */
    private $warrantyEndDate;

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

    public function __construct()
    {
        $this->sims = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Phone
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
     * @return Phone
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
     * @return Phone
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
     * @return Phone
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
     * Set cpu
     *
     * @param string $cpu
     * @return Phone
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
     * Set ram
     *
     * @param string $ram
     * @return Phone
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return string 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set rom
     *
     * @param string $rom
     * @return Phone
     */
    public function setRom($rom)
    {
        $this->rom = $rom;

        return $this;
    }

    /**
     * Get rom
     *
     * @return string 
     */
    public function getRom()
    {
        return $this->rom;
    }

    /**
     * Set modem
     *
     * @param string $modem
     * @return Phone
     */
    public function setModem($modem)
    {
        $this->modem = $modem;

        return $this;
    }

    /**
     * Get modem
     *
     * @return string 
     */
    public function getModem()
    {
        return $this->modem;
    }

    /**
     * Set screenSize
     *
     * @param string $screenSize
     * @return Phone
     */
    public function setScreenSize($screenSize)
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    /**
     * Get screenSize
     *
     * @return string 
     */
    public function getScreenSize()
    {
        return $this->screenSize;
    }

    /**
     * Set os
     *
     * @param string $os
     * @return Phone
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
     * Set pin
     *
     * @param string $pin
     * @return Phone
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return string 
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set pinScreen
     *
     * @param string $pinScreen
     * @return Phone
     */
    public function setPinScreen($pinScreen)
    {
        $this->pinScreen = $pinScreen;

        return $this;
    }

    /**
     * Get pinScreen
     *
     * @return string 
     */
    public function getPinScreen()
    {
        return $this->pinScreen;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Phone
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Phone
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
     * Set addDate
     *
     * @param string $addDate
     * @return Phone
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return string 
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Add users
     *
     * @param \ManagerITBundle\Entity\User $users
     * @return Phone
     */
    public function addUser(\ManagerITBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
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
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function hasUser(User $user)
    {
        return $this->users->contains($user);
    }

    /**
     * Add pictures
     *
     * @param \ManagerITBundle\Entity\Picture $pictures
     * @return Phone
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
     * Add documents
     *
     * @param \ManagerITBundle\Entity\Document $documents
     * @return Phone
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
     * Add sims
     *
     * @param \ManagerITBundle\Entity\Sim $sims
     * @return Phone
     */
    public function addSim(\ManagerITBundle\Entity\Sim $sims)
    {
        $this->sims[] = $sims;

        return $this;
    }

    /**
     * Remove sims
     *
     * @param \ManagerITBundle\Entity\Sim $sims
     */
    public function removeSim(\ManagerITBundle\Entity\Sim $sims)
    {
        $this->sims->removeElement($sims);
    }

    /**
     * Get sims
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSims()
    {
        return $this->sims;
    }

    public function hasSim(Sim $sim)
    {
        return $this->sims->contains($sim);
    }

    /**
     * Set imei
     *
     * @param string $imei
     * @return Phone
     */
    public function setImei($imei)
    {
        $this->imei = $imei;

        return $this;
    }

    /**
     * Get imei
     *
     * @return string 
     */
    public function getImei()
    {
        return $this->imei;
    }

    /**
     * Add employees
     *
     * @param \ManagerITBundle\Entity\Employee $employees
     * @return Phone
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
     * Set varrantyEndDate
     *
     * @param \DateTime $varrantyEndDate
     * @return Phone
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
     * @return Phone
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
     * Set status
     *
     * @param string $status
     * @return Phone
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
     * Set location
     *
     * @param string $location
     * @return Phone
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
}
