<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\UpdateHandler;

interface UpdateRequestHandlerInterface
{
    public function handle(UpdateRequest $request): UpdateResponse;
}
