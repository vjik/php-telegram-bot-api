<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Tests\Type;

use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\Type\ReactionTypeCustomEmoji;

final class ReactionTypeCustomEmojiTest extends TestCase
{
    public function testBase(): void
    {
        $reaction = new ReactionTypeCustomEmoji('👍');

        $this->assertSame('custom_emoji', $reaction->getType());
        $this->assertSame('👍', $reaction->customEmojiId);
        $this->assertSame(
            [
                'type' => 'custom_emoji',
                'custom_emoji_id' => '👍',
            ],
            $reaction->toRequestArray(),
        );
    }

    public function testFromTelegramResult(): void
    {
        $reaction = ReactionTypeCustomEmoji::fromTelegramResult([
            'type' => 'custom_emoji',
            'custom_emoji_id' => '👍',
        ]);

        $this->assertSame('custom_emoji', $reaction->getType());
        $this->assertSame('👍', $reaction->customEmojiId);
    }
}
