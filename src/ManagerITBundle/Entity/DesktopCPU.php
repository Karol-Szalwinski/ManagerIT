<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DesktopCPU
 *
 * @ORM\Table(name="desktop_c_p_u")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\DesktopCPURepository")
 */
class DesktopCPU
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
     * @ORM\Column(name="Manufacturer", type="string", length=255)
     */
    private $manufacturer;

    /**
     * @var float
     *
     * @ORM\Column(name="baseFrequency", type="float")
     */
    private $baseFrequency;

    /**
     * @var float
     *
     * @ORM\Column(name="maxTurboFrequency", type="float", nullable=true)
     */
    private $maxTurboFrequency;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfCores", type="smallint")
     */
    private $numberOfCores;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfThreads", type="smallint")
     */
    private $numberOfThreads;

    /**
     * @var float
     *
     * @ORM\Column(name="casheMB", type="float")
     */
    private $casheMB;

    /**
     * @var string
     *
     * @ORM\Column(name="TDP", type="string", length=255)
     */
    private $tDP;

    /**
     * @var string
     *
     * @ORM\Column(name="GPU", type="string", length=255, nullable=true)
     */
    private $gPU;

    /**
     * @var int
     *
     * @ORM\Column(name="LithographyNM", type="smallint")
     */
    private $lithographyNM;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="launchDate", type="date", nullable=true)
     */
    private $launchDate;

    /**
     * @var string
     *
     * @ORM\Column(name="sockets", type="string", length=255)
     */
    private $sockets;

    /**
     * @var string
     *
     * @ORM\Column(name="generation", type="string", length=255, nullable=true)
     */
    private $generation;


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
     * @return DesktopCPU
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
     * Set manufacturer
     *
     * @param string $manufacturer
     * @return DesktopCPU
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string 
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set baseFrequency
     *
     * @param float $baseFrequency
     * @return DesktopCPU
     */
    public function setBaseFrequency($baseFrequency)
    {
        $this->baseFrequency = $baseFrequency;

        return $this;
    }

    /**
     * Get baseFrequency
     *
     * @return float 
     */
    public function getBaseFrequency()
    {
        return $this->baseFrequency;
    }

    /**
     * Set maxTurboFrequency
     *
     * @param float $maxTurboFrequency
     * @return DesktopCPU
     */
    public function setMaxTurboFrequency($maxTurboFrequency)
    {
        $this->maxTurboFrequency = $maxTurboFrequency;

        return $this;
    }

    /**
     * Get maxTurboFrequency
     *
     * @return float 
     */
    public function getMaxTurboFrequency()
    {
        return $this->maxTurboFrequency;
    }

    /**
     * Set numberOfCores
     *
     * @param integer $numberOfCores
     * @return DesktopCPU
     */
    public function setNumberOfCores($numberOfCores)
    {
        $this->numberOfCores = $numberOfCores;

        return $this;
    }

    /**
     * Get numberOfCores
     *
     * @return integer 
     */
    public function getNumberOfCores()
    {
        return $this->numberOfCores;
    }

    /**
     * Set numberOfThreads
     *
     * @param integer $numberOfThreads
     * @return DesktopCPU
     */
    public function setNumberOfThreads($numberOfThreads)
    {
        $this->numberOfThreads = $numberOfThreads;

        return $this;
    }

    /**
     * Get numberOfThreads
     *
     * @return integer 
     */
    public function getNumberOfThreads()
    {
        return $this->numberOfThreads;
    }

    /**
     * Set casheMB
     *
     * @param float $casheMB
     * @return DesktopCPU
     */
    public function setCasheMB($casheMB)
    {
        $this->casheMB = $casheMB;

        return $this;
    }

    /**
     * Get casheMB
     *
     * @return float 
     */
    public function getCasheMB()
    {
        return $this->casheMB;
    }

    /**
     * Set tDP
     *
     * @param string $tDP
     * @return DesktopCPU
     */
    public function setTDP($tDP)
    {
        $this->tDP = $tDP;

        return $this;
    }

    /**
     * Get tDP
     *
     * @return string 
     */
    public function getTDP()
    {
        return $this->tDP;
    }

    /**
     * Set gPU
     *
     * @param string $gPU
     * @return DesktopCPU
     */
    public function setGPU($gPU)
    {
        $this->gPU = $gPU;

        return $this;
    }

    /**
     * Get gPU
     *
     * @return string 
     */
    public function getGPU()
    {
        return $this->gPU;
    }

    /**
     * Set lithographyNM
     *
     * @param integer $lithographyNM
     * @return DesktopCPU
     */
    public function setLithographyNM($lithographyNM)
    {
        $this->lithographyNM = $lithographyNM;

        return $this;
    }

    /**
     * Get lithographyNM
     *
     * @return integer 
     */
    public function getLithographyNM()
    {
        return $this->lithographyNM;
    }

    /**
     * Set launchDate
     *
     * @param \DateTime $launchDate
     * @return DesktopCPU
     */
    public function setLaunchDate($launchDate)
    {
        $this->launchDate = $launchDate;

        return $this;
    }

    /**
     * Get launchDate
     *
     * @return \DateTime 
     */
    public function getLaunchDate()
    {
        return $this->launchDate;
    }

    /**
     * Set sockets
     *
     * @param string $sockets
     * @return DesktopCPU
     */
    public function setSockets($sockets)
    {
        $this->sockets = $sockets;

        return $this;
    }

    /**
     * Get sockets
     *
     * @return string 
     */
    public function getSockets()
    {
        return $this->sockets;
    }

    /**
     * Set generation
     *
     * @param string $generation
     * @return DesktopCPU
     */
    public function setGeneration($generation)
    {
        $this->generation = $generation;

        return $this;
    }

    /**
     * Get generation
     *
     * @return string 
     */
    public function getGeneration()
    {
        return $this->generation;
    }
}
