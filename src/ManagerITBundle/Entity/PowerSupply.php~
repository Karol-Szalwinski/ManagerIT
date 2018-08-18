<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PowerSupply
 *
 * @ORM\Table(name="power_supply")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\PowerSupplyRepository")
 */
class PowerSupply
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="cooling", type="string", length=255)
     */
    private $cooling;

    /**
     * @var int
     *
     * @ORM\Column(name="powerInWatt", type="integer")
     */
    private $powerInWatt;


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
     * @return PowerSupply
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
     * @return PowerSupply
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
     * @return PowerSupply
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
     * @return PowerSupply
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
     * Set type
     *
     * @param string $type
     * @return PowerSupply
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
     * Set cooling
     *
     * @param string $cooling
     * @return PowerSupply
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
     * Set powerInWatt
     *
     * @param integer $powerInWatt
     * @return PowerSupply
     */
    public function setPowerInWatt($powerInWatt)
    {
        $this->powerInWatt = $powerInWatt;

        return $this;
    }

    /**
     * Get powerInWatt
     *
     * @return integer 
     */
    public function getPowerInWatt()
    {
        return $this->powerInWatt;
    }
}
