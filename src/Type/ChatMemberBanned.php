<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Type;

use DateTimeImmutable;
use Vjik\TelegramBot\Api\ParseResult\NotFoundKeyInResultException;
use Vjik\TelegramBot\Api\ParseResult\ValueHelper;

/**
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 */
final readonly class ChatMemberBanned implements ChatMember
{
    public function __construct(
        public User $user,
        public DateTimeImmutable|false $untilDate,
    ) {
    }

    public function getStatus(): string
    {
        return 'kicked';
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public static function fromTelegramResult(mixed $result): self
    {
        ValueHelper::assertArrayResult($result);

        $untilDate = ValueHelper::getInteger($result, 'until_date');
        $untilDate = $untilDate === 0
            ? false
            : (new DateTimeImmutable())->setTimestamp($untilDate);

        return new self(
            array_key_exists('user', $result)
                ? User::fromTelegramResult($result['user'])
                : throw new NotFoundKeyInResultException('user'),
            $untilDate,
        );
    }
}
