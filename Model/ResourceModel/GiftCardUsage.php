<?php

namespace Mh3yad\GiftCard\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class GiftCardUsage extends AbstractDb
{

    protected function _construct(): void
    {
        $this->_init('giftcard_usage', 'id');
    }
}