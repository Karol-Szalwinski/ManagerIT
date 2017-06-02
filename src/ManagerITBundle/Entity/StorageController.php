<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StorageController
 *
 * @ORM\Table(name="storage_controller")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\StorageControllerRepository")
 */
class StorageController
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
     * @ORM\ManyToOne(targetEntity="Desktop", inversedBy="interfacePcies")
     * @ORM\JoinColumn(name="desktop_id", referencedColumnName="id")
     */
    private $desktop;

    /**
     * @ORM\ManyToOne(targetEntity="Hdd")
     * @ORM\JoinColumn(name="hdd_id", referencedColumnName="id")
     */
    private $hdd;

    /**
     * @ORM\ManyToOne(targetEntity="Ssd")
     * @ORM\JoinColumn(name="ssd_id", referencedColumnName="id")
     */
    private $ssd;

    /**
     * @ORM\ManyToOne(targetEntity="OpticalDrive")
     * @ORM\JoinColumn(name="optical_drive_id", referencedColumnName="id")
     */
    private $opticalDrive;


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
     * Set desktop
     *
     * @param string $desktop
     * @return StorageController
     */
    public function setDesktop($desktop)
    {
        $this->desktop = $desktop;

        return $this;
    }

    /**
     * Get desktop
     *
     * @return string 
     */
    public function getDesktop()
    {
        return $this->desktop;
    }

    /**
     * Set hdd
     *
     * @param string $hdd
     * @return StorageController
     */
    public function setHdd($hdd)
    {
        $this->hdd = $hdd;

        return $this;
    }

    /**
     * Get hdd
     *
     * @return string 
     */
    public function getHdd()
    {
        return $this->hdd;
    }

    /**
     * Set ssd
     *
     * @param string $ssd
     * @return StorageController
     */
    public function setSsd($ssd)
    {
        $this->ssd = $ssd;

        return $this;
    }

    /**
     * Get ssd
     *
     * @return string 
     */
    public function getSsd()
    {
        return $this->ssd;
    }

    /**
     * Set opticalDrive
     *
     * @param string $opticalDrive
     * @return StorageController
     */
    public function setOpticalDrive($opticalDrive)
    {
        $this->opticalDrive = $opticalDrive;

        return $this;
    }

    /**
     * Get opticalDrive
     *
     * @return string 
     */
    public function getOpticalDrive()
    {
        return $this->opticalDrive;
    }
}