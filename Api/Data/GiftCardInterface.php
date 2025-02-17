<?php

namespace Mh3yad\GiftCard\Api\Data;

use DateTime;

interface GiftCardInterface
{
    /**
     * @return int
     */
    public function getAssignedCustomerId(): int;

    /**
     * @param int $assignedCustomerId
     * @return void
     */
    public function setAssignedCustomerId(int $assignedCustomerId): void;

    /**
     * @return string
     */
    public function getGiftCardCode(): string;

    /**
     * @param string $giftCardCode
     * @return void
     */
    public function setGiftCardCode(string $giftCardCode): void;

    /**
     * @return string
     */
    public function getRecipientName(): string;

    /**
     * @param string $recipientName
     * @return void
     */
    public function setRecipientName(string $recipientName): void;

    /**
     * @return string
     */
    public function getRecipientEmail(): string;

    /**
     * @param string $recipientEmail
     * @return void
     */
    public function setRecipientEmail(string $recipientEmail): void;

    /**
     * @return int
     */
    public function getStatus(): int;


    /**
     * @param int $status
     * @return void
     */
    public function setStatus(int $status): void;

    /**
     * @return float
     */
    public function getInitialValue(): float;

    /**
     * @param float $initialValue
     * @return void
     */
    public function setInitialValue(float $initialValue): void;

    /**
     * @return float
     */
    public function getCurrentValue(): float;

    /**
     * @param float $currentValue
     * @return void
     */
    public function setCurrentValue(float $currentValue): void;

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime;

    /**
     * @param DateTime $createdAt
     * @return void
     */
    public function setCreatedAt(DateTime $createdAt): void;

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime;

    /**
     * @param DateTime $updatedAt
     * @return void
     */
    public function setUpdatedAt(DateTime $updatedAt): void;

}