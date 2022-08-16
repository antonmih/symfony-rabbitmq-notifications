<?php

declare(strict_types=1);

namespace App\UI\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;

trait EasyAdminDateTimeFieldsTrait
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    #[Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    /** @psalm-suppress PropertyNotSetInConstructor */
    #[Column(type: 'datetime')]
    private DateTimeInterface $updatedAt;

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    private function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    private function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    #[PreUpdate]
    public function setUpdatedAtToCurrentTime(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    #[PrePersist]
    public function setDatesToCurrentTime(): void
    {
        $datetime = new \DateTimeImmutable();
        $this->setCreatedAt($datetime);
        $this->setUpdatedAt($datetime);
    }
}
