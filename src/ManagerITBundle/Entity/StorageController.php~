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
     * @ORM\ManyToOne(targetEntity="Computer", inversedBy="storageControllers")
     * @ORM\JoinColumn(name="computer_id", referencedColumnName="id")
     */
    private $computer;

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
     * Set computer
     *
     * @param \ManagerITBundle\Entity\Computer $computer
     * @return StorageController
     */
    public function setComputer(\ManagerITBundle\Entity\Computer $computer = null)
    {
        $this->computer = $computer;

        return $this;
    }

    /**
     * Get computer
     *
     * @return \ManagerITBundle\Entity\Computer 
     */
    public function getComputer()
    {
        return $this->computer;
    }

    /**
     * Set hdd
     *
     * @param \ManagerITBundle\Entity\Hdd $hdd
     * @return StorageController
     */
    public function setHdd(\ManagerITBundle\Entity\Hdd $hdd = null)
    {
        $this->hdd = $hdd;

        return $this;
    }

    /**
     * Get hdd
     *
     * @return \ManagerITBundle\Entity\Hdd 
     */
    public function getHdd()
    {
        return $this->hdd;
    }

    /**
     * Set ssd
     *
     * @param \ManagerITBundle\Entity\Ssd $ssd
     * @return StorageController
     */
    public function setSsd(\ManagerITBundle\Entity\Ssd $ssd = null)
    {
        $this->ssd = $ssd;

        return $this;
    }

    /**
     * Get ssd
     *
     * @return \ManagerITBundle\Entity\Ssd 
     */
    public function getSsd()
    {
        return $this->ssd;
    }

    /**
     * Set opticalDrive
     *
     * @param \ManagerITBundle\Entity\OpticalDrive $opticalDrive
     * @return StorageController
     */
    public function setOpticalDrive(\ManagerITBundle\Entity\OpticalDrive $opticalDrive = null)
    {
        $this->opticalDrive = $opticalDrive;

        return $this;
    }

    /**
     * Get opticalDrive
     *
     * @return \ManagerITBundle\Entity\OpticalDrive 
     */
    public function getOpticalDrive()
    {
        return $this->opticalDrive;
    }
}
