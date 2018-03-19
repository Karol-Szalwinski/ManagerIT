<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tablet
 *
 * @ORM\Table(name="tablet")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\TabletRepository")
 */
class Tablet
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
     * @ORM\Column(name="screenSize", type="decimal", scale=2)
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * @ORM\ManyToMany(targetEntity="Employee", inversedBy="tablets")
     *
     * @ORM\JoinTable(name="employees_tablets")
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
     * @ORM\JoinTable(name="tablets_pictures",
     *      joinColumns={@ORM\JoinColumn(name="tablet_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="picture_id", referencedColumnName="id")}
     *      )
     */
    private $pictures;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="tablet", cascade={"remove"})
     */
    private $documents;

    /**
     * One Tablet has Many Sims.
     * @ORM\OneToMany(targetEntity="Sim", mappedBy="tablet")
     */
    private $sims;

    public function __construct()
    {
        $this->sims = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
     * @param integer $ram
     * @return Tablet
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return integer 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set rom
     *
     * @param integer $rom
     * @return Tablet
     */
    public function setRom($rom)
    {
        $this->rom = $rom;

        return $this;
    }

    /**
     * Get rom
     *
     * @return integer 
     */
    public function getRom()
    {
        return $this->rom;
    }

    /**
     * Set modem
     *
     * @param string $modem
     * @return Tablet
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
     * @param integer $screenSize
     * @return Tablet
     */
    public function setScreenSize($screenSize)
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    /**
     * Get screenSize
     *
     * @return integer 
     */
    public function getScreenSize()
    {
        return $this->screenSize;
    }

    /**
     * Set os
     *
     * @param string $os
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
     * @param \DateTime $addDate
     * @return Tablet
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
     * Add employees
     *
     * @param \ManagerITBundle\Entity\Employee $employees
     * @return Tablet
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

    public function hasEmployee(Employee $employee)
    {
        return $this->employees->contains($employee);
    }

    /**
     * Add pictures
     *
     * @param \ManagerITBundle\Entity\Picture $pictures
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
     * @return Tablet
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
}
