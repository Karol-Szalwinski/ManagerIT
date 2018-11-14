<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistic
 *
 * @ORM\Table(name="statistic")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\StatisticRepository")
 */
class Statistic
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
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime")
     */
    private $addDate;

    /**
     * @var int
     *
     * @ORM\Column(name="computerCount", type="integer", nullable=true)
     */
    private $computerCount;

    /**
     * @var int
     *
     * @ORM\Column(name="laptopCount", type="integer", nullable=true)
     */
    private $laptopCount;

    /**
     * @var int
     *
     * @ORM\Column(name="phoneCount", type="integer", nullable=true)
     */
    private $phoneCount;

    /**
     * @var int
     *
     * @ORM\Column(name="tabletCount", type="integer", nullable=true)
     */
    private $tabletCount;

    /**
     * @var int
     *
     * @ORM\Column(name="printerCount", type="integer", nullable=true)
     */
    private $printerCount;

    /**
     * @var int
     *
     * @ORM\Column(name="simCount", type="integer", nullable=true)
     */
    private $simCount;

    /**
     * @var int
     *
     * @ORM\Column(name="networkDeviceCount", type="integer", nullable=true)
     */
    private $networkDeviceCount;

    /**
     * @var int
     *
     * @ORM\Column(name="userCount", type="integer", nullable=true)
     */
    private $userCount;

    public function __construct()
    {
        $this->computerCount = 0;
        $this->laptopCount = 0;
        $this->networkDeviceCount = 0;
        $this->phoneCount = 0;
        $this->tabletCount = 0;
        $this->printerCount = 0;
        $this->simCount = 0;
        $this->userCount = 0;
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
     * Set computerCount
     *
     * @param integer $computerCount
     * @return Statistic
     */
    public function setComputerCount($computerCount)
    {
        $this->computerCount = $computerCount;

        return $this;
    }

    /**
     * Get computerCount
     *
     * @return integer 
     */
    public function getComputerCount()
    {
        return $this->computerCount;
    }

    /**
     * Set laptopCount
     *
     * @param integer $laptopCount
     * @return Statistic
     */
    public function setLaptopCount($laptopCount)
    {
        $this->laptopCount = $laptopCount;

        return $this;
    }

    /**
     * Get laptopCount
     *
     * @return integer 
     */
    public function getLaptopCount()
    {
        return $this->laptopCount;
    }

    /**
     * Set phoneCount
     *
     * @param integer $phoneCount
     * @return Statistic
     */
    public function setPhoneCount($phoneCount)
    {
        $this->phoneCount = $phoneCount;

        return $this;
    }

    /**
     * Get phoneCount
     *
     * @return integer 
     */
    public function getPhoneCount()
    {
        return $this->phoneCount;
    }

    /**
     * Set tabletCount
     *
     * @param integer $tabletCount
     * @return Statistic
     */
    public function setTabletCount($tabletCount)
    {
        $this->tabletCount = $tabletCount;

        return $this;
    }

    /**
     * Get tabletCount
     *
     * @return integer 
     */
    public function getTabletCount()
    {
        return $this->tabletCount;
    }

    /**
     * Set printerCount
     *
     * @param string $printerCount
     * @return Statistic
     */
    public function setPrinterCount($printerCount)
    {
        $this->printerCount = $printerCount;

        return $this;
    }

    /**
     * Get printerCount
     *
     * @return string 
     */
    public function getPrinterCount()
    {
        return $this->printerCount;
    }

    /**
     * Set simCount
     *
     * @param integer $simCount
     * @return Statistic
     */
    public function setSimCount($simCount)
    {
        $this->simCount = $simCount;

        return $this;
    }

    /**
     * Get simCount
     *
     * @return integer 
     */
    public function getSimCount()
    {
        return $this->simCount;
    }

    /**
     * Set networkDeviceCount
     *
     * @param integer $networkDeviceCount
     * @return Statistic
     */
    public function setNetworkDeviceCount($networkDeviceCount)
    {
        $this->networkDeviceCount = $networkDeviceCount;

        return $this;
    }

    /**
     * Get networkDeviceCount
     *
     * @return integer 
     */
    public function getNetworkDeviceCount()
    {
        return $this->networkDeviceCount;
    }

    /**
     * Set userCount
     *
     * @param integer $userCount
     * @return Statistic
     */
    public function setUserCount($userCount)
    {
        $this->userCount = $userCount;

        return $this;
    }

    /**
     * Get userCount
     *
     * @return integer 
     */
    public function getUserCount()
    {
        return $this->userCount;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     * @return Statistic
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
