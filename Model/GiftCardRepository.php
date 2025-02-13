<?php

namespace Mh3yad\GiftCard\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Mh3yad\GiftCard\Api\Data\GiftCardInterface;
use Mh3yad\GiftCard\Api\Data\GiftCardSearchResultsInterface;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCard as GiftCardResource;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCard\CollectionFactory as CollectionFactory;
use Mh3yad\GiftCard\Api\Data\GiftCardSearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class GiftCardRepository
{
    /**
     * @var GiftCardResource
     */
    protected GiftCardResource $resource;

    /**
     * @var GiftCardFactory
     */
    protected GiftCardFactory $giftCardFactory;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @var GiftCardSearchResultsInterfaceFactory
     */
    protected GiftCardSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @param GiftCardResource $resource
     * @param GiftCardFactory $giftCardFactory
     * @param CollectionFactory $collectionFactory
     * @param GiftCardSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        GiftCardResource                      $resource,
        GiftCardFactory                       $giftCardFactory,
        CollectionFactory                     $collectionFactory,
        GiftCardSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface          $collectionProcessor
    )
    {
        $this->resource = $resource;
        $this->giftCardFactory = $giftCardFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save GiftCard data
     *
     * @param GiftCardInterface $giftCard
     * @return GiftCard
     * @throws CouldNotSaveException
     */
    public function save(GiftCardInterface $giftCard): GiftCard
    {
        try {
            $this->resource->save($giftCard);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $giftCard;
    }

    /**
     * Load GiftCard data by given GiftCard Identity
     *
     * @param int $giftCardId
     * @return GiftCard
     * @throws NoSuchEntityException
     */
    public function getById(int $giftCardId): GiftCard
    {
        $giftCard = $this->giftCardFactory->create();
        $this->resource->load($giftCard, $giftCardId);
        if (!$giftCard->getId()) {
            throw new NoSuchEntityException(__('The  giftCard with the "%1" ID doesn\'t exist.', $giftCardId));
        }
        return $giftCard;
    }

    /**
     * Load GiftCard data by given GiftCard code
     *
     * @param string $giftCardCode
     * @return GiftCard
     * @throws NoSuchEntityException
     */
    public function getByCode(string $giftCardCode): GiftCard
    {
        $giftCard = $this->giftCardFactory->create();
        $this->resource->load($giftCard, $giftCardCode, 'code');
        if (!$giftCard->getGiftCardCode()) {
            throw new NoSuchEntityException(__('The  giftCard with the "%1" Code doesn\'t exist.', $giftCardCode));
        }
        return $giftCard;
    }

    /**
     * Load GiftCard data collection by given search criteria
     *
     * @param SearchCriteriaInterface $criteria
     * @return GiftCardSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Delete GiftCard
     *
     * @param GiftCardInterface $giftCard
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(GiftCardInterface $giftCard): bool
    {
        try {
            $this->resource->delete($giftCard);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete GiftCard by given GiftCard Identity
     *
     * @param string $giftCardId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($giftCardId): bool
    {
        return $this->delete($this->getById($giftCardId));
    }
}
