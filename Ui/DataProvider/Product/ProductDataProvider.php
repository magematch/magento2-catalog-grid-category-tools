<?php

declare(strict_types=1);

namespace Rameera\AdminProductGridCategoryFilter\Ui\DataProvider\Product;

use Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider as MagentoProductDataProvider;
use Magento\Framework\Api\Filter;

class ProductDataProvider extends MagentoProductDataProvider
{
    public function addFilter(Filter $filter)
    {
        if ($filter->getField() === 'category_id') {
            /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $collection */
            $collection = $this->getCollection();
            $collection->addCategoriesFilter(['in' => $filter->getValue()]);
        } elseif (isset($this->addFilterStrategies[$filter->getField()])) {
            $this->addFilterStrategies[$filter->getField()]
                ->addFilter(
                    $this->getCollection(),
                    $filter->getField(),
                    [$filter->getConditionType() => $filter->getValue()]
                );
        } else {
            parent::addFilter($filter);
        }
    }
}
