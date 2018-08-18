<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RamSlot
 *
 * @ORM\Table(name="ram_slot")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\RamSlotRepository")
 */
class RamSlot
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
     * @ORM\ManyToOne(targetEntity="Computer", inversedBy="ramslots")
     * @ORM\JoinColumn(name="computer_id", referencedColumnName="id")
     */
    private $computer;

    /**
     * @ORM\ManyToOne(targetEntity="DesktopRam", inversedBy="ramSlots")
     * @ORM\JoinColumn(name="desktop_ram_id", referencedColumnName="id")
     */
    private $ram;



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
     * @return RamSlot
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
     * Set ram
     *
     * @param \ManagerITBundle\Entity\DesktopRam $ram
     * @return RamSlot
     */
    public function setRam(\ManagerITBundle\Entity\DesktopRam $ram = null)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return \ManagerITBundle\Entity\DesktopRam 
     */
    public function getRam()
    {
        return $this->ram;
    }
}
