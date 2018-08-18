<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComputerFormFactor
 *
 * @ORM\Table(name="computer_form_factor")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\ComputerFormFactorRepository")
 */
class ComputerFormFactor
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
     * @ORM\Column(name="seria", type="string", length=255)
     */
    private $seria;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var int
     *
     * @ORM\Column(name="dedicatedForModel", type="smallint")
     */
    private $dedicatedForModel;


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
     * @return ComputerFormFactor
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
     * @return ComputerFormFactor
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
     * Set seria
     *
     * @param string $seria
     * @return ComputerFormFactor
     */
    public function setSeria($seria)
    {
        $this->seria = $seria;

        return $this;
    }

    /**
     * Get seria
     *
     * @return string 
     */
    public function getSeria()
    {
        return $this->seria;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return ComputerFormFactor
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
     * Set dedicatedForModel
     *
     * @param integer $dedicatedForModel
     * @return ComputerFormFactor
     */
    public function setDedicatedForModel($dedicatedForModel)
    {
        $this->dedicatedForModel = $dedicatedForModel;

        return $this;
    }

    /**
     * Get dedicatedForModel
     *
     * @return integer 
     */
    public function getDedicatedForModel()
    {
        return $this->dedicatedForModel;
    }
}
