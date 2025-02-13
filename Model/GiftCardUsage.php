<?php

namespace Mh3yad\GiftCard\Model;

use Magento\Framework\Model\AbstractModel;
use Mh3yad\GiftCard\Api\Data\GiftCardUsageInterface;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCardUsage as GiftCardUsageResource;
use DateTime;

class GiftCardUsage extends AbstractModel implements GiftCardUsageInterface
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GiftCardUsageResource::class);
    }

    /**
     * @inheritDoc
     */
    public function getGiftCadId(): int
    {
        return $this->getData('gift_card_id');
    }

    /**
     * @inheritDoc
     */
    public function setGiftCadId(int $giftCadId): void
    {
        $this->setData('gift_card_id', $giftCadId);
    }

    /**
     * @inheritDoc
     */
    public function getOrderId(int $orderId): int
    {
        return $this->getData('order_id');
    }

    /**
     * @inheritDoc
     */
    public function setOrderId(int $orderId): void
    {
        $this->setData('order_id', $orderId);
    }

    /**
     * @inheritDoc
     */
    public function getValueChange(): float
    {
        return $this->getData('value_change');
    }

    /**
     * @inheritDoc
     */
    public function setValueChange(float $valueChange): void
    {
        $this->setData('value_change', $valueChange);
    }

    /**
     * @inheritDoc
     */
    public function getNote(): string
    {
        return $this->getData('note');
    }

    /**
     * @inheritDoc
     */
    public function setNote(string $note): void
    {
        $this->setData('note', $note);
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
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->setData('created_at', $createdAt);
    }
}
