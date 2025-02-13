<?php

namespace Mh3yad\GiftCard\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;
use Mh3yad\GiftCard\Api\Data\GiftCardUsageInterface;

interface GiftCardUsageSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get giftCardUsage list.
     *
     * @return giftCardUsageInterface[]
     */
    public function getItems(): array;

    /**
     * Set giftCardUsage list.
     *
     * @param giftCardUsageInterface[] $items
     * @return $this
     */
    public function setItems(array $items): static;
}
