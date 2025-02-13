<?php

namespace Mh3yad\GiftCard\Model;

use Magento\Framework\Model\AbstractModel;
use Mh3yad\GiftCard\Api\Data\GiftCardInterface;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCard as GiftCardResource;
use DateTime;

class GiftCard extends AbstractModel implements GiftCardInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GiftCardResource::class);
    }

    /**
     * @inheritDoc
     */
    public function getAssignedCustomerId(): int
    {
        return $this->getData('assigned_customer_id');
    }

    /**
     * @inheritDoc
     */
    public function setAssignedCustomerId(int $assignedCustomerId): void
    {
        $this->setData('assigned_customer_id', $assignedCustomerId);
    }

    /**
     * @inheritDoc
     */
    public function getGiftCardCode(): string
    {
        return $this->getData('gift_card_code');
    }

    /**
     * @inheritDoc
     */
    public function setGiftCardCode(string $giftCardCode): void
    {
        $this->setData('gift_card_code', $giftCardCode);
    }

    /**
     * @inheritDoc
     */
    public function getRecipientName(): string
    {
        return $this->getData('recipient_name');
    }

    /**
     * @inheritDoc
     */
    public function setRecipientName(string $recipientName): void
    {
        $this->setData('recipient_name', $recipientName);
    }

    /**
     * @inheritDoc
     */
    public function getRecipientEmail(): string
    {
        return $this->getData('recipient_email');
    }

    /**
     * @inheritDoc
     */
    public function setRecipientEmail(string $recipientEmail): void
    {
        $this->setData('recipient_email', $recipientEmail);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): int
    {
        return $this->getData('status');
    }

    /**
     * @inheritDoc
     */
    public function setStatus(int $status): void
    {
        $this->setData('status', $status);
    }

    /**
     * @inheritDoc
     */
    public function getInitialValue(): float
    {
        return $this->getData('initial_value');
    }

    /**
     * @inheritDoc
     */
    public function setInitialValue(float $initialValue): void
    {
        $this->setData('initial_value', $initialValue);
    }

    /**
     * @inheritDoc
     */
    public function getCurrentValue(): float
    {
        return $this->getData('current_value');
    }

    /**
     * @inheritDoc
     */
    public function setCurrentValue(float $currentValue): void
    {
        $this->setData('current_value', $currentValue);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): DateTime
    {
        return $this->getData('created_at');
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->setData('created_at', $createdAt->format('Y-m-d H:i:s'));
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->getData('updated_at');
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->setData('updated_at', $updatedAt->format('Y-m-d H:i:s'));
    }
}