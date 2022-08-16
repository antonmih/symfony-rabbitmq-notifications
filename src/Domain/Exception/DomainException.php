<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use DomainException as DomainExceptionCore;

class DomainException extends DomainExceptionCore implements DomainExceptionInterface
{
}
