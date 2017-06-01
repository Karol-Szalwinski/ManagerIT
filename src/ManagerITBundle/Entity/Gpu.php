<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gpu
 *
 * @ORM\Table(name="gpu")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\GpuRepository")
 */
class Gpu
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
     * @ORM\Column(name="chipset", type="string", length=255)
     */
    private $chipset;

    /**
     * @var string
     *
     * @ORM\Column(name="series", type="string", length=255)
     */
    private $series;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=100)
     */
    private $brand;

    /**
     * @var int
     *
     * @ORM\Column(name="memorySize", type="integer")
     */
    private $memorySize;

    /**
     * @var string
     *
     * @ORM\Column(name="memoryType", type="string", length=100)
     */
    private $memoryType;

    /**
     * @var string
     *
     * @ORM\Column(name="compatiableSlot", type="string", length=255)
     */
    private $compatiableSlotPort;

    /**
     * @var string
     *
     * @ORM\Column(name="cooling", type="string", length=255)
     */
    private $cooling;

    /**
     * @var string
     *
     * @ORM\Column(name="monitorConnectors", type="string", length=255)
     */
    private $monitorConnectors;

    /**
     * @var string
     *
     * @ORM\Column(name="powerConnectors", type="string", length=255)
     */
    private $powerConnectors;

    /**
     * @var string
     *
     * @ORM\Column(name="formFactor", type="string", length=100)
     */
    private $formFactor;

   

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
     * @return Gpu
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
     * Set chipset
     *
     * @param string $chipset
     * @return Gpu
     */
    public function setChipset($chipset)
    {
        $this->chipset = $chipset;

        return $this;
    }

    /**
     * Get chipset
     *
     * @return string 
     */
    public function getChipset()
    {
        return $this->chipset;
    }

    /**
     * Set series
     *
     * @param string $series
     * @return Gpu
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
     * @return Gpu
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
     * Set memorySize
     *
     * @param integer $memorySize
     * @return Gpu
     */
    public function setMemorySize($memorySize)
    {
        $this->memorySize = $memorySize;

        return $this;
    }

    /**
     * Get memorySize
     *
     * @return integer 
     */
    public function getMemorySize()
    {
        return $this->memorySize;
    }

    /**
     * Set memoryType
     *
     * @param string $memoryType
     * @return Gpu
     */
    public function setMemoryType($memoryType)
    {
        $this->memoryType = $memoryType;

        return $this;
    }

    /**
     * Get memoryType
     *
     * @return string 
     */
    public function getMemoryType()
    {
        return $this->memoryType;
    }

    /**
     * Set compatiableSlotPort
     *
     * @param string $compatiableSlotPort
     * @return Gpu
     */
    public function setCompatiableSlotPort($compatiableSlotPort)
    {
        $this->compatiableSlotPort = $compatiableSlotPort;

        return $this;
    }

    /**
     * Get compatiableSlotPort
     *
     * @return string 
     */
    public function getCompatiableSlotPort()
    {
        return $this->compatiableSlotPort;
    }

    /**
     * Set cooling
     *
     * @param string $cooling
     * @return Gpu
     */
    public function setCooling($cooling)
    {
        $this->cooling = $cooling;

        return $this;
    }

    /**
     * Get cooling
     *
     * @return string 
     */
    public function getCooling()
    {
        return $this->cooling;
    }

    /**
     * Set monitorConnectors
     *
     * @param string $monitorConnectors
     * @return Gpu
     */
    public function setMonitorConnectors($monitorConnectors)
    {
        $this->monitorConnectors = $monitorConnectors;

        return $this;
    }

    /**
     * Get monitorConnectors
     *
     * @return string 
     */
    public function getMonitorConnectors()
    {
        return $this->monitorConnectors;
    }

    /**
     * Set powerConnectors
     *
     * @param string $powerConnectors
     * @return Gpu
     */
    public function setPowerConnectors($powerConnectors)
    {
        $this->powerConnectors = $powerConnectors;

        return $this;
    }

    /**
     * Get powerConnectors
     *
     * @return string 
     */
    public function getPowerConnectors()
    {
        return $this->powerConnectors;
    }

    /**
     * Set formFactor
     *
     * @param string $formFactor
     * @return Gpu
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
}
