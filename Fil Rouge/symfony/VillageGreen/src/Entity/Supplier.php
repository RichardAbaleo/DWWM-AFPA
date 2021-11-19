<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplier
 *
 * @ORM\Table(name="supplier", indexes={@ORM\Index(name="sup_cou_id", columns={"sup_cou_id"})})
 * @ORM\Entity
 */
class Supplier
{
    /**
     * @var int
     *
     * @ORM\Column(name="sup_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $supId;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_name", type="string", length=30, nullable=false)
     */
    private $supName;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_city", type="string", length=20, nullable=false)
     */
    private $supCity;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_address", type="string", length=50, nullable=false)
     */
    private $supAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_zipcode", type="string", length=5, nullable=false)
     */
    private $supZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_contact", type="string", length=30, nullable=false)
     */
    private $supContact;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_phone", type="string", length=20, nullable=false)
     */
    private $supPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_mail", type="string", length=50, nullable=false)
     */
    private $supMail;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sup_cou_id", referencedColumnName="cou_id")
     * })
     */
    private $supCou;

    public function getSupId(): ?int
    {
        return $this->supId;
    }

    public function getSupName(): ?string
    {
        return $this->supName;
    }

    public function setSupName(string $supName): self
    {
        $this->supName = $supName;

        return $this;
    }

    public function getSupCity(): ?string
    {
        return $this->supCity;
    }

    public function setSupCity(string $supCity): self
    {
        $this->supCity = $supCity;

        return $this;
    }

    public function getSupAddress(): ?string
    {
        return $this->supAddress;
    }

    public function setSupAddress(string $supAddress): self
    {
        $this->supAddress = $supAddress;

        return $this;
    }

    public function getSupZipcode(): ?string
    {
        return $this->supZipcode;
    }

    public function setSupZipcode(string $supZipcode): self
    {
        $this->supZipcode = $supZipcode;

        return $this;
    }

    public function getSupContact(): ?string
    {
        return $this->supContact;
    }

    public function setSupContact(string $supContact): self
    {
        $this->supContact = $supContact;

        return $this;
    }

    public function getSupPhone(): ?string
    {
        return $this->supPhone;
    }

    public function setSupPhone(string $supPhone): self
    {
        $this->supPhone = $supPhone;

        return $this;
    }

    public function getSupMail(): ?string
    {
        return $this->supMail;
    }

    public function setSupMail(string $supMail): self
    {
        $this->supMail = $supMail;

        return $this;
    }

    public function getSupCou(): ?Country
    {
        return $this->supCou;
    }

    public function setSupCou(?Country $supCou): self
    {
        $this->supCou = $supCou;

        return $this;
    }


}
