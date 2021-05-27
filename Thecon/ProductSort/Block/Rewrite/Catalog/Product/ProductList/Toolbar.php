<?php

namespace Thecon\ProductSort\Block\Rewrite\Catalog\Product\ProductList;

class Toolbar extends \Magento\Catalog\Block\Product\ProductList\Toolbar {

	/**
     * @param \Magento\Framework\Data\Collection $collection
     * @return $this
     */
    public function setCollection($collection)
    {
        $this->_collection = $collection;

        $this->_collection->setCurPage($this->getCurrentPage());

        $limit = (int)$this->getLimit();
        if ($limit) {
            $this->_collection->setPageSize($limit);
        }
        if ($this->getCurrentOrder()) {
        	if($this->getCurrentOrder() == 'popularity') {

                $collection->getSelect()->join('sales_order_item', '`sales_order_item`.product_id=`e`.entity_id',
                array('qty_ordered'=>'SUM(sales_order_item.qty_ordered)'))
                ->group('e.entity_id')
                ->order('qty_ordered DESC');

            } elseif($this->getCurrentOrder() == 'discount') {
                $this->_collection->getSelect()
                    ->columns(
                        array('discount' => '((price_index.final_price * 100)/price_index.price)')
                    )
                    ->group('e.entity_id')
                    ->order('discount ' . $this->getCurrentDirection());

            } elseif($this->getCurrentOrder() == 'high_to_low'){
                $this->_collection->setOrder('price', 'desc');

            } elseif($this->getCurrentOrder() == 'low_to_high'){
                $this->_collection->setOrder('price', 'asc');
            }
        	else {
				$this->_collection->setOrder($this->getCurrentOrder(), $this->getCurrentDirection());
			}
        }
        return $this;
    }
}