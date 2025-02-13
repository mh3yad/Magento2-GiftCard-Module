<?php

namespace Mh3yad\GiftCard\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface GiftCardSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get GiftCard list.
     *
     * @return GiftCardInterface[]
     */
    public function getItems(): array;

    /**
     * Set GiftCard list.
     *
     * @param GiftCardInterface[] $items
     * @return $this
     */
    public function setItems(array $items): static;
}
