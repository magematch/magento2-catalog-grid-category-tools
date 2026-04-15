<?php

declare(strict_types=1);

namespace Rameera\AdminProductGridCategoryFilter\Ui\Component\Listing\Column;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Ui\Component\Listing\Columns\Column;

class Category extends Column
{
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        private readonly ProductFactory $productFactory,
        private readonly CategoryRepositoryInterface $categoryRepository,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        $fieldName = $this->getData('name');

        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        $categoryNameCache = [];

        foreach ($dataSource['data']['items'] as &$item) {
            $item[$fieldName] = '';
            if (!isset($item['entity_id'])) {
                continue;
            }

            $product = $this->productFactory->create()->load((int) $item['entity_id']);

            $categoryNames = [];
            foreach ($product->getCategoryIds() as $categoryId) {
                if (!isset($categoryNameCache[$categoryId])) {
                    try {
                        $categoryNameCache[$categoryId] = (string) $this->categoryRepository
                            ->get((int) $categoryId)
                            ->getName();
                    } catch (NoSuchEntityException) {
                        $categoryNameCache[$categoryId] = '';
                    }
                }

                if ($categoryNameCache[$categoryId] !== '') {
                    $categoryNames[] = $categoryNameCache[$categoryId];
                }
            }

            $item[$fieldName] = implode(', ', $categoryNames);
        }

        return $dataSource;
    }
}
