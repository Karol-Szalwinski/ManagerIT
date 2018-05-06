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
     * @var string
     *
     * @ORM\Column(name="activities", type="string", length=255, nullable=true))
     */
    private $activities;

    /**
     * @var string
     *
     * @ORM\Column(name="documents", type="string", length=255, nullable=true))
     */
    private $documents;

    /**
     * @var string
     *
     * @ORM\Column(name="requester", type="string", length=255)
     */
    private $requester;

    /**
     * @var string
     *
     * @ORM\Column(name="assignedTechnican", type="string", length=255, nullable=true)
     */
    private $assignedTechnican;

    public function __construct()
    {

        $this->addDate = new \DateTime();
      
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
     * Set category
     *
     * @param string $category
     * @return Ticket
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
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
     * Set requester
     *
     * @param string $requester
     * @return Ticket
     */
    public function setRequester($requester)
    {
        $this->requester = $requester;

        return $this;
    }

    /**
     * Get requester
     *
     * @return string 
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * Set assignedTechnican
     *
     * @param string $assignedTechnican
     * @return Ticket
     */
    public function setAssignedTechnican($assignedTechnican)
    {
        $this->assignedTechnican = $assignedTechnican;

        return $this;
    }

    /**
     * Get assignedTechnican
     *
     * @return string 
     */
    public function getAssignedTechnican()
    {
        return $this->assignedTechnican;
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
}
