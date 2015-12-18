<?php
namespace RenePenner\StateLessShop\Core;

/**
 * Class OrderState
 *
 * ValueObject
 *
 * @package RenePenner\StateLessShop\Core
 */
final class OrderState extends Enum
{
    const __DEFAULT = self::ORDER_STATE_NEW;

    const ORDER_STATE_NEW = 'new';
    const ORDER_STATE_PENDING = 'pending';
    const ORDER_STATE_PROCESSING = 'processing';
    const ORDER_STATE_COMPLETE = 'complete';
    const ORDER_STATE_CANCELED = 'canceled';
}
