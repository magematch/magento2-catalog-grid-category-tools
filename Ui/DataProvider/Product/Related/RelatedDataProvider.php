<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Rameera\AdminProductGridCategoryFilter\Ui\DataProvider\Product\Related;

use Magento\Framework\Api\Filter;

/**
 * Class RelatedDataProvider
 *
 * @api
 * @since 101.0.0
 */
class RelatedDataProvider extends \Magento\Catalog\Ui\DataProvider\Product\Related\AbstractDataProvider
{
    /**
     * {@inheritdoc
     * @since 101.0.0
     */
    protected function getLinkType()
    {
        return 'relation';
    }

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
