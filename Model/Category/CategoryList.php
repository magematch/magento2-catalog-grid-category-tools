<?php

declare(strict_types=1);

namespace Rameera\AdminProductGridCategoryFilter\Model\Category;

use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class CategoryList implements OptionSourceInterface
{
    public function __construct(
        private readonly CollectionFactory $categoryCollectionFactory
    ) {
    }

    public function toOptionArray(): array
    {
        $categoryCollection = $this->categoryCollectionFactory
            ->create()
            ->addAttributeToSelect('name')
            ->setOrder('name', 'ASC');

        $options = [['label' => __('All Categories'), 'value' => '']];

        foreach ($categoryCollection as $category) {
            $options[] = ['label' => $category->getName(), 'value' => $category->getId()];
        }

        return $options;
    }
}
