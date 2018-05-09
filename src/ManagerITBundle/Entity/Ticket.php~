<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\TicketRepository")
 */
class Ticket
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime")
     */
    private $addDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime", nullable=true)
     */
    private $endDate;


    /**
     * @ORM\ManyToOne(targetEntity="Status")
     *
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     *
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="application", type="string", length=255, nullable=true))
     */
    private $application;

    /**
     * @var string
     *
     * @ORM\Column(name="device", type="string", length=255, nullable=true))
     */
    private $device;

    /**
     * One Ticket has Many Activities.
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="ticket")
     */
    private $activities;

    /**
     * @var string
     *
     * @ORM\Column(name="documents", type="string", length=255, nullable=true))
     */
    private $documents;

    /**
     * Many Ticket have One Requester.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tickets")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $requester;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="ticketsToDo")
     *
     */
    private $assignedTechnicans;

    public function __construct()
    {

        $this->addDate = new \DateTime();
        $this->assignedTechnicans = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set title
     *
     * @param string $title
     * @return Ticket
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Ticket
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
     * @return Ticket
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
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Ticket
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set application
     *
     * @param string $application
     * @return Ticket
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set device
     *
     * @param string $device
     * @return Ticket
     */
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * Set activities
     *
     * @param string $activities
     * @return Ticket
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;

        return $this;
    }

    /**
     * Get activities
     *
     * @return string
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set documents
     *
     * @param string $documents
     * @return Ticket
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Get documents
     *
     * @return string
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Set status
     *
     * @param \ManagerITBundle\Entity\Status $status
     * @return Ticket
     */
    public function setStatus(\ManagerITBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \ManagerITBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set category
     *
     * @param \ManagerITBundle\Entity\Category $category
     * @return Ticket
     */
    public function setCategory(\ManagerITBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ManagerITBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set requester
     *
     * @param \ManagerITBundle\Entity\User $requester
     * @return Ticket
     */
    public function setRequester(\ManagerITBundle\Entity\User $requester = null)
    {
        $this->requester = $requester;

        return $this;
    }

    /**
     * Get requester
     *
     * @return \ManagerITBundle\Entity\User
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * Add assignedTechnicans
     *
     * @param \ManagerITBundle\Entity\User $assignedTechnicans
     * @return Ticket
     */
    public function addAssignedTechnican(\ManagerITBundle\Entity\User $assignedTechnican)
    {
        $this->assignedTechnicans[] = $assignedTechnican;

        return $this;
    }

    /**
     * Remove assignedTechnicans
     *
     * @param \ManagerITBundle\Entity\User $assignedTechnicans
     */
    public function removeAssignedTechnican(\ManagerITBundle\Entity\User $assignedTechnican)
    {
        $this->assignedTechnicans->removeElement($assignedTechnican);
    }

    /**
     * Get assignedTechnicans
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssignedTechnicans()
    {
        return $this->assignedTechnicans;
    }

    public function hasAssignedTechnican(User $assignedTechnican)
    {
        return $this->assignedTechnicans->contains($assignedTechnican);
    }

    /**
     * Add activities
     *
     * @param \ManagerITBundle\Entity\Activity $activities
     * @return Ticket
     */
    public function addActivity(\ManagerITBundle\Entity\Activity $activities)
    {
        $this->activities[] = $activities;

        return $this;
    }

    /**
     * Remove activities
     *
     * @param \ManagerITBundle\Entity\Activity $activities
     */
    public function removeActivity(\ManagerITBundle\Entity\Activity $activities)
    {
        $this->activities->removeElement($activities);
    }
}
