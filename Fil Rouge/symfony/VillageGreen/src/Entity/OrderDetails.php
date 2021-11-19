<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDetails
 *
 * @ORM\Table(name="order_details", indexes={@ORM\Index(name="ode_ord_id", columns={"ode_ord_id"}), @ORM\Index(name="ode_pro_id", columns={"ode_pro_id"})})
 * @ORM\Entity
 */
class OrderDetails
{
    /**
     * @var int
     *
     * @ORM\Column(name="ode_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $odeId;

    /**
     * @var string
     *
     * @ORM\Column(name="ode_unit_price", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $odeUnitPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="ode_quantity", type="integer", nullable=false)
     */
    private $odeQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="ode_vat", type="decimal", precision=2, scale=2, nullable=false)
     */
    private $odeVat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ode_discount", type="decimal", precision=2, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $odeDiscount = 'NULL';

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ode_ord_id", referencedColumnName="ord_id")
     * })
     */
    private $odeOrd;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ode_pro_id", referencedColumnName="pro_id")
     * })
     */
    private $odePro;

    public function getOdeId(): ?int
    {
        return $this->odeId;
    }

    public function getOdeUnitPrice(): ?string
    {
        return $this->odeUnitPrice;
    }

    public function setOdeUnitPrice(string $odeUnitPrice): self
    {
        $this->odeUnitPrice = $odeUnitPrice;

        return $this;
    }

    public function getOdeQuantity(): ?int
    {
        return $this->odeQuantity;
    }

    public function setOdeQuantity(int $odeQuantity): self
    {
        $this->odeQuantity = $odeQuantity;

        return $this;
    }

    public function getOdeVat(): ?string
    {
        return $this->odeVat;
    }

    public function setOdeVat(string $odeVat): self
    {
        $this->odeVat = $odeVat;

        return $this;
    }

    public function getOdeDiscount(): ?string
    {
        return $this->odeDiscount;
    }

    public function setOdeDiscount(?string $odeDiscount): self
    {
        $this->odeDiscount = $odeDiscount;

        return $this;
    }

    public function getOdeOrd(): ?Orders
    {
        return $this->odeOrd;
    }

    public function setOdeOrd(?Orders $odeOrd): self
    {
        $this->odeOrd = $odeOrd;

        return $this;
    }

    public function getOdePro(): ?Product
    {
        return $this->odePro;
    }

    public function setOdePro(?Product $odePro): self
    {
        $this->odePro = $odePro;

        return $this;
    }


}
