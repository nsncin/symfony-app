<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255,unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255,unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $password;


    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive=1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userPhoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userCity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userCountry;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userPostCode;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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


    public function getRoles()
    {
        // TODO: Implement getRoles() method.

        return [
          "USER_ROLE"
        ];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
        return serialize(array(
            $this->id,
            $this->username,
            $this->email,
            $this->password,
            $this->isActive

        ));

    }

    public function unserialize($string)
    {
        // TODO: Implement unserialize() method.

        list (
                $this->id,
                $this->username,
                $this->email,
                $this->password,
                $this->isActive
            ) = unserialize($string,["allowed_classes" => false]);
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->userPhoneNumber;
    }

    public function setPhoneNumber(?string $userPhoneNumber): self
    {
        $this->userPhoneNumber = $userPhoneNumber;

        return $this;
    }

    public function getUserAddress(): ?string
    {
        return $this->userAddress;
    }

    public function setUserAddress(?string $userAddress): self
    {
        $this->userAddress = $userAddress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->userCity;
    }

    public function setCity(?string $userCity): self
    {
        $this->userCity = $userCity;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->userCountry;
    }

    public function setCountry(?string $userCountry): self
    {
        $this->userCountry = $userCountry;

        return $this;
    }

    public function getUserPostCode(): ?int
    {
        return $this->userPostCode;
    }

    public function setUserPostCode(?int $userPostCode): self
    {
        $this->userPostCode = $userPostCode;

        return $this;
    }

//    public function getIsActive(): ?int
//    {
//        return $this->is_active;
//    }
//
//    public function setIsActive(int $is_active): self
//    {
//        $this->is_active = $is_active;
//
//        return $this;
//    }



}
