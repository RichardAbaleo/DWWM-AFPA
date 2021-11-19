<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="pro_sup_id", columns={"pro_sup_id"}), @ORM\Index(name="pro_cat_id", columns={"pro_cat_id"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="pro_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $proId;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_name", type="string", length=50, nullable=false)
     */
    private $proName;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_ref", type="string", length=10, nullable=false)
     */
    private $proRef;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pro_ean", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $proEan = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_price", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $proPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pro_description", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $proDescription = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="pro_stock", type="integer", nullable=false)
     */
    private $proStock;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pro_picture", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $proPicture = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="pro_add_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $proAddDate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="pro_update_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $proUpdateDate = 'NULL';

    /**
     * @var \Supplier
     *
     * @ORM\ManyToOne(targetEntity="Supplier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_sup_id", referencedColumnName="sup_id")
     * })
     */
    private $proSup;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_cat_id", referencedColumnName="cat_id")
     * })
     */
    private $proCat;

    public function getProId(): ?int
    {
        return $this->proId;
    }

    public function getProName(): ?string
    {
        return $this->proName;
    }

    public function setProName(string $proName): self
    {
        $this->proName = $proName;

        return $this;
    }

    public function getProRef(): ?string
    {
        return $this->proRef;
    }

    public function setProRef(string $proRef): self
    {
        $this->proRef = $proRef;

        return $this;
    }

    public function getProEan(): ?int
    {
        return $this->proEan;
    }

    public function setProEan(?int $proEan): self
    {
        $this->proEan = $proEan;

        return $this;
    }

    public function getProPrice(): ?string
    {
        return $this->proPrice;
    }

    public function setProPrice(string $proPrice): self
    {
        $this->proPrice = $proPrice;

        return $this;
    }

    public function getProDescription(): ?string
    {
        return $this->proDescription;
    }

    public function setProDescription(?string $proDescription): self
    {
        $this->proDescription = $proDescription;

        return $this;
    }

    public function getProStock(): ?int
    {
        return $this->proStock;
    }

    public function setProStock(int $proStock): self
    {
        $this->proStock = $proStock;

        return $this;
    }

    public function getProPicture(): ?string
    {
        return $this->proPicture;
    }

    public function setProPicture(?string $proPicture): self
    {
        $this->proPicture = $proPicture;

        return $this;
    }

    public function getProAddDate(): ?\DateTimeInterface
    {
        return $this->proAddDate;
    }

    public function setProAddDate(?\DateTimeInterface $proAddDate): self
    {
        $this->proAddDate = $proAddDate;

        return $this;
    }

    public function getProUpdateDate(): ?\DateTimeInterface
    {
        return $this->proUpdateDate;
    }

    public function setProUpdateDate(?\DateTimeInterface $proUpdateDate): self
    {
        $this->proUpdateDate = $proUpdateDate;

        return $this;
    }

    public function getProSup(): ?Supplier
    {
        return $this->proSup;
    }

    public function setProSup(?Supplier $proSup): self
    {
        $this->proSup = $proSup;

        return $this;
    }

    public function getProCat(): ?Category
    {
        return $this->proCat;
    }

    public function setProCat(?Category $proCat): self
    {
        $this->proCat = $proCat;

        return $this;
    }


}
