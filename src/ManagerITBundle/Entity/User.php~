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

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $usersurname;

      /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255)
     */
    private $job;

    /**
     * @ORM\ManyToOne(targetEntity="Departament", inversedBy="users")
     * @ORM\JoinColumn(name="departament_id", referencedColumnName="id")
     */
    private $departament;

    /**
     * @ORM\ManyToMany(targetEntity="License", inversedBy="users")
     * @ORM\JoinTable(name="users_licenses")
     */
    private $licenses;

    /**
     * @ORM\ManyToMany(targetEntity="Computer", mappedBy="users")
     *
     */
    private $computers;

    /**
     * @ORM\ManyToMany(targetEntity="Tablet", mappedBy="users")
     *
     */
    private $tablets;

    /**
     * @ORM\ManyToMany(targetEntity="Phone", mappedBy="users")
     *
     */
    private $phones;

    /**
     * @ORM\ManyToMany(targetEntity="Printer", mappedBy="users")
     *
     */
    private $printers;

    public function __construct() {

        parent::__construct();
        $this->tickets = new ArrayCollection();
        $this->ticketsToDo = new ArrayCollection();
        $this->enabled = 1;
        $this->computers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tablets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->printers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->licenses = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set usersurname
     *
     * @param string $usersurname
     * @return User
     */
    public function setUsersurname($usersurname)
    {
        $this->usersurname = $usersurname;

        return $this;
    }

    /**
     * Get usersurname
     *
     * @return string 
     */
    public function getUsersurname()
    {
        return $this->usersurname;
    }

    /**
     * Set job
     *
     * @param string $job
     * @return User
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set departament
     *
     * @param string $departament
     * @return User
     */
    public function setDepartament($departament)
    {
        $this->departament = $departament;

        return $this;
    }

    /**
     * Get departament
     *
     * @return string 
     */
    public function getDepartament()
    {
        return $this->departament;
    }

    /**
     * Set licenses
     *
     * @param string $licenses
     * @return User
     */
    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;

        return $this;
    }

    /**
     * Get licenses
     *
     * @return string 
     */
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * Set computers
     *
     * @param string $computers
     * @return User
     */
    public function setComputers($computers)
    {
        $this->computers = $computers;

        return $this;
    }

    /**
     * Get computers
     *
     * @return string 
     */
    public function getComputers()
    {
        return $this->computers;
    }

    /**
     * Set phones
     *
     * @param string $phones
     * @return User
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * Get phones
     *
     * @return string 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Set printers
     *
     * @param string $printers
     * @return User
     */
    public function setPrinters($printers)
    {
        $this->printers = $printers;

        return $this;
    }

    /**
     * Get printers
     *
     * @return string 
     */
    public function getPrinters()
    {
        return $this->printers;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Add computers
     *
     * @param \ManagerITBundle\Entity\Computer $computers
     * @return User
     */
    public function addComputer(\ManagerITBundle\Entity\Computer $computers)
    {
        $this->computers[] = $computers;

        return $this;
    }

    /**
     * Remove computers
     *
     * @param \ManagerITBundle\Entity\Computer $computers
     */
    public function removeComputer(\ManagerITBundle\Entity\Computer $computers)
    {
        $this->computers->removeElement($computers);
    }

    /**
     * Add tablets
     *
     * @param \ManagerITBundle\Entity\Tablet $tablets
     * @return User
     */
    public function addTablet(\ManagerITBundle\Entity\Tablet $tablets)
    {
        $this->tablets[] = $tablets;

        return $this;
    }

    /**
     * Remove tablets
     *
     * @param \ManagerITBundle\Entity\Tablet $tablets
     */
    public function removeTablet(\ManagerITBundle\Entity\Tablet $tablets)
    {
        $this->tablets->removeElement($tablets);
    }

    /**
     * Get tablets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTablets()
    {
        return $this->tablets;
    }

    /**
     * Add phones
     *
     * @param \ManagerITBundle\Entity\Phone $phones
     * @return User
     */
    public function addPhone(\ManagerITBundle\Entity\Phone $phones)
    {
        $this->phones[] = $phones;

        return $this;
    }

    /**
     * Remove phones
     *
     * @param \ManagerITBundle\Entity\Phone $phones
     */
    public function removePhone(\ManagerITBundle\Entity\Phone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Add printers
     *
     * @param \ManagerITBundle\Entity\Printer $printers
     * @return User
     */
    public function addPrinter(\ManagerITBundle\Entity\Printer $printers)
    {
        $this->printers[] = $printers;

        return $this;
    }

    /**
     * Remove printers
     *
     * @param \ManagerITBundle\Entity\Printer $printers
     */
    public function removePrinter(\ManagerITBundle\Entity\Printer $printers)
    {
        $this->printers->removeElement($printers);
    }

    /**
     * Add licenses
     *
     * @param \ManagerITBundle\Entity\License $licenses
     * @return User
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
}
