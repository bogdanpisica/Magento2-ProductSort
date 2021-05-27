<?php

namespace Thecon\ProductSort\Model\Rewrite\Catalog\Config\Source;

class ListSort extends \Magento\Catalog\Model\Config\Source\ListSort {
	public function toOptionArray()
    {
        $options = [];
        $options[] = ['label' => __('Position'), 'value' => 'position'];

        foreach ($this->_getCatalogConfig()->getAttributesUsedForSortBy() as $attribute) {
            $options[] = ['label' => __($attribute['frontend_label']), 'value' => $attribute['attribute_code']];
        }
        $options[] = ['label' => __('Popularity'), 'value' => 'popularity'];
        $options[] = ['label' => __('Discount'), 'value' => 'discount'];
        $options[] = ['label' => __('Price ascending'), 'value' => 'low_to_high'];
        $options[] = ['label' => __('Price descending'), 'value' => 'high_to_low'];
        
        return $options;
    }
}