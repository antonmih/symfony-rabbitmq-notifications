<?php

declare(strict_types=1);

namespace App\UI\Entity;

use App\Domain\Entity\ValueObject\Id;
use App\UI\Repository\EasyAdminMessageRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id as DoctrineId;
use Doctrine\ORM\Mapping\Table;

/** @psalm-suppress MissingConstructor */
#[Entity(EasyAdminMessageRepository::class)]
#[Table('message')]
#[HasLifecycleCallbacks]
class EasyAdminMessage
{
    use EasyAdminDateTimeFieldsTrait;

    #[DoctrineId]
    #[Column(type: 'uuid')]
    private Id $id;

    #[Column]
    private string $content = '';

    #[Column]
    private string $type = '';

    #[Column]
    private string $status = '';

    #[Column]
    private int $userId = 0;

    public function getId(): Id
    {
        return $this->id;
    }

    public function setId(Id $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content) :self
    {
        $this->content = $content;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

}