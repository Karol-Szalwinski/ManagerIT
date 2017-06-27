<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NetworkInterfaceCard
 *
 * @ORM\Table(name="network_interface_card")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\NetworkInterfaceCardRepository")
 */
class NetworkInterfaceCard
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
     * @var string
     *
     * @ORM\Column(name="standard", type="string", length=255)
     */
    private $standard;

    /**
     * @var string
     *
     * @ORM\Column(name="interface", type="string", length=255)
     */
    private $interface;

    /**
     * @var string
     *
     * @ORM\Column(name="ipv4", type="string", length=255)
     */
    private $ipv4;

    /**
     * @var string
     *
     * @ORM\Column(name="macAddress", type="string", length=255)
     */
    private $macAddress;

    /**
     * @ORM\ManyToOne(targetEntity="Computer", inversedBy="networkInterfaceCards")
     * @ORM\JoinColumn(name="computer_id", referencedColumnName="id")
     */
    private $device;


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
     * @return NetworkInterfaceCard
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
     * @return NetworkInterfaceCard
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
     * @return NetworkInterfaceCard
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
     * @return NetworkInterfaceCard
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
     * Set standard
     *
     * @param string $standard
     * @return NetworkInterfaceCard
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;

        return $this;
    }

    /**
     * Get standard
     *
     * @return string 
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * Set interface
     *
     * @param string $interface
     * @return NetworkInterfaceCard
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;

        return $this;
    }

    /**
     * Get interface
     *
     * @return string 
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * Set ipv4
     *
     * @param string $ipv4
     * @return NetworkInterfaceCard
     */
    public function setIpv4($ipv4)
    {
        $this->ipv4 = $ipv4;

        return $this;
    }

    /**
     * Get ipv4
     *
     * @return string 
     */
    public function getIpv4()
    {
        return $this->ipv4;
    }

    /**
     * Set macAddress
     *
     * @param string $macAddress
     * @return NetworkInterfaceCard
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
     * Set device
     *
     * @param string $device
     * @return NetworkInterfaceCard
     */
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return string 
     */
    public function getDevice()
    {
        return $this->device;
    }
}
