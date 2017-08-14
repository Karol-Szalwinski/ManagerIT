<?php

namespace ManagerITBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="ManagerITBundle\Repository\DocumentRepository")
 */
class Document
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerName", type="string", length=255)
     */
    private $sellerName;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerPhoneNumber", type="string", length=255)
     */
    private $sellerPhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="purchaseDate", type="datetimetz")
     */
    private $purchaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addDate", type="datetime", nullable=true)
     */
    private $addDate;

    /**
     * @var string
     *
     * @ORM\Column(name="pdfScans", type="string", length=255)
     */
    private $pdfScans;


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
     * Set type
     *
     * @param string $type
     * @return Document
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return Document
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set sellerName
     *
     * @param string $sellerName
     * @return Document
     */
    public function setSellerName($sellerName)
    {
        $this->sellerName = $sellerName;

        return $this;
    }

    /**
     * Get sellerName
     *
     * @return string 
     */
    public function getSellerName()
    {
        return $this->sellerName;
    }

    /**
     * Set sellerPhoneNumber
     *
     * @param string $sellerPhoneNumber
     * @return Document
     */
    public function setSellerPhoneNumber($sellerPhoneNumber)
    {
        $this->sellerPhoneNumber = $sellerPhoneNumber;

        return $this;
    }

    /**
     * Get sellerPhoneNumber
     *
     * @return string 
     */
    public function getSellerPhoneNumber()
    {
        return $this->sellerPhoneNumber;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Document
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set purchaseDate
     *
     * @param \DateTime $purchaseDate
     * @return Document
     */
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    /**
     * Get purchaseDate
     *
     * @return \DateTime 
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     * @return Document
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
     * Set pdfScans
     *
     * @param string $pdfScans
     * @return Document
     */
    public function setPdfScans($pdfScans)
    {
        $this->pdfScans = $pdfScans;

        return $this;
    }

    /**
     * Get pdfScans
     *
     * @return string 
     */
    public function getPdfScans()
    {
        return $this->pdfScans;
    }
}
