<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Regex("^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$")
     * @Assert\NotBlank
     * @Assert\email(
     *  message = "This nick is not valid",
     *  checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Regex("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})")
     */
    private $password;

    /**
     * @ORM\Column(type="text", length=255)
     * @Assert\NotBlank
     * @Assert\Regex("/[a-zA-Z ]+/")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex("/[a-zA-Z ]+/")
     */
    private $lastName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $bornDate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Height;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team")
     */
    private $id_team;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstPosition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondPosition;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $linkInstagram;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $linkFacebook;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $linkTwitter;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Regex("\A^[A-Za-z\d_-]+$\z")
     */
    private $nickName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBornDate(): ?\DateTimeInterface
    {
        return $this->bornDate;
    }

    public function setBornDate(?\DateTimeInterface $bornDate): self
    {
        $this->bornDate = $bornDate;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->Height;
    }

    public function setHeight(?float $Height): self
    {
        $this->Height = $Height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->Weight;
    }

    public function setWeight(?float $Weight): self
    {
        $this->Weight = $Weight;

        return $this;
    }

    public function getNation(): ?string
    {
        return $this->nation;
    }

    public function setNation(?string $nation): self
    {
        $this->nation = $nation;

        return $this;
    }

    public function getIdTeam(): ?Team
    {
        return $this->id_team;
    }

    public function setIdTeam(?Team $id_team): self
    {
        $this->id_team = $id_team;

        return $this;
    }

    public function getFirstPosition(): ?string
    {
        return $this->firstPosition;
    }

    public function setFirstPosition(?string $firstPosition): self
    {
        $this->firstPosition = $firstPosition;

        return $this;
    }

    public function getSecondPosition(): ?string
    {
        return $this->secondPosition;
    }

    public function setSecondPosition(?string $secondPosition): self
    {
        $this->secondPosition = $secondPosition;

        return $this;
    }

    public function getLinkInstagram(): ?string
    {
        return $this->linkInstagram;
    }

    public function setLinkInstagram(?string $linkInstagram): self
    {
        $this->linkInstagram = $linkInstagram;

        return $this;
    }

    public function getLinkFacebook(): ?string
    {
        return $this->linkFacebook;
    }

    public function setLinkFacebook(?string $linkFacebook): self
    {
        $this->linkFacebook = $linkFacebook;

        return $this;
    }

    public function getLinkTwitter(): ?string
    {
        return $this->linkTwitter;
    }

    public function setLinkTwitter(?string $linkTwitter): self
    {
        $this->linkTwitter = $linkTwitter;

        return $this;
    }

    public function getNickName(): ?string
    {
        return $this->nickName;
    }

    public function setNickName(string $nickName): self
    {
        $this->nickName = $nickName;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getUsername(){
        return $this->email;
    }

    public function getSalt(){
        return null;
    }

    public function getRoles(){
        return array('ROLE_USER');
    }

    public function eraseCredentials(){}

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }
}
