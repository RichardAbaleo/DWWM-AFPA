<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commercial
 *
 * @ORM\Table(name="commercial")
 * @ORM\Entity
 */
class Commercial
{
    /**
     * @var int
     *
     * @ORM\Column(name="com_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $comId;

    /**
     * @var string
     *
     * @ORM\Column(name="com_name", type="string", length=20, nullable=false)
     */
    private $comName;

    /**
     * @var string
     *
     * @ORM\Column(name="com_mail", type="string", length=50, nullable=false)
     */
    private $comMail;

    /**
     * @var string
     *
     * @ORM\Column(name="com_password", type="string", length=50, nullable=false)
     */
    private $comPassword;

    public function getComId(): ?int
    {
        return $this->comId;
    }

    public function getComName(): ?string
    {
        return $this->comName;
    }

    public function setComName(string $comName): self
    {
        $this->comName = $comName;

        return $this;
    }

    public function getComMail(): ?string
    {
        return $this->comMail;
    }

    public function setComMail(string $comMail): self
    {
        $this->comMail = $comMail;

        return $this;
    }

    public function getComPassword(): ?string
    {
        return $this->comPassword;
    }

    public function setComPassword(string $comPassword): self
    {
        $this->comPassword = $comPassword;

        return $this;
    }

    public function __toString(){
        return $this->comId;
    }

}
