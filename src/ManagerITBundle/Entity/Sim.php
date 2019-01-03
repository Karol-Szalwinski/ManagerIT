<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sim
 *
 * @ORM\Table(name="sim")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\SimRepository")
 */
class Sim
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
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="pin", type="string", length=10, nullable=true)
     */
    private $pin;

    /**
     * @var string
     *
     * @ORM\Column(name="pin2", type="string", length=10, nullable=true)
     */
    private $pin2;

    /**
     * @var string
     *
     * @ORM\Column(name="puk", type="string", length=10, nullable=true)
     */
    private $puk;

    /**
     * @var string
     *
     * @ORM\Column(name="puk2", type="string", length=10, nullable=true)
     */
    private $puk2;

    /**
     * @var string
     *
     * @ORM\Column(name="operator", type="string", length=255)
     */
    private $operator;

    /**
     * Many Sims have One Phone.
     * @ORM\ManyToOne(targetEntity="Phone", inversedBy="sims")
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     */
    private $phone;
    /**
     * Many Sims have One Tablet.
     * @ORM\ManyToOne(targetEntity="Tablet", inversedBy="sims")
     * @ORM\JoinColumn(name="tablet_id", referencedColumnName="id")
     */
    private $tablet;


    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="monthlyfee", type="float", nullable=true)
     */
    private $monthlyfee;


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
     * Set number
     *
     * @param string $number
     * @return Sim
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set pin
     *
     * @param integer $pin
     * @return Sim
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return integer 
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set pin2
     *
     * @param integer $pin2
     * @return Sim
     */
    public function setPin2($pin2)
    {
        $this->pin2 = $pin2;

        return $this;
    }

    /**
     * Get pin2
     *
     * @return integer 
     */
    public function getPin2()
    {
        return $this->pin2;
    }

    /**
     * Set puk
     *
     * @param integer $puk
     * @return Sim
     */
    public function setPuk($puk)
    {
        $this->puk = $puk;

        return $this;
    }

    /**
     * Get puk
     *
     * @return integer 
     */
    public function getPuk()
    {
        return $this->puk;
    }

    /**
     * Set puk2
     *
     * @param integer $puk2
     * @return Sim
     */
    public function setPuk2($puk2)
    {
        $this->puk2 = $puk2;

        return $this;
    }

    /**
     * Get puk2
     *
     * @return integer 
     */
    public function getPuk2()
    {
        return $this->puk2;
    }

    /**
     * Set operator
     *
     * @param string $operator
     * @return Sim
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string 
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Sim
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set tablet
     *
     * @param string $tablet
     * @return Sim
     */
    public function setTablet($tablet)
    {
        $this->tablet = $tablet;

        return $this;
    }

    /**
     * Get tablet
     *
     * @return string 
     */
    public function getTablet()
    {
        return $this->tablet;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Sim
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
     * Set monthlyfee
     *
     * @param string $monthlyfee
     * @return Sim
     */
    public function setMonthlyfee($monthlyfee)
    {
        $this->monthlyfee = $monthlyfee;

        return $this;
    }

    /**
     * Get monthlyfee
     *
     * @return string 
     */
    public function getMonthlyfee()
    {
        return $this->monthlyfee;
    }
}
