<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Tests\Method;

use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\Method\GetMyName;
use Vjik\TelegramBot\Api\Request\HttpMethod;

final class GetMyNameTest extends TestCase
{
    public function testBase(): void
    {
        $method = new GetMyName();

        $this->assertSame(HttpMethod::GET, $method->getHttpMethod());
        $this->assertSame('getMyName', $method->getApiMethod());
        $this->assertSame([], $method->getData());
    }

    public function testFull(): void
    {
        $method = new GetMyName('ru');

        $this->assertSame(
            [
                'language_code' => 'ru',
            ],
            $method->getData()
        );
    }

    public function testPrepareResult(): void
    {
        $method = new GetMyName();

        $preparedResult = $method->prepareResult([
            'name' => 'test',
        ]);

        $this->assertSame('test', $preparedResult->name);
    }
}
