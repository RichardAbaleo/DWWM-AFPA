<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var string
     *
     * @ORM\Column(name="cou_id", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $couId;

    /**
     * @var string
     *
     * @ORM\Column(name="cou_name", type="string", length=50, nullable=false)
     */
    private $couName;

    public function getCouId(): ?string
    {
        return $this->couId;
    }

    public function getCouName(): ?string
    {
        return $this->couName;
    }

    public function setCouName(string $couName): self
    {
        $this->couName = $couName;

        return $this;
    }


}
