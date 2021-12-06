<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $UseMail;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $use_lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $use_firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $use_address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $use_zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $use_city;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $use_mobilephone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $use_phone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $use_cou_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $use_com_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUseMail(): ?string
    {
        return $this->UseMail;
    }

    public function setUseMail(string $UseMail): self
    {
        $this->UseMail = $UseMail;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->UseMail;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUseLastname(): ?string
    {
        return $this->use_lastname;
    }

    public function setUseLastname(string $use_lastname): self
    {
        $this->use_lastname = $use_lastname;

        return $this;
    }

    public function getUseFirstname(): ?string
    {
        return $this->use_firstname;
    }

    public function setUseFirstname(string $use_firstname): self
    {
        $this->use_firstname = $use_firstname;

        return $this;
    }

    public function getUseAddress(): ?string
    {
        return $this->use_address;
    }

    public function setUseAddress(?string $use_address): self
    {
        $this->use_address = $use_address;

        return $this;
    }

    public function getUseZipcode(): ?int
    {
        return $this->use_zipcode;
    }

    public function setUseZipcode(?int $use_zipcode): self
    {
        $this->use_zipcode = $use_zipcode;

        return $this;
    }

    public function getUseCity(): ?string
    {
        return $this->use_city;
    }

    public function setUseCity(?string $use_city): self
    {
        $this->use_city = $use_city;

        return $this;
    }

    public function getUseMobilephone(): ?int
    {
        return $this->use_mobilephone;
    }

    public function setUseMobilephone(?int $use_mobilephone): self
    {
        $this->use_mobilephone = $use_mobilephone;

        return $this;
    }

    public function getUsePhone(): ?int
    {
        return $this->use_phone;
    }

    public function setUsePhone(?int $use_phone): self
    {
        $this->use_phone = $use_phone;

        return $this;
    }

    public function getUseCouId(): ?int
    {
        return $this->use_cou_id;
    }

    public function setUseCouId(?int $use_cou_id): self
    {
        $this->use_cou_id = $use_cou_id;

        return $this;
    }

    public function getUseComId(): ?int
    {
        return $this->use_com_id;
    }

    public function setUseComId(?int $use_com_id): self
    {
        $this->use_com_id = $use_com_id;

        return $this;
    }
}
