<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Tests\Type\Payment;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\ParseResult\TelegramParseResultException;
use Vjik\TelegramBot\Api\Type\Payment\RevenueWithdrawalStateFactory;
use Vjik\TelegramBot\Api\Type\Payment\RevenueWithdrawalStateFailed;
use Vjik\TelegramBot\Api\Type\Payment\RevenueWithdrawalStatePending;
use Vjik\TelegramBot\Api\Type\Payment\RevenueWithdrawalStateSucceeded;

final class RevenueWithdrawalStateFactoryTest extends TestCase
{
    public static function dataBase(): array
    {
        return [
            [
                RevenueWithdrawalStatePending::class,
                [
                    'type' => 'pending',
                ],
            ],
            [
                RevenueWithdrawalStateSucceeded::class,
                [
                    'type' => 'succeeded',
                    'date' => 12431326,
                    'url' => 'https://example.com/test',
                ],
            ],
            [
                RevenueWithdrawalStateFailed::class,
                [
                    'type' => 'failed',
                ],
            ],
        ];
    }

    #[DataProvider('dataBase')]
    public function testBase(string $expectedClass, array $result): void
    {
        $result = RevenueWithdrawalStateFactory::fromTelegramResult($result);
        $this->assertInstanceOf($expectedClass, $result);
    }

    public function testInvalidType(): void
    {
        $this->expectException(TelegramParseResultException::class);
        $this->expectExceptionMessage('Unknown revenue withdrawal state type.');
        RevenueWithdrawalStateFactory::fromTelegramResult([
            'type' => 'invalid',
        ]);
    }
}
