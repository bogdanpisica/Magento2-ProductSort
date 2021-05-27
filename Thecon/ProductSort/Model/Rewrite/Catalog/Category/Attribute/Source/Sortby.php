<?php

namespace Thecon\ProductSort\Model\Rewrite\Catalog\Category\Attribute\Source;

class Sortby extends \Magento\Catalog\Model\Category\Attribute\Source\Sortby {
	/**
     * {@inheritdoc}
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [['label' => __('Position'), 'value' => 'position']];
            foreach ($this->_getCatalogConfig()->getAttributesUsedForSortBy() as $attribute) {
                $this->_options[] = [
                    'label' => __($attribute['frontend_label']),
                    'value' => $attribute['attribute_code'],
                ];
            }
            $this->_options[] = ['label' => __('Popularity'), 'value' => 'popularity'];
        	$this->_options[] = ['label' => __('Discount'), 'value' => 'discount'];
            $this->_options[] = ['label' => __('Price ascending'), 'value' => 'low_to_high'];
            $this->_options[] = ['label' => __('Price descending'), 'value' => 'high_to_low'];
        }
        return $this->_options;
    }
}