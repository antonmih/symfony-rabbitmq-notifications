<?php

declare(strict_types=1);

namespace App\Tests\api;

use App\Domain\Entity\Message;
use App\Tests\ApiTester;
use Symfony\Component\HttpFoundation\Response;

class CreateMessageCest
{
    public function testCreateMessageSuccess(ApiTester $I): void
    {
        $I->amHttpAuthenticated('test', 'test');
        $I->sendPost('create/message', [
            'content' => 'test',
            'type' => 'email',
            'user_id' => 0,
        ]);
        $I->seeResponseCodeIs(Response::HTTP_OK);
    }
}