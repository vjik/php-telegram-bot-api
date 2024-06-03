<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\UpdateHandler;

use Vjik\TelegramBot\Api\Request\TelegramRequestInterface;
use Vjik\TelegramBot\Api\Update\Update;

final readonly class UpdateHandleResult
{
    /**
     * @psalm-param list<list{TelegramRequestInterface,mixed}> $requests
     */
    public function __construct(
        public Update $update,
        public array $requests,
    ) {
    }
}
