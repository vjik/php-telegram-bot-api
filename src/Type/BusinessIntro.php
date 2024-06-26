<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Type;

use Vjik\TelegramBot\Api\ParseResult\ValueHelper;
use Vjik\TelegramBot\Api\Type\Sticker\Sticker;

/**
 * @see https://core.telegram.org/bots/api#businessintro
 */
final readonly class BusinessIntro
{
    public function __construct(
        public ?string $title = null,
        public ?string $message = null,
        public ?Sticker $sticker = null,
    ) {
    }

    public static function fromTelegramResult(mixed $result): self
    {
        ValueHelper::assertArrayResult($result);
        return new self(
            ValueHelper::getStringOrNull($result, 'title'),
            ValueHelper::getStringOrNull($result, 'message'),
            array_key_exists('sticker', $result)
                ? Sticker::fromTelegramResult($result['sticker'])
                : null,
        );
    }
}
