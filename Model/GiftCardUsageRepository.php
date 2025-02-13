<?php

namespace Mh3yad\GiftCard\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Mh3yad\GiftCard\Api\Data\GiftCardUsageInterface;
use Mh3yad\GiftCard\Api\Data\GiftCardUsageSearchResultsInterface;
use Mh3yad\GiftCard\Model\GiftCard;
use Mh3yad\GiftCard\Model\GiftCardUsage;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCardUsage as GiftCardUsageResource;
use Mh3yad\GiftCard\Model\ResourceModel\GiftCardUsage\CollectionFactory as CollectionFactory;
use Mh3yad\GiftCard\Api\Data\GiftCardUsageSearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class GiftCardUsageRepository
{
    /**
     * @var GiftCardUsageResource
     */
    protected GiftCardUsageResource $resource;

    /**
     * @var GiftCardUsageFactory
     */
    protected GiftCardUsageFactory $giftCardUsageFactory;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @var GiftCardUsageSearchResultsInterfaceFactory
     */
    protected GiftCardUsageSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @param GiftCardUsageResource $resource
     * @param GiftCardUsageFactory $giftCardUsageFactory
     * @param CollectionFactory $collectionFactory
     * @param GiftCardUsageSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        GiftCardUsageResource                      $resource,
        GiftCardUsageFactory                       $giftCardUsageFactory,
        CollectionFactory                          $collectionFactory,
        GiftCardUsageSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface               $collectionProcessor
    )
    {
        $this->resource = $resource;
        $this->giftCardUsageFactory = $giftCardUsageFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save GiftCardUsage data
     *
     * @param GiftCardUsageInterface $giftCardUsage
     * @return GiftCardUsage
     * @throws CouldNotSaveException
     */
    public function save(GiftCardUsageInterface $giftCardUsage): GiftCardUsage
    {
        try {
            $this->resource->save($giftCardUsage);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $giftCardUsage;
    }

    /**
     * Load GiftCardUsage data by given GiftCardUsage Identity
     *
     * @param int $giftCardUsageId
     * @return GiftCardUsage
     * @throws NoSuchEntityException
     */
    public function getById(int $giftCardUsageId): GiftCardUsage
    {
        $giftCardUsage = $this->giftCardUsageFactory->create();
        $this->resource->load($giftCardUsage, $giftCardUsageId);
        if (!$giftCardUsage->getId()) {
            throw new NoSuchEntityException(__('The CMS giftCardUsage with the "%1" ID doesn\'t exist.', $giftCardUsageId));
        }
        return $giftCardUsage;
    }

    /**
     * Load GiftCardUsage data collection by given search criteria
     *
     * @param SearchCriteriaInterface $criteria
     * @return GiftCardUsageSearchResultsInterface[]
     */
    public function getList(SearchCriteriaInterface $criteria): GiftCardUsageSearchResultsInterface
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
     * Delete GiftCardUsage
     *
     * @param GiftCardUsageInterface $giftCardUsage
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(GiftCardUsageInterface $giftCardUsage): bool
    {
        try {
            $this->resource->delete($giftCardUsage);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete GiftCardUsage by given GiftCardUsage Identity
     *
     * @param string $giftCardUsageId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($giftCardUsageId): bool
    {
        return $this->delete($this->getById($giftCardUsageId));
    }
}
