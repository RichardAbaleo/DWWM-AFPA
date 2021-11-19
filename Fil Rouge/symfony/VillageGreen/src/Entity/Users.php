<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="use_cou_id", columns={"use_cou_id"}), @ORM\Index(name="use_typ_id", columns={"use_typ_id"}), @ORM\Index(name="use_com_id", columns={"use_com_id"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="use_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $useId;

    /**
     * @var string
     *
     * @ORM\Column(name="use_lastname", type="string", length=50, nullable=false)
     */
    private $useLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="use_firstname", type="string", length=50, nullable=false)
     */
    private $useFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="use_address", type="string", length=50, nullable=false)
     */
    private $useAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="use_zipcode", type="string", length=5, nullable=false)
     */
    private $useZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="use_city", type="string", length=50, nullable=false)
     */
    private $useCity;

    /**
     * @var string
     *
     * @ORM\Column(name="use_mail", type="string", length=50, nullable=false)
     */
    private $useMail;

    /**
     * @var string
     *
     * @ORM\Column(name="use_phone", type="string", length=50, nullable=false)
     */
    private $usePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="use_password", type="string", length=50, nullable=false)
     */
    private $usePassword;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="use_cou_id", referencedColumnName="cou_id")
     * })
     */
    private $useCou;

    /**
     * @var \Commercial
     *
     * @ORM\ManyToOne(targetEntity="Commercial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="use_com_id", referencedColumnName="com_id")
     * })
     */
    private $useCom;

    /**
     * @var \Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="use_typ_id", referencedColumnName="typ_id")
     * })
     */
    private $useTyp;

    public function getUseId(): ?int
    {
        return $this->useId;
    }

    public function getUseLastname(): ?string
    {
        return $this->useLastname;
    }

    public function setUseLastname(string $useLastname): self
    {
        $this->useLastname = $useLastname;

        return $this;
    }

    public function getUseFirstname(): ?string
    {
        return $this->useFirstname;
    }

    public function setUseFirstname(string $useFirstname): self
    {
        $this->useFirstname = $useFirstname;

        return $this;
    }

    public function getUseAddress(): ?string
    {
        return $this->useAddress;
    }

    public function setUseAddress(string $useAddress): self
    {
        $this->useAddress = $useAddress;

        return $this;
    }

    public function getUseZipcode(): ?string
    {
        return $this->useZipcode;
    }

    public function setUseZipcode(string $useZipcode): self
    {
        $this->useZipcode = $useZipcode;

        return $this;
    }

    public function getUseCity(): ?string
    {
        return $this->useCity;
    }

    public function setUseCity(string $useCity): self
    {
        $this->useCity = $useCity;

        return $this;
    }

    public function getUseMail(): ?string
    {
        return $this->useMail;
    }

    public function setUseMail(string $useMail): self
    {
        $this->useMail = $useMail;

        return $this;
    }

    public function getUsePhone(): ?string
    {
        return $this->usePhone;
    }

    public function setUsePhone(string $usePhone): self
    {
        $this->usePhone = $usePhone;

        return $this;
    }

    public function getUsePassword(): ?string
    {
        return $this->usePassword;
    }

    public function setUsePassword(string $usePassword): self
    {
        $this->usePassword = $usePassword;

        return $this;
    }

    public function getUseCou(): ?Country
    {
        return $this->useCou;
    }

    public function setUseCou(?Country $useCou): self
    {
        $this->useCou = $useCou;

        return $this;
    }

    public function getUseCom(): ?Commercial
    {
        return $this->useCom;
    }

    public function setUseCom(?Commercial $useCom): self
    {
        $this->useCom = $useCom;

        return $this;
    }

    public function getUseTyp(): ?Type
    {
        return $this->useTyp;
    }

    public function setUseTyp(?Type $useTyp): self
    {
        $this->useTyp = $useTyp;

        return $this;
    }


}
