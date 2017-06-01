<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DesktopRam
 *
 * @ORM\Table(name="desktop_ram")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\DesktopRamRepository")
 */
class DesktopRam
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
     * @ORM\Column(name="series", type="string", length=255)
     */
    private $series;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var float
     *
     * @ORM\Column(name="capacity", type="float")
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="busSpeed", type="string", length=255)
     */
    private $busSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="casLatency", type="integer", nullable=true)
     */
    private $casLatency;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfPins", type="integer")
     */
    private $numberOfPins;

    /**
     * @ORM\OneToMany(targetEntity="RamSlot", mappedBy="ram")
     */
    private $ramSlots;

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
     * @return DesktopRam
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
     * @return DesktopRam
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
     * Set series
     *
     * @param string $series
     * @return DesktopRam
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
     * Set brand
     *
     * @param string $brand
     * @return DesktopRam
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
     * Set capacity
     *
     * @param float $capacity
     * @return DesktopRam
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return float
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return DesktopRam
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
     * Set busSpeed
     *
     * @param string $busSpeed
     * @return DesktopRam
     */
    public function setBusSpeed($busSpeed)
    {
        $this->busSpeed = $busSpeed;

        return $this;
    }

    /**
     * Get busSpeed
     *
     * @return string
     */
    public function getBusSpeed()
    {
        return $this->busSpeed;
    }

    /**
     * Set casLatency
     *
     * @param integer $casLatency
     * @return DesktopRam
     */
    public function setCasLatency($casLatency)
    {
        $this->casLatency = $casLatency;

        return $this;
    }

    /**
     * Get casLatency
     *
     * @return integer
     */
    public function getCasLatency()
    {
        return $this->casLatency;
    }

    /**
     * Set numberOfPins
     *
     * @param integer $numberOfPins
     * @return DesktopRam
     */
    public function setNumberOfPins($numberOfPins)
    {
        $this->numberOfPins = $numberOfPins;

        return $this;
    }

    /**
     * Get numberOfPins
     *
     * @return integer
     */
    public function getNumberOfPins()
    {
        return $this->numberOfPins;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ramSlots = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ramSlots
     *
     * @param \ManagerITBundle\Entity\RamSlot $ramSlots
     * @return DesktopRam
     */
    public function addRamSlot(\ManagerITBundle\Entity\RamSlot $ramSlots)
    {
        $this->ramSlots[] = $ramSlots;

        return $this;
    }

    /**
     * Remove ramSlots
     *
     * @param \ManagerITBundle\Entity\RamSlot $ramSlots
     */
    public function removeRamSlot(\ManagerITBundle\Entity\RamSlot $ramSlots)
    {
        $this->ramSlots->removeElement($ramSlots);
    }

    /**
     * Get ramSlots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRamSlots()
    {
        return $this->ramSlots;
    }
}
