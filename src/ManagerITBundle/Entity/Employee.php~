<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\EmployeeRepository")
 */
class Employee
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255)
     */
    private $job;
    
    /**
      * @ORM\ManyToOne(targetEntity="Departament", inversedBy="employees")
      * @ORM\JoinColumn(name="departament_id", referencedColumnName="id")
      */
    private $departament;
    
    /**
     * @ORM\ManyToMany(targetEntity="License", inversedBy="employees")
     * @ORM\JoinTable(name="employees_licenses")
     */
    private $licenses;
    
    /**
     * @ORM\ManyToMany(targetEntity="Desktop", inversedBy="employees")
     * @ORM\JoinTable(name="employees_desktops")
     */
    private $desktops;
    
    /**
     * @ORM\ManyToMany(targetEntity="Laptop", inversedBy="employees")
     * @ORM\JoinTable(name="employees_laptops")
     */
    private $laptops;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->licenses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->desktops = new \Doctrine\Common\Collections\ArrayCollection();
        $this->laptops = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Employee
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
     * Set surname
     *
     * @param string $surname
     * @return Employee
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Employee
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Employee
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set job
     *
     * @param string $job
     * @return Employee
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
     * @param \ManagerITBundle\Entity\Departament $departament
     * @return Employee
     */
    public function setDepartament(\ManagerITBundle\Entity\Departament $departament = null)
    {
        $this->departament = $departament;

        return $this;
    }

    /**
     * Get departament
     *
     * @return \ManagerITBundle\Entity\Departament 
     */
    public function getDepartament()
    {
        return $this->departament;
    }

    /**
     * Add licenses
     *
     * @param \ManagerITBundle\Entity\License $licenses
     * @return Employee
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

    /**
     * Get licenses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * Add desktops
     *
     * @param \ManagerITBundle\Entity\Desktop $desktops
     * @return Employee
     */
    public function addDesktop(\ManagerITBundle\Entity\Desktop $desktops)
    {
        $this->desktops[] = $desktops;

        return $this;
    }

    /**
     * Remove desktops
     *
     * @param \ManagerITBundle\Entity\Desktop $desktops
     */
    public function removeDesktop(\ManagerITBundle\Entity\Desktop $desktops)
    {
        $this->desktops->removeElement($desktops);
    }

    /**
     * Get desktops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDesktops()
    {
        return $this->desktops;
    }

    /**
     * Add laptops
     *
     * @param \ManagerITBundle\Entity\Laptop $laptops
     * @return Employee
     */
    public function addLaptop(\ManagerITBundle\Entity\Laptop $laptops)
    {
        $this->laptops[] = $laptops;

        return $this;
    }

    /**
     * Remove laptops
     *
     * @param \ManagerITBundle\Entity\Laptop $laptops
     */
    public function removeLaptop(\ManagerITBundle\Entity\Laptop $laptops)
    {
        $this->laptops->removeElement($laptops);
    }

    /**
     * Get laptops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLaptops()
    {
        return $this->laptops;
    }
}
