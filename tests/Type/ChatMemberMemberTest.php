<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Tests\Type;

use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\Type\ChatMemberMember;
use Vjik\TelegramBot\Api\Type\User;

final class ChatMemberMemberTest extends TestCase
{
    public function testBase(): void
    {
        $user = new User(123, false, 'John');
        $member = new ChatMemberMember($user);

        $this->assertSame('member', $member->getStatus());
        $this->assertSame($user, $member->getUser());
        $this->assertSame($user, $member->user);
    }

    public function testFromTelegramResult(): void
    {
        $member = ChatMemberMember::fromTelegramResult([
            'user' => [
                'id' => 123,
                'is_bot' => false,
                'first_name' => 'John',
            ],
        ]);

        $this->assertSame(123, $member->user->id);
    }
}
