<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\UpdateHandler;

use Vjik\TelegramBot\Api\TelegramBotApi;
use Vjik\TelegramBot\Api\Update\Update;

final readonly class UpdateHandler
{
    public function __construct(
        private TelegramBotApi $api,
        private UpdateRequestHandlerInterface $handler,
    ) {
    }

    public function handle(Update $update): UpdateHandleResult
    {
        $updateRequest = new UpdateRequest($update);

        $updateResponse = $this->handler->handle($updateRequest);

        $telegramRequests = [];
        foreach ($updateResponse->getTelegramRequests() as $request) {
            $telegramRequests[] = [$request, $this->api->send($request)];
        }

        return new UpdateHandleResult($update, $telegramRequests);
    }
}
