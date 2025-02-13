<?php

namespace Mh3yad\GiftCard\Model\ResourceModel;

class GiftCard extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('giftcard', 'id');
    }
}