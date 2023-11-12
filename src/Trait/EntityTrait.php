<?php

namespace App\Trait;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

trait EntityTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    private ?int $id;

    #[ORM\Column(type: 'uuid', unique: true)]
    private string $uuid;

    #[ORM\Column(type: 'datetime')]
    private DateTime $creationDate;

    #[ORM\Column(type: 'datetime')]
    private DateTime $lastPersist;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUuid(): string
    {
        if (empty($this->uuid)) {
            $this->uuid = Uuid::uuid4()->toString();
        }
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getCreationDate(): DateTime
    {
        if (empty($this->creationDate)) {
            $this->creationDate = new DateTime();
        }
        return $this->creationDate;
    }

    public function setCreationDate(DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    public function __toString(): string
    {
        return $this->getUuid();
    }

    public function getLastPersist(): DateTime
    {
        return $this->lastPersist;
    }

    public function setLastPersist(DateTime $lastPersist): void
    {
        $this->lastPersist = $lastPersist;
    }

    #[ORM\PrePersist]
    public function prePersistInitialization(): void
    {
        $this->getUuid();
        $this->getCreationDate();
        $this->setLastPersist(new DateTime());
    }
}