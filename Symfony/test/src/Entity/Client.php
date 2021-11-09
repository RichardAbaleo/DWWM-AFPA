<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cliName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $cliBirthdate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $cliPhoneNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliName(): ?string
    {
        return $this->cliName;
    }

    public function setCliName(string $cliName): self
    {
        $this->cliName = $cliName;

        return $this;
    }

    public function getCliBirthdate(): ?\DateTimeInterface
    {
        return $this->cliBirthdate;
    }

    public function setCliBirthdate(?\DateTimeInterface $cliBirthdate): self
    {
        $this->cliBirthdate = $cliBirthdate;

        return $this;
    }

    public function getCliPhoneNumber(): ?string
    {
        return $this->cliPhoneNumber;
    }

    public function setCliPhoneNumber(string $cliPhoneNumber): self
    {
        $this->cliPhoneNumber = $cliPhoneNumber;

        return $this;
    }
}
