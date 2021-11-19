<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity
 */
class Type
{
    /**
     * @var int
     *
     * @ORM\Column(name="typ_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typId;

    /**
     * @var string
     *
     * @ORM\Column(name="typ_name", type="string", length=20, nullable=false)
     */
    private $typName;

    /**
     * @var string
     *
     * @ORM\Column(name="typ_coef", type="decimal", precision=3, scale=2, nullable=false)
     */
    private $typCoef;

    public function getTypId(): ?int
    {
        return $this->typId;
    }

    public function getTypName(): ?string
    {
        return $this->typName;
    }

    public function setTypName(string $typName): self
    {
        $this->typName = $typName;

        return $this;
    }

    public function getTypCoef(): ?string
    {
        return $this->typCoef;
    }

    public function setTypCoef(string $typCoef): self
    {
        $this->typCoef = $typCoef;

        return $this;
    }


}
