<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Tests\Request;

use HttpSoft\Message\StreamFactory;
use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\Request\RequestFileCollector;
use Vjik\TelegramBot\Api\Type\InputFile;

final class RequestFileCollectorTest extends TestCase
{
    public function testBase(): void
    {
        $file1 = new InputFile((new StreamFactory())->createStream());
        $file2 = new InputFile((new StreamFactory())->createStream());

        $collector = new RequestFileCollector();
        $collector->add($file1);
        $collector->add($file2);

        $this->assertSame(
            [
                'file0' => $file1,
                'file1' => $file2,
            ],
            $collector->get(),
        );
    }
    public function testCustomParameters(): void
    {
        $file1 = new InputFile((new StreamFactory())->createStream());
        $file2 = new InputFile((new StreamFactory())->createStream());

        $collector = new RequestFileCollector('test', 23);
        $collector->add($file1);
        $collector->add($file2);

        $this->assertSame(
            [
                'test23' => $file1,
                'test24' => $file2,
            ],
            $collector->get(),
        );
    }
}
