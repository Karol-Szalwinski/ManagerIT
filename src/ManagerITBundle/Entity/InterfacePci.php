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

    /**
     * @var string
     *
     * @ORM\Column(name="computer", type="string", length=255)
     */
    private $computer;

    /**
     * @var string
     *
     * @ORM\Column(name="card", type="string", length=255)
     */
    private $card;


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
     * @param string $computer
     * @return InterfacePci
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

    /**
     * Set card
     *
     * @param string $card
     * @return InterfacePci
     */
    public function setCard($card)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get card
     *
     * @return string 
     */
    public function getCard()
    {
        return $this->card;
    }
}
