<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="ord_cou_id", columns={"ord_cou_id"}), @ORM\Index(name="ord_bill_cou_id", columns={"ord_bill_cou_id"}), @ORM\Index(name="ord_use_id", columns={"ord_use_id"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="ord_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ord_order_date", type="datetime", nullable=false)
     */
    private $ordOrderDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ord_payment_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $ordPaymentDate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ord_ship_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $ordShipDate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ord_reception_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $ordReceptionDate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ord_status", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $ordStatus = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="ord_address", type="string", length=50, nullable=false)
     */
    private $ordAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="ord_city", type="string", length=50, nullable=false)
     */
    private $ordCity;

    /**
     * @var string
     *
     * @ORM\Column(name="ord_zipcode", type="string", length=5, nullable=false)
     */
    private $ordZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="ord_bill_address", type="string", length=50, nullable=false)
     */
    private $ordBillAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="ord_bill_city", type="string", length=50, nullable=false)
     */
    private $ordBillCity;

    /**
     * @var string
     *
     * @ORM\Column(name="ord_bill_zipcode", type="string", length=5, nullable=false)
     */
    private $ordBillZipcode;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ord_cou_id", referencedColumnName="cou_id")
     * })
     */
    private $ordCou;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ord_use_id", referencedColumnName="use_id")
     * })
     */
    private $ordUse;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ord_bill_cou_id", referencedColumnName="cou_id")
     * })
     */
    private $ordBillCou;

    public function getOrdId(): ?int
    {
        return $this->ordId;
    }

    public function getOrdOrderDate(): ?\DateTimeInterface
    {
        return $this->ordOrderDate;
    }

    public function setOrdOrderDate(\DateTimeInterface $ordOrderDate): self
    {
        $this->ordOrderDate = $ordOrderDate;

        return $this;
    }

    public function getOrdPaymentDate(): ?\DateTimeInterface
    {
        return $this->ordPaymentDate;
    }

    public function setOrdPaymentDate(?\DateTimeInterface $ordPaymentDate): self
    {
        $this->ordPaymentDate = $ordPaymentDate;

        return $this;
    }

    public function getOrdShipDate(): ?\DateTimeInterface
    {
        return $this->ordShipDate;
    }

    public function setOrdShipDate(?\DateTimeInterface $ordShipDate): self
    {
        $this->ordShipDate = $ordShipDate;

        return $this;
    }

    public function getOrdReceptionDate(): ?\DateTimeInterface
    {
        return $this->ordReceptionDate;
    }

    public function setOrdReceptionDate(?\DateTimeInterface $ordReceptionDate): self
    {
        $this->ordReceptionDate = $ordReceptionDate;

        return $this;
    }

    public function getOrdStatus(): ?string
    {
        return $this->ordStatus;
    }

    public function setOrdStatus(?string $ordStatus): self
    {
        $this->ordStatus = $ordStatus;

        return $this;
    }

    public function getOrdAddress(): ?string
    {
        return $this->ordAddress;
    }

    public function setOrdAddress(string $ordAddress): self
    {
        $this->ordAddress = $ordAddress;

        return $this;
    }

    public function getOrdCity(): ?string
    {
        return $this->ordCity;
    }

    public function setOrdCity(string $ordCity): self
    {
        $this->ordCity = $ordCity;

        return $this;
    }

    public function getOrdZipcode(): ?string
    {
        return $this->ordZipcode;
    }

    public function setOrdZipcode(string $ordZipcode): self
    {
        $this->ordZipcode = $ordZipcode;

        return $this;
    }

    public function getOrdBillAddress(): ?string
    {
        return $this->ordBillAddress;
    }

    public function setOrdBillAddress(string $ordBillAddress): self
    {
        $this->ordBillAddress = $ordBillAddress;

        return $this;
    }

    public function getOrdBillCity(): ?string
    {
        return $this->ordBillCity;
    }

    public function setOrdBillCity(string $ordBillCity): self
    {
        $this->ordBillCity = $ordBillCity;

        return $this;
    }

    public function getOrdBillZipcode(): ?string
    {
        return $this->ordBillZipcode;
    }

    public function setOrdBillZipcode(string $ordBillZipcode): self
    {
        $this->ordBillZipcode = $ordBillZipcode;

        return $this;
    }

    public function getOrdCou(): ?Country
    {
        return $this->ordCou;
    }

    public function setOrdCou(?Country $ordCou): self
    {
        $this->ordCou = $ordCou;

        return $this;
    }

    public function getOrdUse(): ?Users
    {
        return $this->ordUse;
    }

    public function setOrdUse(?Users $ordUse): self
    {
        $this->ordUse = $ordUse;

        return $this;
    }

    public function getOrdBillCou(): ?Country
    {
        return $this->ordBillCou;
    }

    public function setOrdBillCou(?Country $ordBillCou): self
    {
        $this->ordBillCou = $ordBillCou;

        return $this;
    }


}
