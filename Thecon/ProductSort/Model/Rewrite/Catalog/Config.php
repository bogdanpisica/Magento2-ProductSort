<?php

namespace Thecon\ProductSort\Model\Rewrite\Catalog;

class Config extends \Magento\Catalog\Model\Config {
	 /**
     * @return array
     */
    public function getAttributeUsedForSortByArray()
    {
        $options = ['position' => __('Position')];
        foreach ($this->getAttributesUsedForSortBy() as $attribute) {
            $options[$attribute->getAttributeCode()] = $attribute->getStoreLabel();
        }
        $options['popularity'] = __('Popularity');
        $options['discount'] = __('Discount');
        $options['low_to_high'] = __('Price ascending');
        $options['high_to_low'] = __('Price descending');

        return $options;
    }
}