<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes= {"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "post"
 *      },
 *      itemOperations={
 *      "get"={
 *              "security"="is_granted('ROLE_USER') and object.getClient() == user or is_granted('ROLE_ADMIN')",
 *              "security_message"="This user is created by another client and you are not admin."
 *          },
 *      "put"={
 *              "security"="is_granted('ROLE_USER') and object.getClient() == user or is_granted('ROLE_ADMIN')",
 *              "security_message"="This user is created by another client and you are not admin."
 *          },
 *      "delete"={
 *              "security"="is_granted('ROLE_USER') and object.getClient() == user or is_granted('ROLE_ADMIN')",
 *              "security_message"="This user is created by another client and you are not admin."
 *          }
 *      }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\EntityListeners({
 *     "App\EntityListener\ClientUserEntityListener"
 * })
 */
class User
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="users")
     */
    private $client;

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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
