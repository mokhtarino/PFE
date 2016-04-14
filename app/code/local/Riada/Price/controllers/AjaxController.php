<?php

class Riada_Price_AjaxController extends Mage_Core_Controller_Front_Action {

  

    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
    }
    public function contentAction() {
        $product = 8;
        $collection= Mage::getModel('price/price')->getCollection()
                ->addFieldToFilter('id_product', $product)
                ->getData();
       // var_dump($collection['2']['id'] );
        
        
    }

    
}
