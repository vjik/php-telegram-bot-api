<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\UpdateHandler;

use Vjik\TelegramBot\Api\Update\Update;

/**
 * @psalm-immutable
 */
final class UpdateRequest
{
    private array $attributes = [];

    public function __construct(
        private Update $update,
    ) {
    }

    public function getUpdate(): Update
    {
        return $this->update;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getAttribute(string $name, mixed $default = null): mixed
    {
        return $this->attributes[$name] ?? $default;
    }

    public function withAttribute(string $name, mixed $value): static
    {
        $new = clone $this;
        $new->attributes[$name] = $value;
        return $new;
    }

    public function withoutAttribute(string $name): static
    {
        $new = clone $this;
        unset($new->attributes[$name]);
        return $new;
    }
}
