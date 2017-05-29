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
     * @ORM\ManyToMany(targetEntity="DesktopRam")
     * @ORM\JoinTable(name="ramslot_desktopram",
     *      joinColumns={@ORM\JoinColumn(name="ramslot_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="desktopram_id", referencedColumnName="id")}
     *      )
     */
    private $rams;


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
     * @return RamSlot
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
     * Set rams
     *
     * @param string $rams
     * @return RamSlot
     */
    public function setRams($rams)
    {
        $this->rams = $rams;

        return $this;
    }

    /**
     * Get rams
     *
     * @return string 
     */
    public function getRams()
    {
        return $this->rams;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rams
     *
     * @param \ManagerITBundle\Entity\DesktopRam $rams
     * @return RamSlot
     */
    public function addRam(\ManagerITBundle\Entity\DesktopRam $rams)
    {
        $this->rams[] = $rams;

        return $this;
    }

    /**
     * Remove rams
     *
     * @param \ManagerITBundle\Entity\DesktopRam $rams
     */
    public function removeRam(\ManagerITBundle\Entity\DesktopRam $rams)
    {
        $this->rams->removeElement($rams);
    }
}
