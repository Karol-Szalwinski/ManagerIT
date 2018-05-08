<?php

namespace ManagerITBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * One User has Many Tickets.
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="requester")
     */
    private $tickets;

    /**
     * @ORM\ManyToMany(targetEntity="Ticket", inversedBy="assignedTechnicans")
     *
     * @ORM\JoinTable(name="assignedTechnicans_tickets")
     */
    private $ticketsToDo;

    public function __construct() {

        parent::__construct();
        $this->tickets = new ArrayCollection();
        $this->ticketsToDo = new ArrayCollection();
        $this->enabled = 1;
    }

    /**
     * Overriding Fos User class due to impossible to set default role ROLE_USER 
     * @see User at line 138
     * @link https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Model/User.php#L138
     * {@inheritdoc}
     */
    public function addRole($role) {
        $role = strtoupper($role);

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }



    /**
     * Add tickets
     *
     * @param \ManagerITBundle\Entity\Ticket $tickets
     * @return User
     */
    public function addTicket(\ManagerITBundle\Entity\Ticket $tickets)
    {
        $this->tickets[] = $tickets;

        return $this;
    }

    /**
     * Remove tickets
     *
     * @param \ManagerITBundle\Entity\Ticket $tickets
     */
    public function removeTicket(\ManagerITBundle\Entity\Ticket $tickets)
    {
        $this->tickets->removeElement($tickets);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Add ticketsToDo
     *
     * @param \ManagerITBundle\Entity\Ticket $ticketsToDo
     * @return User
     */
    public function addTicketsToDo(\ManagerITBundle\Entity\Ticket $ticketToDo)
    {
        $this->ticketsToDo[] = $ticketToDo;

        return $this;
    }

    /**
     * Remove ticketsToDo
     *
     * @param \ManagerITBundle\Entity\Ticket $ticketsToDo
     */
    public function removeTicketsToDo(\ManagerITBundle\Entity\Ticket $ticketToDo)
    {
        $this->ticketsToDo->removeElement($ticketToDo);
    }

    /**
     * Get ticketsToDo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTicketsToDo()
    {
        return $this->ticketsToDo;
    }
}
