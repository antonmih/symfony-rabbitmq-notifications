<?php

declare(strict_types=1);

namespace App\Domain\Traits;

use DateTimeInterface;

trait DateTimeFieldsTrait
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     */
    private DateTimeInterface $createdAt;

    /**
     * @psalm-suppress PropertyNotSetInConstructor
     */
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

    public function setUpdatedAtToCurrentTime(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    public function setDatesToCurrentTime(): void
    {
        $datetime = new \DateTimeImmutable();
        $this->setCreatedAt($datetime);
        $this->setUpdatedAt($datetime);
    }
}
