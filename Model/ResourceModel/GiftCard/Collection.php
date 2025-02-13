<?php

namespace Mh3yad\GiftCard\Model\ResourceModel\GiftCard;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mh3yad\GiftCard\Model\GiftCard;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCard as GiftCardResource;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(GiftCard::class, GiftCardResource::class);
    }
}