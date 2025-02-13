<?php

namespace Mh3yad\GiftCard\Model\ResourceModel\GiftCardUsage;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mh3yad\GiftCard\Model\GiftCardUsage;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCardUsage as GiftCardUsageResource;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(GiftCardUsage::class, GiftCardUsageResource::class);
    }
}