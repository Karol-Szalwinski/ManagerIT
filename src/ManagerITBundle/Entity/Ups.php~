<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ups
 *
 * @ORM\Table(name="ups")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\UpsRepository")
 */
class Ups
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
     * @ORM\Column(name="capacity", type="string", length=255)
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="estimatedWorkingTime", type="string", length=255)
     */
    private $estimatedWorkingTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateBatteryDate", type="datetime", nullable=true)
     */
    private $updateBatteryDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime", nullable=true)
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
     * @return Ups
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
     * @return Ups
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
     * @return Ups
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
     * @return Ups
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
     * Set capacity
     *
     * @param string $capacity
     * @return Ups
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return string 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set estimatedWorkingTime
     *
     * @param string $estimatedWorkingTime
     * @return Ups
     */
    public function setEstimatedWorkingTime($estimatedWorkingTime)
    {
        $this->estimatedWorkingTime = $estimatedWorkingTime;

        return $this;
    }

    /**
     * Get estimatedWorkingTime
     *
     * @return string 
     */
    public function getEstimatedWorkingTime()
    {
        return $this->estimatedWorkingTime;
    }

    /**
     * Set updateBatteryDate
     *
     * @param \DateTime $updateBatteryDate
     * @return Ups
     */
    public function setUpdateBatteryDate($updateBatteryDate)
    {
        $this->updateBatteryDate = $updateBatteryDate;

        return $this;
    }

    /**
     * Get updateBatteryDate
     *
     * @return \DateTime 
     */
    public function getUpdateBatteryDate()
    {
        return $this->updateBatteryDate;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     * @return Ups
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
}
