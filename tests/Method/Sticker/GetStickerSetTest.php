<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Tests\Method\Sticker;

use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\Method\Sticker\GetStickerSet;
use Vjik\TelegramBot\Api\Request\HttpMethod;

final class GetStickerSetTest extends TestCase
{
    public function testBase(): void
    {
        $method = new GetStickerSet('test_by_bot');

        $this->assertSame(HttpMethod::GET, $method->getHttpMethod());
        $this->assertSame('getStickerSet', $method->getApiMethod());
        $this->assertSame(
            [
                'name' => 'test_by_bot',
            ],
            $method->getData(),
        );
    }

    public function testPrepareResult(): void
    {
        $method = new GetStickerSet('test_by_bot');

        $preparedResult = $method->prepareResult([
            'name' => 'test_by_bot',
            'title' => 'test name',
            'sticker_type' => 'regular',
            'stickers' => [
                [
                    'file_id' => 'fid1',
                    'file_unique_id' => 'fuid1',
                    'type' => 'regular',
                    'width' => 200,
                    'height' => 300,
                    'is_animated' => false,
                    'is_video' => false,
                ],
            ],
        ]);

        $this->assertSame('test name', $preparedResult->title);
    }
}
