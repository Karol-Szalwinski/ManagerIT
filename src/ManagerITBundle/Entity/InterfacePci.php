<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterfacePci
 *
 * @ORM\Table(name="interface_pci")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\InterfacePciRepository")
 */
class InterfacePci
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

//    /**
//     * @ORM\ManyToOne(targetEntity="Desktop", inversedBy="interfacePcies")
//     * @ORM\JoinColumn(name="desktop_id", referencedColumnName="id")
//     */
//    private $desktop;

    /**
     * @ORM\ManyToOne(targetEntity="Computer", inversedBy="pciInterfaces")
     * @ORM\JoinColumn(name="computer_id", referencedColumnName="id")
     */
    private $computer;

    /**
     * @ORM\ManyToOne(targetEntity="Gpu")
     * @ORM\JoinColumn(name="$cardGpu_id", referencedColumnName="id")
     */
    private $cardGpu;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

//    /**
//     * Set desktop
//     *
//     * @param \ManagerITBundle\Entity\Desktop $desktop
//     * @return InterfacePci
//     */
//    public function setDesktop(\ManagerITBundle\Entity\Desktop $desktop = null)
//    {
//        $this->desktop = $desktop;
//
//        return $this;
//    }
//
//    /**
//     * Get desktop
//     *
//     * @return \ManagerITBundle\Entity\Desktop
//     */
//    public function getDesktop()
//    {
//        return $this->desktop;
//    }

    /**
     * Set cardGpu
     *
     * @param \ManagerITBundle\Entity\Gpu $cardGpu
     * @return InterfacePci
     */
    public function setCardGpu(\ManagerITBundle\Entity\Gpu $cardGpu = null)
    {
        $this->cardGpu = $cardGpu;

        return $this;
    }

    /**
     * Get cardGpu
     *
     * @return \ManagerITBundle\Entity\Gpu 
     */
    public function getCardGpu()
    {
        return $this->cardGpu;
    }

    /**
     * Set computer
     *
     * @param \ManagerITBundle\Entity\Computer $computer
     * @return InterfacePci
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
}
