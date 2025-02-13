<?php

namespace Mh3yad\GiftCard\Model\ResourceModel;

class GiftCardUsage extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct(): void
    {
        $this->_init('giftcard_usage', 'id');
    }
}