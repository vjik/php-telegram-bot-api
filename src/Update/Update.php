<?php

declare(strict_types=1);

namespace Vjik\TelegramBot\Api\Update;

use Vjik\TelegramBot\Api\ParseResult\ValueHelper;
use Vjik\TelegramBot\Api\Type\BusinessConnection;
use Vjik\TelegramBot\Api\Type\BusinessMessagesDeleted;
use Vjik\TelegramBot\Api\Type\CallbackQuery;
use Vjik\TelegramBot\Api\Type\ChatBoostRemoved;
use Vjik\TelegramBot\Api\Type\ChatBoostUpdated;
use Vjik\TelegramBot\Api\Type\ChatJoinRequest;
use Vjik\TelegramBot\Api\Type\ChatMemberUpdated;
use Vjik\TelegramBot\Api\Type\Inline\ChosenInlineResult;
use Vjik\TelegramBot\Api\Type\Inline\InlineQuery;
use Vjik\TelegramBot\Api\Type\Message;
use Vjik\TelegramBot\Api\Type\MessageReactionCountUpdated;
use Vjik\TelegramBot\Api\Type\MessageReactionUpdated;
use Vjik\TelegramBot\Api\Type\Payments\PreCheckoutQuery;
use Vjik\TelegramBot\Api\Type\Payments\ShippingQuery;
use Vjik\TelegramBot\Api\Type\Poll;
use Vjik\TelegramBot\Api\Type\PollAnswer;

/**
 * @see https://core.telegram.org/bots/api#update
 */
final readonly class Update
{
    public function __construct(
        public int $updateId,
        public ?Message $message,
        public ?Message $editedMessage,
        public ?Message $channelPost,
        public ?Message $editedChannelPost,
        public ?BusinessConnection $businessConnection,
        public ?Message $businessMessage,
        public ?Message $editedBusinessMessage,
        public ?BusinessMessagesDeleted $deletedBusinessMessages,
        public ?MessageReactionUpdated $messageReaction,
        public ?MessageReactionCountUpdated $messageReactionCount,
        public ?InlineQuery $inlineQuery,
        public ?ChosenInlineResult $chosenInlineResult,
        public ?CallbackQuery $callbackQuery,
        public ?ShippingQuery $shippingQuery,
        public ?PreCheckoutQuery $preCheckoutQuery,
        public ?Poll $poll,
        public ?PollAnswer $pollAnswer,
        public ?ChatMemberUpdated $myChatMember,
        public ?ChatMemberUpdated $chatMember,
        public ?ChatJoinRequest $chatJoinRequest,
        public ?ChatBoostUpdated $chatBoost,
        public ?ChatBoostRemoved $removedChatBoost,
    ) {
    }

    public static function fromTelegramResult(mixed $result): self
    {
        ValueHelper::assertArrayResult($result);
        return new Update(
            ValueHelper::getInteger($result, 'update_id'),
            array_key_exists('message', $result)
                ? Message::fromTelegramResult($result['message'])
                : null,
            array_key_exists('edited_message', $result)
                ? Message::fromTelegramResult($result['edited_message'])
                : null,
            array_key_exists('channel_post', $result)
                ? Message::fromTelegramResult($result['channel_post'])
                : null,
            array_key_exists('edited_channel_post', $result)
                ? Message::fromTelegramResult($result['edited_channel_post'])
                : null,
            array_key_exists('business_connection', $result)
                ? BusinessConnection::fromTelegramResult($result['business_connection'])
                : null,
            array_key_exists('business_message', $result)
                ? Message::fromTelegramResult($result['business_message'])
                : null,
            array_key_exists('edited_business_message', $result)
                ? Message::fromTelegramResult($result['edited_business_message'])
                : null,
            array_key_exists('deleted_business_messages', $result)
                ? BusinessMessagesDeleted::fromTelegramResult($result['deleted_business_messages'])
                : null,
            array_key_exists('message_reaction', $result)
                ? MessageReactionUpdated::fromTelegramResult($result['message_reaction'])
                : null,
            array_key_exists('message_reaction_count', $result)
                ? MessageReactionCountUpdated::fromTelegramResult($result['message_reaction_count'])
                : null,
            array_key_exists('inline_query', $result)
                ? InlineQuery::fromTelegramResult($result['inline_query'])
                : null,
            array_key_exists('chosen_inline_result', $result)
                ? ChosenInlineResult::fromTelegramResult($result['chosen_inline_result'])
                : null,
            array_key_exists('callback_query', $result)
                ? CallbackQuery::fromTelegramResult($result['callback_query'])
                : null,
            array_key_exists('shipping_query', $result)
                ? ShippingQuery::fromTelegramResult($result['shipping_query'])
                : null,
            array_key_exists('pre_checkout_query', $result)
                ? PreCheckoutQuery::fromTelegramResult($result['pre_checkout_query'])
                : null,
            array_key_exists('poll', $result)
                ? Poll::fromTelegramResult($result['poll'])
                : null,
            array_key_exists('poll_answer', $result)
                ? PollAnswer::fromTelegramResult($result['poll_answer'])
                : null,
            array_key_exists('my_chat_member', $result)
                ? ChatMemberUpdated::fromTelegramResult($result['my_chat_member'])
                : null,
            array_key_exists('chat_member', $result)
                ? ChatMemberUpdated::fromTelegramResult($result['chat_member'])
                : null,
            array_key_exists('chat_join_request', $result)
                ? ChatJoinRequest::fromTelegramResult($result['chat_join_request'])
                : null,
            array_key_exists('chat_boost', $result)
                ? ChatBoostUpdated::fromTelegramResult($result['chat_boost'])
                : null,
            array_key_exists('removed_chat_boost', $result)
                ? ChatBoostRemoved::fromTelegramResult($result['removed_chat_boost'])
                : null,
        );
    }
}