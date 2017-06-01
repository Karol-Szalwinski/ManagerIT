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
     * @ORM\ManyToOne(targetEntity="Desktop", inversedBy="ramslots")
     * @ORM\JoinColumn(name="desktop_id", referencedColumnName="id")
     */
    private $desktop;

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
     * Set desktop
     *
     * @param \ManagerITBundle\Entity\Desktop $desktop
     * @return RamSlot
     */
    public function setDesktop(\ManagerITBundle\Entity\Desktop $desktop = null)
    {
        $this->desktop = $desktop;

        return $this;
    }

    /**
     * Get desktop
     *
     * @return \ManagerITBundle\Entity\Desktop 
     */
    public function getDesktop()
    {
        return $this->desktop;
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
