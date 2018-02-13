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
     * @ORM\Column(name="cpu", type="string", length=255)
     */
    private $cpu;

    /**
     * @var string
     *
     * @ORM\Column(name="ram", type="string", length=255)
     */
    private $ram;

    /**
     * @var string
     *
     * @ORM\Column(name="rom", type="string", length=255)
     */
    private $rom;

    /**
     * @var string
     *
     * @ORM\Column(name="modem", type="string", length=255)
     */
    private $modem;

    /**
     * @var string
     *
     * @ORM\Column(name="screenSize", type="string", length=255)
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
     * @ORM\Column(name="pin", type="string", length=255)
     */
    private $pin;

    /**
     * @var string
     *
     * @ORM\Column(name="pinScreen", type="string", length=255)
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="sim", type="string", length=255)
     */
    private $sim;

    /**
     * @var string
     *
     * @ORM\Column(name="employee", type="string", length=255)
     */
    private $employee;

    /**
     * @var string
     *
     * @ORM\Column(name="addDate", type="string", length=255)
     */
    private $addDate;


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
     * Set sim
     *
     * @param string $sim
     * @return Phone
     */
    public function setSim($sim)
    {
        $this->sim = $sim;

        return $this;
    }

    /**
     * Get sim
     *
     * @return string 
     */
    public function getSim()
    {
        return $this->sim;
    }

    /**
     * Set employee
     *
     * @param string $employee
     * @return Phone
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return string 
     */
    public function getEmployee()
    {
        return $this->employee;
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
}
