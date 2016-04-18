<?php

class Riada_Price_Block_Adminhtml_Price_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('priceGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DSC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('price/price')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('id', array(
            'header' => 'ID',
            'align' => 'right',
            'width' => '50px',
            'index' => 'id',
        ));
        $this->addColumn('id_product', array(
            'header' => 'Product',
            'align' => 'left',
            'index' => 'id_product',
            'renderer' => 'Riada_Price_Block_Product',
            'filter_condition_callback' => array($this, '_productFilter'),
        ));
        $this->addColumn('id_provider', array(
            'header' => 'Provider',
            'align' => 'left',
            'index' => 'id_provider',
            'renderer' => 'Riada_Price_Block_Provider',
            'filter_condition_callback' => array($this, '_providerFilter'),

        ));
        $this->addColumn('variety', array(
            'header' => 'Variety',
            'align' => 'left',
            'index' => 'variety',
        ));

        $this->addColumn('price', array(
            'header' => 'Price',
            'align' => 'left',
            'index' => 'price',
        ));
        $this->addColumn('availability', array(
            'header' => 'Disponibilty',
            'align' => 'left',
            'index' => 'availability',
            'type' => 'options',
            'options' => array('1' => 'IN STOCK', '0' => 'OUT OF STOCK')
        ));
        return parent::_prepareColumns();
    }

   

    protected function _productFilter($collection, $column) {
        if (!$value = $column->getFilter()->getValue()) {
            return $this;
        }
        $orderitem = Mage::getModel('catalog/product')->getCollection();
        $orderitem->addFieldToFilter('name', array('like' => '%' . $value . '%'));
        $ids = array();
        foreach ($orderitem as $item) {
            $ids[] = $item->getId();
        }

        $this->getCollection()->addFieldToFilter("id_product", array("in", $ids));
        return $this;
    }
    protected function _providerFilter($collection, $column) {
        if (!$value = $column->getFilter()->getValue()) {
            return $this;
        }
        $orderitem = Mage::getModel('riyada_imei/provider')->getCollection();
        $orderitem->addFieldToFilter('name', array('like' => '%' . $value . '%'));
        $ids = array();
        foreach ($orderitem as $item) {
            $ids[] = $item->getId();
        }

        $this->getCollection()->addFieldToFilter("id_provider", array("in", $ids));
        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl() {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

}
