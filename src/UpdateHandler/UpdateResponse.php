<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\UpdateHandler;

use Vjik\TelegramBot\Api\Request\TelegramRequestInterface;

/**
 * @psalm-immutable
 */
final class UpdateResponse
{
    /**
     * @param TelegramRequestInterface[] $requests
     */
    public function __construct(
        private array $requests,
    ) {
    }

    public function withTelegramRequest(TelegramRequestInterface ...$request): self
    {
        $new = clone $this;
        $new->requests = $request;
        return $new;
    }

    public function withAddedTelegramRequest(TelegramRequestInterface ...$request): self
    {
        $new = clone $this;
        $new->requests = array_merge($this->requests, $request);
        return $new;
    }

    /**
     * @return TelegramRequestInterface[]
     */
    public function getTelegramRequests(): array
    {
        return $this->requests;
    }
}
