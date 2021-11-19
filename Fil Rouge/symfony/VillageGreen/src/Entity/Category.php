<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category", indexes={@ORM\Index(name="cat_sup_id", columns={"cat_sup_id"})})
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="cat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $catId;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_name", type="string", length=20, nullable=false)
     */
    private $catName;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_sup_id", referencedColumnName="cat_id")
     * })
     */
    private $catSup;

    public function getCatId(): ?int
    {
        return $this->catId;
    }

    public function getCatName(): ?string
    {
        return $this->catName;
    }

    public function setCatName(string $catName): self
    {
        $this->catName = $catName;

        return $this;
    }

    public function getCatSup(): ?self
    {
        return $this->catSup;
    }

    public function setCatSup(?self $catSup): self
    {
        $this->catSup = $catSup;

        return $this;
    }


}
