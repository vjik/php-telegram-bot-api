<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Tests\Type;

use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\Type\GeneralForumTopicHidden;

final class GeneralForumTopicHiddenTest extends TestCase
{
    public function testBase(): void
    {
        new GeneralForumTopicHidden();
        $this->expectNotToPerformAssertions();
    }

    public function testFromTelegramResult(): void
    {
        GeneralForumTopicHidden::fromTelegramResult([]);
        $this->expectNotToPerformAssertions();
    }
}
