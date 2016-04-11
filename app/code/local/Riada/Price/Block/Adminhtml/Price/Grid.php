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
        $this->addColumn('id_riada_price', array(
            'header' => 'ID',
            'align' => 'right',
            'width' => '50px',
            'index' => 'id_riada_price',
        ));
        $this->addColumn('id_product', array(
            'header' => 'Product',
            'align' => 'left',
            'index' => 'id_product',
            'renderer'  => 'Riada_Price_Block_Product'
        ));
        $this->addColumn('id_provider', array(
            'header' => 'Provider',
            'align' => 'left',
            'index' => 'id_provider',
            'renderer'  => 'Riada_Price_Block_Provider'
           
        ));
        $this->addColumn('price', array(
            'header' => 'Price',
            'align' => 'left',
            'index' => 'price',
        ));
        $this->addColumn('dispo', array(
            'header' => 'Disponibilty',
            'align' => 'left',
            'index' => 'dispo',
            'type' => 'options',
            'options' => array('1' => 'IN STOCK', '0' => 'OUT OF STOCK')
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl() {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

}
