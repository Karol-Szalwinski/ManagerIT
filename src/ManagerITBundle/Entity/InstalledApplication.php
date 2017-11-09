<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InstalledApplication
 *
 * @ORM\Table(name="installed_application")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\InstalledApplicationRepository")
 */
class InstalledApplication
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
     * @ORM\ManyToOne(targetEntity="Application")
     *
     * @ORM\JoinColumn(name="application_id", referencedColumnName="id", nullable=true)
     */
    private $application;

    /**
     * @var string
     *
     * @ORM\Column(name="license", type="string", length=255, nullable=true)
     */
    private $license;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Computer", inversedBy="installedApplications")
     * @ORM\JoinColumn(name="computer_id", referencedColumnName="id", nullable=true)
     */
    private $computer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime", nullable=true)
     */
    private $installationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=true)
     */
    private $version;


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
     * Set application
     *
     * @param string $application
     * @return InstalledApplication
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return string 
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set license
     *
     * @param string $license
     * @return InstalledApplication
     */
    public function setLicense($license)
    {
        $this->license = $license;

        return $this;
    }

    /**
     * Get license
     *
     * @return string 
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Set computer
     *
     * @param string $computer
     * @return InstalledApplication
     */
    public function setComputer($computer)
    {
        $this->computer = $computer;

        return $this;
    }

    /**
     * Get computer
     *
     * @return string 
     */
    public function getComputer()
    {
        return $this->computer;
    }

    public function removeComputer()
    {
        $this->computer = null;

    }

    /**
     * Set installationDate
     *
     * @param string $installationDate
     * @return InstalledApplication
     */
    public function setInstallationDate($installationDate)
    {
        $this->installationDate = $installationDate;

        return $this;
    }

    /**
     * Get installationDate
     *
     * @return string 
     */
    public function getInstallationDate()
    {
        return $this->installationDate;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return InstalledApplication
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }
}
