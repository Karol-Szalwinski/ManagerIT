<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\ApplicationRepository")
 */
class Application
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="licenseType", type="string", length=255)
     */
    private $licenseType;

    /**
     *
     * @ORM\OneToMany(targetEntity="License", mappedBy="application")
     */
    private $licenses;

    /**
     * @var string
     *
     * @ORM\Column(name="developer", type="string", length=255)
     */
    private $developer;

    /**
     * @var string
     *
     * @ORM\Column(name="webpage", type="string", length=255)
     */
    private $webpage;

    /**
     *
     * @ORM\OneToMany(targetEntity="InstalledApplication", mappedBy="application")
     */
    private $installedApplications;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime", nullable=true)
     */
    private $addDate;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->installedApplications = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Application
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
     * Set type
     *
     * @param string $type
     * @return Application
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
     * Set licenseType
     *
     * @param string $licenseType
     * @return Application
     */
    public function setLicenseType($licenseType)
    {
        $this->licenseType = $licenseType;

        return $this;
    }

    /**
     * Get licenseType
     *
     * @return string 
     */
    public function getLicenseType()
    {
        return $this->licenseType;
    }

    /**
     * Set developer
     *
     * @param string $developer
     * @return Application
     */
    public function setDeveloper($developer)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Get developer
     *
     * @return string 
     */
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Set webpage
     *
     * @param string $webpage
     * @return Application
     */
    public function setWebpage($webpage)
    {
        $this->webpage = $webpage;

        return $this;
    }

    /**
     * Get webpage
     *
     * @return string 
     */
    public function getWebpage()
    {
        return $this->webpage;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Application
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     * @return Application
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

    /**
     * Add installedApplications
     *
     * @param \ManagerITBundle\Entity\InstalledApplication $installedApplications
     * @return Application
     */
    public function addInstalledApplication(\ManagerITBundle\Entity\InstalledApplication $installedApplications)
    {
        $this->installedApplications[] = $installedApplications;

        return $this;
    }

    /**
     * Remove installedApplications
     *
     * @param \ManagerITBundle\Entity\InstalledApplication $installedApplications
     */
    public function removeInstalledApplication(\ManagerITBundle\Entity\InstalledApplication $installedApplications)
    {
        $this->installedApplications->removeElement($installedApplications);
    }

    /**
     * Get installedApplications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInstalledApplications()
    {
        return $this->installedApplications;
    }

    /**
     * Add licenses
     *
     * @param \ManagerITBundle\Entity\License $licenses
     * @return Application
     */
    public function addLicense(\ManagerITBundle\Entity\License $licenses)
    {
        $this->licenses[] = $licenses;

        return $this;
    }

    /**
     * Remove licenses
     *
     * @param \ManagerITBundle\Entity\License $licenses
     */
    public function removeLicense(\ManagerITBundle\Entity\License $licenses)
    {
        $this->licenses->removeElement($licenses);
    }

    /**
     * Get licenses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLicenses()
    {
        return $this->licenses;
    }
}
