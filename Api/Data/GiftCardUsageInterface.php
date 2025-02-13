<?php

namespace Mh3yad\GiftCard\Api\Data;

use DateTime;

interface GiftCardUsageInterface
{
    /**
     * @return int
     */
    public function getGiftCadId(): int;

    /**
     * @param int $giftCadId
     * @return void
     */
    public function setGiftCadId(int $giftCadId): void;

    /**
     * @param int $orderId
     * @return int
     */
    public function getOrderId(int $orderId): int;

    /**
     * @param int $orderId
     * @return void
     */
    public function setOrderId(int $orderId): void;

    /**
     * @return float
     */
    public function getValueChange(): float;

    /**
     * @param float $valueChange
     * @return void
     */
    public function setValueChange(float $valueChange): void;

    /**
     * @return string
     */
    public function getNote(): string;

    /**
     * @param string $note
     * @return void
     */
    public function setNote(string $note): void;

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime;

    /**
     * @param DateTime $createdAt
     * @return void
     */
    public function setCreatedAt(DateTime $createdAt): void;

}